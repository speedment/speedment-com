(function ($) {
    var $list = $('#company-logos').find('div[data-info="company-logos"]');
    window.setInterval(function () {
      var $newArray = shuffle($list);
      var $wrapper = $('div[data-info="company-logos-wrapper"]');
      for (var i = 0; i < 3; i += 1) {
        $wrapper.fadeOut("slow", function () {
          for (var i = 0; i < 3; i += 1) {
            $($newArray[i]).fadeIn("slow");
          }
        });
      $list = $newArray;
    }, 6000);
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
})(jQuery);
