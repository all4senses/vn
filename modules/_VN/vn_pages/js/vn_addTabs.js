(function ($) {

  Drupal.behaviors.vn_addTabs = {
    attach: function (context, settings) {

        //console.log('Tabs!');
        $( ".data.tabs" ).tabs();
        
    }
  };

}(jQuery));