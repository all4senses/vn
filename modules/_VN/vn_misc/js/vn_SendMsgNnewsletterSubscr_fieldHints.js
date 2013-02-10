(function ($) {

  Drupal.behaviors.vn_SendMsgNnewsletterSubscr_fieldHints = {
    attach: function (context, settings) {
      
      $('#block-vn_blocks-send_msg_n_subscribe input[id="edit-fname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-lname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-email"]').each(function(){
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
      });
      
      $('#block-vn_blocks-send_msg_n_subscribe input[id="edit-fname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-lname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-email"]').focus(function(){
        
        if ($(this).val() == $(this).attr('title')) {
          $(this).val('');
          $(this).removeClass('blur');
        }
        
      });
      
      $('#block-vn_blocks-send_msg_n_subscribe input[id="edit-fname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-lname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-email"]').blur(function(){
        
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
        
      });
      
    }
  };

}(jQuery));