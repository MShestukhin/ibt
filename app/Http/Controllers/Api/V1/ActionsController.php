<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions;
use App\Http\Resources\Actions as ActionsResource;
use DB;
class ActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql=
        "with
        act_pars_tmp as (
          select p.code, ap.val, ap.act_id, ap.sd, ap.ed
          from action_params ap, params p
          where p.code in ('pre_bonus_on', 'bonus_switch_on', 'bonus_switch_off')
            and ap.param_id = p.id
            and sysdate between ap.sd and ap.ed),
        pars_tmp as (
          select p.code, p.def_val
          from params p
          where p.code in ('pre_bonus_on', 'bonus_switch_on', 'bonus_switch_off')),
        regions_tmp as(
          select max(r.time_zone) - ibt_actions.get_db_time_zone as max_tz,
            min(r.time_zone) - ibt_actions.get_db_time_zone as min_tz,
            act_id
          from action_regions ar,
            regions r
          where sysdate between ar.sd and ar.ed
            and r.id = ar.reg_id
            and sysdate between r.sd and r.ed
          group by act_id)
      select id, name, act_sd, act_ed, priority, act_members, state,
        folder_name, user_name, md_hash
      from (
        select a.id, a.name, act_sd act_sd_real, act_ed act_ed_real,  to_char(a.act_sd,'dd.mm.yyyy hh24:mi:ss') as act_sd, to_char(a.act_ed,'dd.mm.yyyy hh24:mi:ss') as act_ed,
          priority,
          act_members,
          f.name folder_name,
          case
          when act_sd = ibt.get_end_date then 'Зарезервирована'
          when sysdate + nvl(r.min_tz, to_dsinterval('0 00:00:00')) > act_ed then 'Завершена'
          when sysdate + nvl(r.max_tz, to_dsinterval('0 00:00:00')) > act_sd then 'Запущена'
          else 'Не начата'
          end as state,
          u.shortfio user_name,
          a.md_hash,
          (select val from act_pars_tmp ap where ap.act_id = a.id and code = 'pre_bonus_on') pre_bonus_on,
          (select def_val from pars_tmp p where code = 'pre_bonus_on') pre_bonus_on_def,
          (select val from act_pars_tmp ap where ap.act_id = a.id and code = 'bonus_switch_on') bonus_switch_on,
          (select def_val from pars_tmp p where code = 'bonus_switch_on') bonus_switch_on_def,
          (select val from act_pars_tmp ap where ap.act_id = a.id and code = 'bonus_switch_off') bonus_switch_off,
          (select def_val from pars_tmp p where code = 'bonus_switch_off') bonus_switch_off_def
        from actions a
          left join regions_tmp r on a.id = r.act_id
          left join action_folders af on sysdate between af.sd and af.ed and a.id = af.act_id
          left join (
            select id, substr(sys_connect_by_path(name, ' / '), 6) as name
            from folders
            where sysdate between sd and ed
            start with id = 0
            connect by prior id = p_id) f on af.folder_id = f.id
          left join svcweb.users_ u on a.su = u.login and u.ed is null
        where sysdate between a.sd and a.ed
          )";
        $query=DB::select($sql);
//        array_push($query,$bonus_switch_off);
        // return new ActionsResource($query);
        //   return $sql;
        return new ActionsResource($query);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $sql="select 
      a.id,
      a.md_hash,
      a.name as name,
      a.name as name_2,
      a.dsc,
      to_char(a.act_sd, 'dd.mm.yyyy hh24:mi:ss') act_sd,
      decode(a.act_ed,ibt.get_end_date,null,to_char(a.act_ed, 'dd.mm.yyyy hh24:mi:ss')) act_ed,
      to_char(a.sd, 'dd.mm.yyyy hh24:mi:ss') sd,
      get_user_name((select initcap(min(su) keep (dense_rank first order by sd)) from actions a1 where a1.id =".$id." )) as creator,
      a.priority,
      decode(a.only_this,1,'checked') as only_this,
      decode(ibt.get_end_date,a.act_sd,1,0) as is_reserved,
      sign((sysdate+max_tz)-a.act_sd) as is_started,
      sign((sysdate+min_tz)-a.act_ed) as is_closed,
      case 
         when act_sd = ibt.get_end_date 
           then 'Зарезервирована' 
         when sign((sysdate+min_tz)-a.act_ed) =1 
           then 'Завершена'
         when sign((sysdate+max_tz)-a.act_sd)=1 
           then 'Запущена'
         else
           'Не начата'
        end as state,
     nvl(f.folder_id,0) as folder,   
     a.act_members as members
      from actions a,
          (select nvl(max(r.time_zone),ibt_actions.get_db_time_zone)-ibt_actions.get_db_time_zone as max_tz,nvl(min(r.time_zone),ibt_actions.get_db_time_zone)-ibt_actions.get_db_time_zone as min_tz from action_regions ar, regions r where ar.act_id=".$id." and sysdate between ar.sd and ar.ed and r.id=ar.reg_id and sysdate between r.sd and r.ed)  ar,
          action_folders f
      where a.id =".$id."
      and sysdate between a.sd and a.ed
      and f.act_id(+) = a.id
      and sysdate between f.sd(+) and f.ed(+)";
      $query=DB::select($sql); 
      return new ActionsResource($query);
      // return new ActionsResource($query);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
