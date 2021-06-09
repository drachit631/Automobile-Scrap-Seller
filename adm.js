$(document).ready(function(){
  $("a.mobile").click(function(){
    $(".sidebar").slideToggle('fast');
  });
  window.resize = function(event){
    if($(window).width() > 320){
      $(".sidebar").show();
    }
  };
});

