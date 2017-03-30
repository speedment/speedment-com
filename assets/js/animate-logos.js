(function($) {
  $(document).ready(function() {
      var $listHide = $('#company-logos').find('div[data-info="comapny-logos"]');
      var $listShow = [];
      var numElements = Math.min($listHide.length, 2);
      for(var i = 0; i < numElements; i += 1){
        $listShow.push(getRandomElement($listHide));
      }
      $listShow.forEach(function(e){
        e.fadeIn();
      }
      window.setInterval(function(){
        for(var i = 0; i < numElements; i += 1){
          $listShow.push(getRandomElement($listHide));
        }
      }, 2000);
  });
  function getRandomElement(list){
    var index = Math.floor(Math.random() * list.length);
    return list.splice(index,1);
  }
})( jQuery );
