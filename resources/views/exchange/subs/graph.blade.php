@php
    use \App\Http\Controllers\Web\OrderController;
    $target_coin = \App\Token::whereTicker($pair->target_id)->first();
    $base_coin = \App\Token::whereTicker($pair->base_id)->first();
    $graphData = (new OrderController())->graphData($pair->pair);
@endphp
<div class="row" >
    <div id="trade_title" class="col-md-4" align="center">
        <img src="{{ $target_coin->image }}" style="height: 15px; width:15px"/> {{ $pair->target_id}}
        /
        <img src="{{ $base_coin->image }}" style="height: 15px; width:15px"/> {{ $pair->base_id}}
    </div>
    <div class="col-md-7" id="token_details">
        last 
        <span class="{{ (new OrderController())->get_24_percent($pair->pair)['type']}}">
            {{ (new OrderController())->get_last_price($pair->pair)}}
        </span> | 
        24 high  
        <span class="positive">
            {{ (new OrderController())->get_24_high($pair->pair)}}
        </span> | 
        24 low 
        <span class="negative"> 
            {{ (new OrderController())->get_24_low($pair->pair)}}
        </span> <br/> 
        24 change 
        <span class="{{ (new OrderController())->get_24_percent($pair->pair)['type']}}"> 
            {{ (new OrderController())->get_24_percent($pair->pair)['operator'].''.(new OrderController())->get_24_percent($pair->pair)['percent'] }}%
        </span> |
        24 volume 
        <span>
            {{ (new OrderController())->get_24_Single_volume($pair->pair, 'target_coin')." ".$pair->target_id}}
            /
            {{ $pair->base_id." ".(new OrderController())->get_24_Single_volume($pair->pair, 'base_coin')}}

        </span>
    </div>
</div>

        <div class="app-tv-chart-container-parent" id="chartdiv"  style="width: 100%; height:600px background-color: #FFFFFF;" >
        </div>   
    
    

<style>
    span{
        font-weight: bold;
        font-size: 12px;
    }
    #trade_title {
        margin: 10px;
        float:left;
        font-weight: bolder;
        font-size: 18px;
    }
    #token_details {
        margin: 10px;
        float: right;
        font-size: 12px;
        line-height: 16px;
    }
    .negative{
        color:red
    }
    .positive{
        color: green
    }
</style>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>

<script type="text/javascript">
    var graphData = JSON.parse('<?php print_r($graphData);?> ');

    fetch('/graph-data/{{$pair->pair}}')
    .then(response =>  response.json())
    .then(data => {
    console.log(data);

        AmCharts.makeChart("chartdiv",
        {
            "type": "serial",
            "categoryField": "date",
            "dataDateFormat": "YYYY-MM-DD",
            "angle": 2,
            "depth3D": 1,
            "plotAreaBorderAlpha": 0.4,
            "borderColor": "#0000FF",
            "color": "#0000FF",
            "fontFamily": "Arial",
            "fontSize": 13,
            "handDrawScatter": 3,
            "handDrawThickness": 2,
            "categoryAxis": {
                "parseDates": true
            },
            "chartCursor": {
                "enabled": true
            },
            "chartScrollbar": {
                "enabled": true,
                "graph": "g1",
                "graphType": "line",
                "scrollbarHeight": 30
            },
            "trendLines": [],
            "graphs": [
                {
                    "balloonText": "Open:<b>[[open]]</b><br>Low:<b>[[low]]</b><br>High:<b>[[high]]</b><br>Close:<b>[[close]]</b><br>",
                    "closeField": "close",
                    "fillAlphas": 0.9,
                    "fillColors": "#7f8da9",
                    "highField": "high",
                    "id": "g1",
                    "lineColor": "#7f8da9",
                    "lowField": "low",
                    "negativeFillColors": "#db4c3c",
                    "negativeLineColor": "#db4c3c",
                    "openField": "open",
                    "title": "Price:",
                    "type": "candlestick",
                    "valueField": "close"
                }
            ],
            "guides": [],
            "valueAxes": [
                {
                    "id": "ValueAxis-1"
                }
            ],
            "allLabels": [],
            "balloon": {},
            "titles": [],
            "dataProvider": data
           
        }
    );
});

  
</script>
