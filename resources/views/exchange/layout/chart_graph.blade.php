@php
    use \App\Http\Controllers\Web\OrderController;
    $target_coin = \App\Token::whereTicker($ticker->target_id)->first();
    $base_coin = \App\Token::whereTicker($ticker->base_id)->first();
@endphp
<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 main mb-24 chart-big-container ng-star-inserted" style="height: 600px">
    <!---->
    <app-tv-chart-container _nghost-xmu-c10="" class="ng-star-inserted" >
       
        <div _ngcontent-xmu-c10="" class="app-tv-chart-container-parent" > 
            <div class="row" >
                <div id="trade_title" class="col-md-4" align="center">
                    <img src="{{ $target_coin->image }}" style="height: 15px; width:15px"/> {{ $ticker->target_id}}
                    /
                    <img src="{{ $base_coin->image }}" style="height: 15px; width:15px"/> {{ $ticker->base_id}}
                </div>
                <div class="col-md-7" id="token_details">
                    last 
                    <span class="{{ (new OrderController())->get_24_percent($ticker->pair)['type']}}">
                        {{ (new OrderController())->get_last_price($ticker->pair)}}
                    </span> | 
                    24 high 
                    <span class="positive">
                        {{ (new OrderController())->get_24_high($ticker->pair)}}
                    </span> | 
                    24 low 
                    <span class="negative"> 
                        {{ (new OrderController())->get_24_low($ticker->pair)}}
                    </span> <br/> 
                    24 change 
                    <span class="{{ (new OrderController())->get_24_percent($ticker->pair)['type']}}"> 
                        {{ (new OrderController())->get_24_percent($ticker->pair)['operator'].''.(new OrderController())->get_24_percent($ticker->pair)['percent'] }}%
                    </span> |
                    24 volume 
                    <span>
                        {{ (new OrderController())->get_24_Single_volume($ticker->pair, 'target_coin')." ".$ticker->target_id}}
                        /
                        {{ $ticker->base_id." ".(new OrderController())->get_24_Single_volume($ticker->pair, 'base_coin')}}

                    </span>
                </div>
            </div>
                <div class="app-tv-chart-container-parent" id="chartdiv"  style="width: 100%; height:600px background-color: #FFFFFF;" >
            </div> 
            {{-- </div> --}} 
        </div>
    </app-tv-chart-container>
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
    var graphData;
fetch('http://spectrex.test/user-list/BTC_USDT')
  .then(response =>  response.json())
  .then(data =>  { 
      graphData = data; 
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
            "dataProvider": graphData
           
        }
    );

})
</script>