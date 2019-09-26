<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller
{
    //
    public function num_action_members(){
        $sql = "with t as (
          select 
            i.sd+r.time_zone-ibt_actions.get_db_time_zone as sd,
            i.imsi,
            rank() over (partition by i.imei order by i.sd) r1,
            rank() over (partition by i.imei, i.msisdn order by i.sd) r2,
            rank() over (partition by i.imei, i.imsi order by i.sd) r3,
            rank() over (partition by i.imei, i.msisdn, i.imsi order by i.sd) r4
          from 
            actions a,
            action_imeis i,
            regions r
          where
            a.id = 1774
            and sysdate between a.sd and a.ed 
            and i.act_id = a.id
            and i.sd >= a.act_sd-1
            and i.sd between nvl(to_date('27.08.2019 18:21:10', 'DD.MM.YYYY HH24:MI:SS'),a.act_sd) - r.time_zone 
                         and nvl(to_date('27.08.2019 18:21:10', 'DD.MM.YYYY HH24:MI:SS'),a.act_ed) + r.time_zone
            and r.id=i.reg_id
          )
        select 
          trunc(sd) - to_date('30.12.1899', 'dd.mm.yyyy') dt,
          sum(case r1 when 1 then 1 else 0 end) cnt_i,
          sum(case r2 when 1 then 1 else 0 end) cnt_im,
          sum(case when imsi is not null and r3 = 1 then 1 else 0 end) cnt_comp_i,
          sum(case when imsi is not null and r4 = 1 then 1 else 0 end) cnt_comp_im
        from 
          t
        group by trunc(sd)
        order by dt";
        $query=DB::select($sql);
        $inputFileName = './reports/template.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $sheet = $spreadsheet->getActiveSheet();
        $num=10;
        for($i=0;$i<count($query);$i++){
            $q=$query[$i];
            $sheet->setCellValue("A".(9+$i), $q->dt);
            $sheet->setCellValue("B".(9+$i), $q->cnt_i);
            $sheet->setCellValue("C".(9+$i), $q->cnt_im);
            $sheet->setCellValue("D".(9+$i), $q->cnt_comp_i);
            $sheet->setCellValue("E".(9+$i), $q->cnt_comp_im);
        }
        $writer = new Xlsx($spreadsheet);
        ob_start();
        $writer->save('php://output');
        $xlsData = ob_get_contents();
        ob_end_clean();
        return json_encode('data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,'.base64_encode($xlsData));
    }
}
