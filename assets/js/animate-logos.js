(function ($) {
  $(document).ready(function () {
    var $list = $('#company-logos').find('div[data-info="company-logos"]');
    window.setInterval(function () {
      var $newArray = shuffle($list);
      for (var i = 0; i < list.length; i += 1) {
        $(list[i]).fadeOut("slow", function () {
          $($newArray[i]).fadeIn("slow");
        });
      }
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
  });
})(jQuery);
