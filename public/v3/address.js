
  //noty functions
  function _success($sql){
    new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        text: $sql
    }).show();
  }

  function _warning($sql){
    new Noty({
        type: 'warning',
        layout: 'topRight',
        timeout: 3000,
        text: $sql
    }).show();
  }

  function _danger($sql){
    new Noty({
        type: 'error',
        layout: 'topRight',
        timeout: 3000,
        text: $sql
    }).show();
  }


    $(".dropdown").click(function(){
       $(".dropdown").toggleClass("selected");
       $(".caret").toggleClass("transform-caret");
       $(".symbol-name").toggleClass("ng-star-inserted");
       $(".symbol-name").toggleClass("blue-border");
       $("#dt").toggleClass("hide");
    });


  $(".ctype").click(function(){
    $val = $(this).html();
     $("#currency").html($val.trim());
     $("#address").removeAttr("readonly");
    //alert($val);
  });

  $("#address").keyup(function(){
    $var = $("#address").val()
     $var.length > 0 ? $("#saveaddress").removeAttr("disabled") : $("#saveaddress").attr("disabled","disabled");

  });


  $.getJSON("https://ipapi.co/json",
    function(json) {
      $("#c_code").html(json.country_calling_code);
    }
  );




  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imageBox').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}



  $(".uploaddoc").click(function(){
    $data = $(this).data('type');
    $("#filetype").val($data);
    $title = ($data == 'passport') ? 'Selfie' : ($data == 'residence') ? 'Proof of Residence' : 'Government Issued ID';
    $("#cardtitle").html($title);
     $("#upload").toggleClass('show');



  });
  $("#closeupload").click(function(){
     $("#upload").toggleClass('show');
     // $('#imageBox').attr('src', '');
  });





