$(document).ready(function(){
    
    var today = new Date();

    var month = today.getMonth()+1;
    
    console.log(month);
    
    //ajaxでデータ取得
    $.ajax({
        url: '/Datacount/graph_data',
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'month': month
        }
    }).done(function (data) {
        
        console.log(data[0]);
        
        console.log(data[1]);
        
        var datearray = []; 
        var countarray = [];  //エルピオweb
        var countarray2 = []; //エネチェンジ
        var datasum = null;
        
        //日付集計
        $.each(data[0],function(index,val){
            datearray.push(val.d);
        });
        
        //件数集計
        $.each(data[0],function(index,val){
            countarray.push(val.count_day);
        });
        
        $.each(data[1],function(index,val){
            countarray2.push(val.count_day);
        });
        
        $.each(data[0],function(index,val){
            datasum = datasum + val.count_day;
        });
        
        console.log(countarray);
        
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
        text: '月申込'
    },
    xAxis: {
                categories: datearray
    },

    subtitle: {  //グラフのサブタイトル
        text: '獲得件数：' + datasum
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
        data: countarray //各データ(数値)
    }, {
        name: 'エネチェンジ',
        data: countarray2
    }]        
        });
    }); 
});