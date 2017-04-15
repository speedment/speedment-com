(function ($) {
  $( document ).ready(function() {
    var showCompany = 5;
    var $list = $('#company-logos').find('div[data-info="company-logos"]');
    var $wrapper = $('div[data-info="company-logos-wrapper"]');
    showIcons();
    window.setInterval(function () {
      shuffle($list);
        $wrapper.fadeOut("slow", function () {
          showIcons();
        });
    }, 8000);
    function showIcons() {
      $wrapper.html('');
      $wrapper.show();
      $wrapper.append($list.slice(0, showCompany));
      $list.slice(0, showCompany).hide();
      $wrapper.find('div[data-info="company-logos"]').fadeIn('slow');
    }
    function shuffle(oldArray) {
      var array = oldArray;
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
