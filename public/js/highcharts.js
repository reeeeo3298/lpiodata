$(document).ready(function(){
    
    var dt = new Date();
    var y = dt.getFullYear();
    var m = ("00" + (dt.getMonth()+1)).slice(-2);
    var d = ("00" + dt.getDate()).slice(-2);
    var today = y + "/" + m + "/" + d;
    
    console.log(today);
    
    //ajaxでデータ取得
    $.ajax({
        url: '/lpiodata/graph_data',
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'today': today
        }
    }).done(function (data) {
        
        console.log(data[0]);
        
        console.log(data[1]);
        
        var datearray = [];   //日数
        var countarray1 = []; //エルピオweb
        var countarray2 = []; //エネチェンジ
        var countarray3 = []; //価格ＣＯＭ
        var countarray4 = []; //インズウェブ
        var countarray5 = []; //営業直販
        var countarray6 = []; //代理店
        var countarray7 = []; //取次店
        var countarray8 = []; //エルピオアフィリ
        var countarray9 = []; //a8net
        var datasum = null;
        
        //日付集計
        $.each(data[0],function(index,val){
            datearray.push(val.d);
        });
        
        //エルピオweb集計
        $.each(data[0],function(index,val){
            countarray1.push(val.count_day);
        });        
        //エネチェンジ集計
        $.each(data[1],function(index,val){
            countarray2.push(val.count_day);
        });
        //価格ＣＯＭ集計
        $.each(data[2],function(index,val){
            countarray3.push(val.count_day);
        });
        //インズウェブ集計
        $.each(data[3],function(index,val){
            countarray4.push(val.count_day);
        });
        //営業直販集計
        $.each(data[4],function(index,val){
            countarray5.push(val.count_day);
        });
        //代理店集計
        $.each(data[5],function(index,val){
            countarray6.push(val.count_day);
        });
        //取次店集計
        $.each(data[6],function(index,val){
            countarray7.push(val.count_day);
        });
        //エルピオアフィリ集計
        $.each(data[7],function(index,val){
            countarray8.push(val.count_day);
        });
        //a8net集計
        $.each(data[8],function(index,val){
            countarray9.push(val.count_day);
        });
        
        $.each(data[0],function(index,val){
            datasum = datasum + val.count_day;
        });
        
//        console.log(countarray);
        
    Highcharts.setOptions({
            lang:{
                contextButtonTitle: '画像としてダウンロード',
                printChart:         'グラフを印刷',
                downloadJPEG:       'JPEG画像でダウンロード',
                downloadPDF:        'PDF文書でダウンロード',
                downloadPNG:        'PNG画像でダウンロード',
                downloadSVG:        'SVG形式でダウンロード'
            }
    });
        
    Highcharts.chart('container', {  //グラフ描画のテンプレート

    title: {  //グラフのタイトル
        text: '今月申込件数'
    },
    xAxis: {
                categories: datearray
    },

    subtitle: {  //グラフのサブタイトル
        text: '獲得件数：' + data[9]
    },

    yAxis: {//y軸の設定
                title: {//y軸のタイトル
                    text: '件数'
                },
                allowDecimals:false
    },
    legend: {  //グラフの凡例
        layout: 'vertical',  //縦方向に並べる
        align: 'right',  //グラフの右に表示（左右中央）
        verticalAlign: 'middle'  //グラフの中央に表示（上下中央）
    },

    credits:{
                enabled:false
    },

    series: [{  //グラフの中身（データの設定）
        name: 'エルピオＷＥＢ',  //各データの名前
        data: countarray1 //各データ(数値)
    }, {
        name: 'エネチェンジ',
        data: countarray2
    }, {
        name: '価格ＣＯＭ',
        data: countarray3
    }, {
        name: 'インズウェブ',
        data: countarray4
    }, {
        name: '営業直販',
        data: countarray5
    }, {
        name: '代理店',
        data: countarray6
    }, {
        name: '取次店',
        data: countarray7
    }, {
        name: 'エルピオアフィリ',
        data: countarray8
    }, {
        name: 'a8net',
        data: countarray9
    }]        
        });
    }); 
});


