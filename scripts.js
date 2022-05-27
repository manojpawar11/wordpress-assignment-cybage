jQuery(document).ready(function(){
  jQuery("button").click(function(){
    var div = jQuery("div#animate");  
    div.animate({left: '100px'}, "slow");
    div.animate({fontSize: '3em'}, "slow");
  });
});