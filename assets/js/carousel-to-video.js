
(function ($) {
  $( document ).ready(function() {
      $('#front-page-video-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var url = button.data('video') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or
        // other methods instead.
        var modal = $(this)
        modal.find('iframe').attr('src', url);
      }).on('hidden.bs.modal', function () {
        console.log("click");
      $(this).find('iframe').removeAttr('src');
    });
  });
})(jQuery);
