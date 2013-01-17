  <h1 class="preface" <?php echo preg_replace('/datatype=""/', '', $title_attributes); ?>>
      <?php 
        echo $title; 
      ?>
  </h1>

  <div class="content page preface" <?php echo $content_attributes;?>>
    
  <?php

    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);

    hide($content['field_preface_bottom']);

    echo render($content);
    

    
    
    
    
    
// Ookla speed test page original content. -------------------------------------------------------------------------------
    
  
  //$path_to_lib = 'sites/all/libraries/ookla/';
  $path_to_lib = 'ookla/';
  
  //drupal_add_js($path_to_lib . 'swfobject.js');
  drupal_add_js($path_to_lib . 'browserdetect.js');
  //drupal_add_js($path_to_lib . 'deployJava.js');
  //drupal_add_js($path_to_lib . 'functions.js');
  
  $path_to_custom_js = drupal_get_path('module', 'vn_pages') . '/js/';
  drupal_add_js($path_to_custom_js . 'vn_speedtest_page.js');
  
?>
    
<script type="text/javascript" src="/ookla/swfobject.js"></script>
<script type="text/javascript" src="/ookla/deployJava.js"></script>
<script type="text/javascript" src="/ookla/functions.js"></script>



<script language="JavaScript">

function toJava(jsmethod,args) {
	var e = document.getElementById("VoipApplet");
	if (e) {
		e.fromJS(jsmethod,args);
	}
}
function fromJava(jsmethod,args) {
	setTimeout("flashCall(\'" + jsmethod + "\', \'" + args + "\')", 100);
}
function flashCall(jsmethod, args) {
	var e = document.getElementById("flashtest");
	if (e) {
		e.fromJS(jsmethod, args);
	}
}

</script>


<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP ABOVE THE LINE QUALITY TEST BUT DISAPPEAR AFTER IT COMPLETES
<div id="abovebefore">
Edit index.html to change or remove this example content that will <strong>disappear after</strong> the test is run once.
</div>
-->

<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP ABOVE THE LINE QUALITY TEST AFTER IT COMPLETES
<div id="aboveafter" style="display: none;">
This content will <strong>not appear until after</strong> the test is run once. Edit index.html to change or remove it.
</div>
<br/>
-->

<div id="speedtest-main-window">
  
<div id="linequalitytest">
The Ookla Line Quality Test requires at least version 8 of Flash. <a href="http://get.adobe.com/flashplayer/">Please update your client</a>.
</div>


<div id="speed"></div>
<div id="javaerror" style="display: none;"><br/>The Ookla Line Quality Test requires Java. <a href="javascript:deployJava.installLatestJRE();">Please update your client.</a><br/><br/></div>



<?php // <applet code="VoipApplet.class" archive="/sites/all/libraries/ookla/LQApplet.jar?v=1.1" width="1" height="1" mayscript id="VoipApplet" name="VoipApplet"> ?>
<applet code="VoipApplet.class" archive="/ookla/LQApplet.jar?v=1.1" width="1" height="1" mayscript id="VoipApplet" name="VoipApplet">  

  <param name="bgcolor" value="ffffff">
	<param name="packetlosslength" value="100">
	<param name="tcpport" value="5060">
	<param name="udpport" value="5060">
  
  <param name="debug" value="false">
  
	<param name="latencylength" value="10">
	<param name="latencypause" value="20">
	<param name="packetlosspause" value="20">
</applet>



<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP BELOW THE LINE QUALITY TEST BUT DISAPPEAR AFTER IT COMPLETES
<br/>
<div id="belowbefore">

This content will <strong>disappear after</strong> the test is run once. Edit index.html to change or remove it.
<br/><br/>
If you are having trouble getting things working as expected, then please see our <a href="http://wiki.ookla.com" target="_blank">documentation</a>.
</div>
-->

<!-- ANYTHING PLACED IN THIS DIV WILL SHOW UP BELOW THE LINE QUALITY TEST AFTER IT COMPLETES
<div id="belowafter" style="display: none;">
Edit index.html to change or remove this example content that will <strong>not appear until after</strong> the test is run once.
</div>
-->

</div>

<?php // End of Ookla speed test page original content. ------------------------------------------------------------------------------- ?>


    
    
    
    
  <?php

    if (@$node->field_display_type['und'][0]['value'] == 1) {
      echo render($content['field_preface_bottom']);
    }
    
  ?>

     <div class="share">
       <div class="main">
        
              <?php
              
                if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
                  $share_title = $node->metatags['title']['value'];
                }
                else {
                  $share_title = $title;
                }

                $url = 'http://voipnow.org' . $_SERVER['REQUEST_URI']; 
                echo vn_blocks_getSocialiteButtons($url, $share_title); 
              
              ?> 

           </div> <!-- main -->
      </div> <!-- share buttons -->
    <?php //endif; ?>
      
  </div>
