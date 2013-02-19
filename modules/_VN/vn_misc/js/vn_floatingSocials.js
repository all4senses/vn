(function ($) {

  Drupal.behaviors.vn_floatingSocials = {
    attach: function (context, settings) {
       
       $(".preface .share").stickyfloat({ duration: 400 });

       
    }
  };

}(jQuery));
