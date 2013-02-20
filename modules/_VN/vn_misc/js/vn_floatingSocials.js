(function ($) {

  Drupal.behaviors.vn_floatingSocials = {
    attach: function (context, settings) {
       
       //$(".preface .share").stickyfloat({duration: 100});
       ////$(".test.share").stickyfloat({duration: 100});
       
       $(".float.share").stickyfloat({ 
         duration: 200, 
         //stickToBottom: true,
         //startOffset: 300,
         offsetY: -150
       });

       
    }
  };

}(jQuery));