//検索ボタンクリック
$('#search_btn').click(function(){
    
    var s_month = $('[name="month"]').val();
    
    console.log(s_month);
    
    //ajaxでデータ取得
    $.ajax({
        url: '/lpiodata/graph_data',
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'today': s_month
        }
    }).done(function (data) {
        
        console.log(data[0]);
        
        console.log(data[1]);
        
        var datearray = [];   //日数
        var countarray1 = []; //エルピオweb
        var countarray2 = []; //エネチェンジ
        var countarray3 = []; //価格ＣＯＭ
        var countarray4 = []; //インズウェブ
        var countarray5 = []; //営業直販
        var countarray6 = []; //代理店
        var countarray7 = []; //取次店
        var countarray8 = []; //エルピオアフィリ
        var countarray9 = []; //a8net
        var datasum = null;
        
        //日付集計
        $.each(data[0],function(index,val){
            datearray.push(val.d);
        });
        
        //エルピオweb集計
        $.each(data[0],function(index,val){
            countarray1.push(val.count_day);
        });        
        //エネチェンジ集計
        $.each(data[1],function(index,val){
            countarray2.push(val.count_day);
        });
        //価格ＣＯＭ集計
        $.each(data[2],function(index,val){
            countarray3.push(val.count_day);
        });
        //インズウェブ集計
        $.each(data[3],function(index,val){
            countarray4.push(val.count_day);
        });
        //営業直販集計
        $.each(data[4],function(index,val){
            countarray5.push(val.count_day);
        });
        //代理店集計
        $.each(data[5],function(index,val){
            countarray6.push(val.count_day);
        });
        //取次店集計
        $.each(data[6],function(index,val){
            countarray7.push(val.count_day);
        });
        //エルピオアフィリ集計
        $.each(data[7],function(index,val){
            countarray8.push(val.count_day);
        });
        //a8net集計
        $.each(data[8],function(index,val){
            countarray9.push(val.count_day);
        });
        
        $.each(data[0],function(index,val){
            datasum = datasum + val.count_day;
        });
        
//        console.log(countarray);
        
    Highcharts.setOptions({
            lang:{
                contextButtonTitle: '画像としてダウンロード',
                printChart:         'グラフを印刷',
                downloadJPEG:       'JPEG画像でダウンロード',
                downloadPDF:        'PDF文書でダウンロード',
                downloadPNG:        'PNG画像でダウンロード',
                downloadSVG:        'SVG形式でダウンロード'
            }
    });
        
    Highcharts.chart('container', {  //グラフ描画のテンプレート

    title: {  //グラフのタイトル
        text: '今月申込件数'
    },
    xAxis: {
                categories: datearray
    },

    subtitle: {  //グラフのサブタイトル
        text: '獲得件数：' + data[9]
    },

    yAxis: {//y軸の設定
                title: {//y軸のタイトル
                    text: '件数'
                },
                allowDecimals:false
    },
    legend: {  //グラフの凡例
        layout: 'vertical',  //縦方向に並べる
        align: 'right',  //グラフの右に表示（左右中央）
        verticalAlign: 'middle'  //グラフの中央に表示（上下中央）
    },

    credits:{
                enabled:false
    },

    series: [{  //グラフの中身（データの設定）
        name: 'エルピオＷＥＢ',  //各データの名前
        data: countarray1 //各データ(数値)
    }, {
        name: 'エネチェンジ',
        data: countarray2
    }, {
        name: '価格ＣＯＭ',
        data: countarray3
    }, {
        name: 'インズウェブ',
        data: countarray4
    }, {
        name: '営業直販',
        data: countarray5
    }, {
        name: '代理店',
        data: countarray6
    }, {
        name: '取次店',
        data: countarray7
    }, {
        name: 'エルピオアフィリ',
        data: countarray8
    }, {
        name: 'a8net',
        data: countarray9
    }]        
        });
    }); 
});
