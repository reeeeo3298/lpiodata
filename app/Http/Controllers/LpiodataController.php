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
    
    public function search(Request $request) {
        
        $month = $request->input('month');
        return view('main.index',compact('month'));
    }

    public function graph(Request $request) {

        $today = $request->input('today');
        
        $month = date('Y-m-d', strtotime('last day of previous month' . $today));
        
        $lpioweb = $this->lpioweb($month); //エルピオweb

        $enechange = $this->enechange($month); //エネチェンジ
        
        $kakakucom = $this->kakakucom($month); //価格ＣＯＭ
        
        $inzweb = $this->inzweb($month); //インズウェブ
        
        $sales = $this->sales($month); //営業直販
        
        $agency = $this->agency($month); //代理店
        
        $agency2 = $this->agency2($month); //取次店
        
        $affiliate = $this->affiliate($month); //アフィリエイト
        
        $a8net = $this->a8net($month); //A8.NET
        
        $sum = $this->sum_data($today);

        $results = [$lpioweb,$enechange,$kakakucom,$inzweb,$sales,$agency,$agency2,$affiliate,$a8net,$sum];

        return $results;
    }
    
    /**
     * チャネルごとのデータ集計
     */
    private function data_count($month){
        
        return $result;
    }
    
    /**
     * エルピオweb集計
     */
    public function lpioweb($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 1
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * エネチェンジ集計
     */
    public function enechange($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 2
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * 価格ＣＯＭ集計
     */
    public function kakakucom($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 3
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * インズウェブ集計
     */
    public function inzweb($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 4
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * 営業直販集計
     */
    public function sales($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 5
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * 代理店集計
     */
    public function agency($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 6
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * 取次店集計
     */
    public function agency2($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 7
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * エルピオアフィリ集計
     */
    public function affiliate($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 8
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * A8net集計
     */
    public function a8net($month){
        
        $result = DB::select(
                        "select d,coalesce(count_day,0) as count_day from
                        (
                            select
                            date_format(date_add('$month', interval td.generate_series day), '%Y-%m-%d') as d from
                            (
                                SELECT 0 generate_series FROM DUAL WHERE (@num:=1-1)*0 UNION ALL
                                SELECT @num:=@num+1 FROM `information_schema`.COLUMNS LIMIT 31
                            ) as td
                        ) as tl
                        left outer join
                        (
                            select application_dt,count(*) as count_day
                            from T_data
                            where channel_id = 9
                            group by application_dt
                        ) as t2
                        on
                        tl.d = t2.application_dt"
                );
        
        return $result;
    }
    
    /**
     * 合計件数
     */
    public function sum_data($today){
        
        $result = DB::table('T_data')
                ->where('application_dt','like','%2019-07%')
                ->count();
        
        return $result;
        
    }
}
