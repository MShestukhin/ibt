<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Resources\Actions as ActionsResource;

class Langs{
    public function createProperty($name, $value){
        $this->{$name} = $value;
    }
}

class Check_code{
    public function createProperty($name, $value){
        $this->{$name} = $value;
    }
}

class ActionParamController extends Controller
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
        $langs_query = DB::select("select * from  languages");
        $langs_codes=array();
        for($i =0; $i< count($langs_query); $i++){
            $lang=$langs_query[$i];
            $lang_kaz_rus_sql="select p.id,
              p.code,
              p.dsc,
              TO_CHAR(null) def_val,
              max(TO_CHAR(sm2.id)) over(partition by p.id) as val,
              TO_CHAR(null) checked,
              nvl(sm2.val, sm1.val) val_txt,
              p.lang_id,
              p.lang_code
            from (select p.*, l.id lang_id, l.code lang_code from params p, languages l) p
              left join action_params ap on p.id = ap.param_id and ap.act_id = ".$id." and sysdate between ap.sd and ap.ed
              left join sms_messages sm1 on p.def_val = to_char(sm1.id) and sm1.lang_id = p.lang_id and sysdate between sm1.sd and sm1.ed
              left join sms_messages sm2 on ap.val = to_char(sm2.id) and sm2.lang_id = p.lang_id and sysdate between sm2.sd and sm2.ed
            where p.id in (12,13,14,15,18,20,24,29,30,31,33,39,44,65) and p.lang_id=".$lang->id;
            $lang_codes=DB::select($lang_kaz_rus_sql);
            $instans_lang= new Langs();
            for($j=0;$j<count($lang_codes); $j++){
//                $object =(object) [ $lang_codes[$j]->code => $lang_codes[$j]];
                $instans_lang->createProperty($lang_codes[$j]->code, $lang_codes[$j]);
            }
            array_push($langs_codes,$instans_lang);
        }
        $checked_sql="select p.id,
          p.code,
          p.dsc,
          p.def_val,
          coalesce(ap.val, p.def_val, 'off') as val,
          decode(nvl(ap.val, p.def_val),'on','checked') as checked,
          null val_txt,
          null lang_id,
          null AS lang_code
        from params p
          left join action_params ap on p.id = ap.param_id and ap.act_id = ".$id." and sysdate between ap.sd and ap.ed
        where p.id not in (12,13,14,15,18,20,24,29,30,31,33,39,44,65)";
        $checked_code=DB::select($checked_sql);
        $checked_code_obj=new Check_code();
        for($j=0;$j<count($checked_code); $j++){
//            $object =(object) [ $checked_code[$j]->code => $checked_code[$j]];
            $checked_code_obj->createProperty($checked_code[$j]->code, $checked_code[$j]);
        }
        $lang_codes_obj=(object)$langs_codes;
        $union=[$lang_codes_obj,$checked_code_obj];
        return new ActionsResource($union);
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
