<?php if (!$page): ?>

    <?php if (in_array('administrator', $user->roles)): ?>
      <div class="tabs-wrapper clearfix"><h3 class="element-invisible">Primary tabs</h3>
        <ul class="tabs primary clearfix">
          <li class="active"><a class="active" href="/<?php echo $_GET['q']; ?>">View<span class="element-invisible">(active tab)</span></a></li>
          <li><a href="<?php echo url('node/' . $node->nid . '/edit', array('query' => array('destination' => $_GET['q']))); ?>">Edit</a></li>
          <!--<li><a href="<?php //echo url('node/' . $node->nid . '/devel', array('query' => array('destination' => $_GET['q']))); ?>">Devel</a></li>-->
        </ul>
      </div>
    <?php endif; ?> <!-- if (in_array('administrator', $user->roles))-->
  
<?php endif; ?> <!-- if (!$page) -->
    

  <?php //print $user_picture; ?>


    <h1 class="preface" <?php /*echo preg_replace('/datatype=""/', '', $title_attributes);*/  ?>>
        <?php 
          echo $title; 
        ?>
    </h1>


  <div class="content page preface" 
    <?php 
    echo $content_attributes;
  ?>>
    
    <?php
      
      // Hide links now so that we can render them later.
      hide($content['links']);
      
      echo render($content);
      
      echo 'xxx';
      
      
      
      /*
      
        // Filter criterion: Content: Service Type (field_p_types)
      
        $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
        $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
        $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
        $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
          'smbv' => 'smbv',
        );
      
      */
      
      
          // Get providers by a type.
          $view_name = 'providers'; 
          $display_name = 'block_providers_by_type';
          $view = views_get_view($view_name);

          //$viewsFilterOptions_nodeNid = array('id' => 'field_ref_phone_target_id', 'value' => array('value' => $node->nid));
          //$view->add_item($display_name, 'filter', 'field_data_field_ref_phone', 'field_ref_phone_target_id', $viewsFilterOptions_nodeNid);

          $results = $view->preview($display_name);
          if ($view->result) {
            echo $results;
          }
          else {
            echo '<br/>no providers';
          }

      
      
      
      
      //------------------------------------------------------------------------------------
      
      
    
      $url = 'http://voipnow.org' . ($_GET['q'] == 'home' ? '' : $_SERVER['REQUEST_URI']); // . ($_GET['q'] == 'home' ? '/' : (strpos($_GET['q'], 'node/') === FALSE ? ('/' . $_GET['q']) : url($_GET['q'])));
    ?>
    
     <div class="share">
       <div class="main">
        
        <?php global $user; if(/*$user->uid != */1): ?>
              
              <?php
              
                $share_title = NULL;
                
                if ($is_front) {
                  $share_title = vn_misc_metatag_getFrontTitle();
                }
                
                if (!$share_title) {
                  if (isset($node->metatags['title']['value']) && $node->metatags['title']['value']) {
                    $share_title = $node->metatags['title']['value'];
                  }
                  else {
                    $share_title = $title;
                  }
                }
                echo vn_blocks_getSocialiteButtons($url, $share_title); 
              
              ?> 

         <?php else: ?> 
         
              <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
              <script type="IN/Share" data-url="<?php echo $url?>" data-counter="right" data-showzero="true"></script>

              <script type="text/javascript">
                (function() {
                  var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                  po.src = 'https://apis.google.com/js/plusone.js';
                  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                })();
              </script>
              <g:plusone size="medium" href="<?php echo $url?>"></g:plusone>

              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=138241656284512";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-like" data-href="<?php echo $url?>" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>

              <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url?>">Tweet</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        
        <?php endif; // Of else of if($user->uid == 1) ?> 
        
       </div><!-- main -->
      </div> <!-- share buttons -->
    <?php //endif; ?>
      
  </div>
