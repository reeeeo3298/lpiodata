<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LpiodataController extends Controller
{
    public function index() {
//        dd('AA');
        return view('main.index');
    }

    public function graph(Request $request) {

        $month = $request->input('month');
        
        $lpioweb2 = DB::select(
                "select d,coalesce(count_day,0) as count_day from
                (
                    select
                    date_format(date_add('2019-05-31', interval td.generate_series day), '%Y-%m-%d') as d from
                    (
                        SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                        SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 30
                    ) as td
                ) as tl
                left outer join
                (
                    select application_dt,count(*) as count_day
                    from T_data
                    where channel_id = 1
                    and application_dt like '%2019-06%' 
                    group by application_dt
                ) as t2
                on
                tl.d = t2.application_dt"
        );

        $enechange2 = DB::select(
                "select d,coalesce(count_day,0) as count_day from
                (
                    select
                    date_format(date_add('2019-05-31', interval td.generate_series day), '%Y-%m-%d') as d from
                    (
                        SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                        SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 30
                    ) as td
                ) as tl
                left outer join
                (
                    select application_dt,count(*) as count_day
                    from T_data
                    where channel_id = 2
                    and application_dt like '%2019-06%' 
                    group by application_dt
                ) as t2
                on
                tl.d = t2.application_dt"
        );

        $results = [$lpioweb2, $enechange2];

        return $results;
    }
    
    /**
     * チャネルごとのデータ集計
     */
    private function data_count($month){
        
        return $result;
    }
}
