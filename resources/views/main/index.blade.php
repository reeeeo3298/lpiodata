@extends('layouts/layout')
@section('pageCss')
@endsection

@section('content')
        <h1>申し込み集計画面</h1>
        <div class="row">
        <div class="col-md-11 col-md-offset">
            <div class="panel panel-default">
                <div class="panel-heading">検索条件</div>
                <div class="panel-body">                   
                    {{ Form::open(array('url' => '/lpiodata/search','id'=>'data_search' ,'class' => 'form-horizontal','method' => 'post')) }}
                    <div class="search_form1">
                        <label class="col-md-1 control-label">対象期間</label>
                        <select name="month" class="form-control month_box">
                            <option value="2019-01-01">1月</option>
                            <option value="2019-02-01">2月</option>
                            <option value="2019-03-01">3月</option>
                            <option value="2019-04-01">4月</option>
                            <option value="2019-05-01">5月</option>
                            <option value="2019-06-01">6月</option>
                            <option value="2019-07-01">7月</option>
                            <option value="2019-08-01">8月</option>
                            <option value="2019-09-01">9月</option>
                            <option value="2019-10-01">10月</option>
                            <option value="2019-11-01">11月</option>
                            <option value="2019-12-01">12月</option>
                        </select>
                    </div>
                    <div class="search_form2">
                        <label class="col-md-1 control-label">チャネル</label>
                        <select name="channel" class="form-control channel_box">
                            <option value="0">全て</option>
                            <option value="1">エルピオweb</option>
                            <option value="2">エネチェンジ</option>
                            <option value="3">価格ＣＯＭ</option>
                            <option value="4">インズウェブ</option>
                            <option value="5">営業直販</option>
                            <option value="6">代理店</option>
                            <option value="7">取次店</option>
                            <option value="8">エルピオアフィリ</option>
                            <option value="9">a8net</option>
                        </select>
                    </div>
                    <div class="search_form3">
                        <label class="col-md-1 control-label">エリア</label>
                        <select name="area" class="form-control area_box">
                            <option value="0">全て</option>
                            <option value="2">東北電力エリア</option>
                            <option value="3">東京電力エリア</option>
                            <option value="4">中部電力エリア</option>
                            <option value="7">中国電力エリア</option>
                            <option value="9">九州電力エリア</option>
                        </select>
                    </div>
                    <div class="search_form4">
                        <label class="col-md-1 control-label">アンペア数</label>
                        <select name="ampere" class="form-control ampere_box">
                            <option value="0">全て</option>
                            <option value="3">30A</option>
                            <option value="4">40A</option>
                            <option value="5">50A</option>
                            <option value="6">60A</option>
                            <option value="7">7kVA以上</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <div class="btn-group">
                                <button type="button" id="search_btn" class="btn btn-primary">検索</button>
                                <!--<input type="reset" class="btn btn-default">--> 
                        </div>
                    </div>
                    
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
        <div id="container"></div>
        
@endsection
@section('pageJs')
<script type="text/javascript" src="public/js/highcharts.js"></script>
@endsection
