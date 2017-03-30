(function($) {
  $( document ).ready(function() {
    var $listHide = $('#company-logos').find('div[data-info="comapny-logos"]');
    var $listShow = [];
    var numElements = Math.min($listHide.length-1, 4);
    for(var i = 0; i < numElements; i += 1){
      $listShow.push(getRandomElement($listHide));
    }
    $listShow.forEach(function(e){
      $(e).fadeIn("slow");
    });
    window.setInterval(function(){
        var tempHide = getRandomElement($listShow);
        var tempShow = getRandomElement($listHide);
        $(tempHide).fadeOut("slow", function(){
          $(tempShow).fadeIn("slow");
        });
        $listShow.push(tempShow);
        $listHide.push(tempHide);
        console.log($listShow, $listHide);
    }, 3000);
function getRandomElement(list){
  var index = Math.floor(Math.random() * list.length);
  return list.splice(index,1)[0];
}
});
})( jQuery );
