(function ($) {

  Drupal.behaviors.vn_floatingSocials = {
    attach: function (context, settings) {
       
       $(".preface .share").stickyfloat({ 
         duration: 100, 
         //stickToBottom: true,
         startOffset: 300
       });

       
    }
  };

}(jQuery));
