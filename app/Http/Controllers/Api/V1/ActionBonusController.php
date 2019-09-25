<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Resources\Actions as ActionsResource;
use phpDocumentor\Reflection\Types\Object_;


class Step{
    public $lang = array();
};

class BonusesClass{
    public $pred_bon = array();
    public $del_bon = array();
    public $add_bon = array();
};

class ActionBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $sql="select b.id,
          b.act_id,
          b.switch,
          b.obj_func,
          b.obj_id,
          b.step,
          replace(b.step_name,'\"','quot;') as step_name,
          f.func||' ('||b.obj_id||')'||nvl2(b.step_name,'nbsp;laquo;'||b.step_name||'raquo;',null) as step_dsc,
          f.func||' ('||b.obj_id||')'||nvl2(b.step_name,' '||chr(171)||b.step_name||chr(187),null) as step_dsc_2,
          decode(b.step_mandatory,'1','checked') as step_mandatory,
          decode(b.once_only,'1','checked') as once_only,
          b.attempt,
          (select count(*) from bonus_replacement_code rc where rc.bonus_id=b.id and sysdate between rc.sd and rc.ed) as obj_replacement,
          sm.val, --sr.sms_text,
          l.id lang_id,
          l.code as code,
          l.state,
        --  (select r.sms_text from step_route r where r.step_id=b.id and sysdate between r.sd and r.ed and r.state = 1 and r.answer is null) as success_sms,
        --  (select r.sms_text from step_route r where r.step_id=b.id and sysdate between r.sd and r.ed and r.state = -1 and r.answer is null) as fail_sms,
          lpad(extract(hour from b.att_timeout),2,'0')||':'||lpad(extract(minute from b.att_timeout),2,'0') as att_timeout
        from action_bonuses b
          join msisdn_funcs f on f.id = b.obj_func and sysdate between b.sd and b.ed
          join (
            select l.id, l.code, 1 state from languages l
            union all
            select l.id, l.code, -1 state from languages l) l on 1 = 1
          left join step_route sr on sr.step_id = b.id and sysdate between sr.sd and sr.ed and sr.answer is null and sr.state = l.state
          left join sms_messages sm on sr.sms_message_id = sm.id and l.id = sm.lang_id and sysdate between sm.sd and sm.ed
        where b.act_id = ".$id."
        order by b.switch desc, b.step,l.id";
        $query=DB::select($sql);
        $del_bonus=array();
        $add_bonus=array();
        $pred_bonus=array();
        for($i=0; $i<count($query);$i++){
            $bonus=$query[$i];
            switch ($bonus->switch) {
                case -1:
                    array_push($del_bonus, $bonus);
                    break;
                case 0:
                    array_push($pred_bonus, $bonus);
                    break;
                case 1:
                    array_push($add_bonus, $bonus);
                    break;
            }
        }
        $bonuses=[$pred_bonus,$del_bonus,$add_bonus];
        $bonuses_steps=array();
        $bonuses_steps_arr=array();
        for($i=0;$i<count($bonuses);$i++){
            $bon=$bonuses[$i];
            $stp=1;
            $steps=array();
            $s= new Step();
            for($j=0;$j<count($bon);$j++){
                $b=$bon[$j];
                if($stp==$b->step){
                    $s->step=$b->step;
                    $s->switch=$b->switch;
                    $s->step_dsc=$b->step_dsc;
                    array_push($s->lang,$b);
                } else {
                    array_push($steps,$s);
                    $s= new Step();
                    $s->step=$b->step;
                    $s->switch=$b->switch;
                    $s->step_dsc=$b->step_dsc;
                    array_push($s->lang,$b);
                    $stp=$b->step;
                }
            }
            array_push($steps,$s);
            $bonuses_steps_arr[$i]=$steps;
//            unset($steps);
        }
//        $bmv=[$bonuses_steps_pred,$bonuses_steps_del,$bonuses_steps_add];
        return new ActionsResource($bonuses_steps_arr);
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
