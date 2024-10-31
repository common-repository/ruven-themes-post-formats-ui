jQuery(document).ready(function($) {

  toggle_post_format_meta_box();
  $('input:radio[name=post_format]').change(toggle_post_format_meta_box);



  /* Toggle Post Format Meta Box
  ============================================================ */

  function toggle_post_format_meta_box()
  {
    var prefix = 'rtpfui_';
    var formats = ['video', 'audio', 'gallery', 'link', 'image', 'aside', 'quote', 'status', 'chat'];
    var active_format = $('input:radio[name=post_format]:checked').val();

    formats.forEach(function(format) {
      var meta_box = $('#' + prefix + format + '-metabox');
      if(format != active_format) meta_box.hide();
      else                        meta_box.show();
    });
  }

});