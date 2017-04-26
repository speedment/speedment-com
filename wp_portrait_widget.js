jQuery(document).ready(function($) {
  function media_upload(button_class) {
    if (typeof(wp.media) === 'object') {
        var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;

        $('body').on('click', button_class, function(e) {
          var button_id = '#' + $(this).attr('id');
          var self = $(button_id);
          var send_attachment_bkp = wp.media.editor.send.attachment;
          var parent = self.parent();
          var id = self.attr('id').replace('_button', '');
          _custom_media = true;
          wp.media.editor.send.attachment = function(props, attachment) {
            if (_custom_media) {
              parent.children('.custom_media_id').val(attachment.id);
              parent.children('.custom_media_url').val(attachment.url);
              parent.children('.custom_media_image')
                .attr('src', attachment.url)
                .css('display', 'block');
            } else {
              return _orig_send_attachment.apply(button_id, [props, attachment]);
            }
          }
          wp.media.editor.open(self);
          return false;
        });
     }
  }

  media_upload('.custom_media_button.button');
});
