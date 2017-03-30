(function ($) {
  $( document ).ready(function() {
    var showCompany = 4;
    var $list = $('#company-logos').find('div[data-info="company-logos"]');
    var $wrapper = $('div[data-tag="company-logos-wrapper"]');
    window.setInterval(function () {
      var $newArray = shuffle($list);
        $wrapper.fadeOut("slow", function () {
          $wrapper.html('');
          $wrapper.show();
          $wrapper.append($newArray.slice(0, showCompany));
          $newArray.slice(0, showCompany).hide();
          $wrapper.find('div[data-info="company-logos"]').fadeIn('slow');
        });
      $list = $newArray;
    }, 3000);
    function shuffle(oldArray) {
      var array = oldArray.slice();
      var currentIndex = array.length,
        temporaryValue,
        randomIndex;
      while (0 !== currentIndex) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
      }
      return array;
    }
  }
})(jQuery);
