
<div class="col-lg-6 col-md-8 col-sm-12 main main-app-container" style="height: 600px">
   <div id="graph">
    <div class="Load_overlay"  style="margin-top: 8%">
        <img src="{{ asset('img/loader.gif') }}" alt="Loading" />
   </div></div>
</div> 



<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">


    $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);
    $("#graph").load('/graph_book/'+$url);
 
  /**
  * If URL Changes
  **/
  $(window).bind('hashchange', function(){
    $hash = window.location.hash.slice(1);
    $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);
    $("#graph").load('/graph_book/'+$url);
  });

</script>
