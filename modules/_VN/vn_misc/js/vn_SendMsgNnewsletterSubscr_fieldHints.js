(function ($) {

  Drupal.behaviors.vn_SendMsgNnewsletterSubscr_fieldHints = {
    attach: function (context, settings) {
      
      //$('#block-vn_blocks-send_msg_n_subscribe input[id="edit-fname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-lname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-email"], #block-vn_blocks-send_msg_n_subscribe textarea[id="edit-message"]').each(function(){
      $('#block-vn-blocks-send-msg-n-subscribe input[id="edit-fname"], #block-vn-blocks-send-msg-n-subscribe input[id="edit-lname"], #block-vn-blocks-send-msg-n-subscribe input[id="edit-email"], #block-vn_blocks-send_msg_n_subscribe textarea[id="edit-message"]').each(function(){
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
      });
      
      //$('#block-vn_blocks-send_msg_n_subscribe input[id="edit-fname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-lname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-email"], #block-vn_blocks-send_msg_n_subscribe textarea[id="edit-message"]').focus(function(){
      $('#block-vn-blocks-send-msg-n-subscribe input[id="edit-fname"], #block-vn-blocks-send-msg-n-subscribe input[id="edit-lname"], #block-vn-blocks-send-msg-n-subscribe input[id="edit-email"], #block-vn_blocks-send_msg_n_subscribe textarea[id="edit-message"]').focus(function(){
        
        if ($(this).val() == $(this).attr('title')) {
          $(this).val('');
          $(this).removeClass('blur');
        }
        
      });
      
      //$('#block-vn_blocks-send_msg_n_subscribe input[id="edit-fname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-lname"], #block-vn_blocks-send_msg_n_subscribe input[id="edit-email"], #block-vn_blocks-send_msg_n_subscribe textarea[id="edit-message"]').blur(function(){
      $('#block-vn-blocks-send-msg-n-subscribe input[id="edit-fname"], #block-vn-blocks-send-msg-n-subscribe input[id="edit-lname"], #block-vn-blocks-send-msg-n-subscribe input[id="edit-email"], #block-vn-blocks-send-msg-n-subscribe textarea[id="edit-message"]').blur(function(){
        
        if ($(this).val() == '') {
          $(this).val($(this).attr('title'));
          $(this).addClass('blur');
        }
        
      });
      
    }
  };

}(jQuery));