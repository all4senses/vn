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
      
      hide($content['field_preface_bottom']);
      echo render($content);
      
      
      


      //------------------------------------------------------------------------------------
      
      
      $vocabularies = array(
        'VoIP Equipment' => array('vid' => 5, 'url' => 'equipment'),
        'VoIP Features' => array('vid' => 4, 'url' => 'features'),
        'VoIP Protocols' => array('vid' => 6, 'url' => 'protocols'),
      );
      
      foreach ($vocabularies as $v_title => $v_data) {
        $query = db_select('taxonomy_term_data', 'td');
        $query->fields('td', array('tid', 'name'));
        $query->condition('td.vid', $v_data['vid']);
        
        $countQuery = $query->countQuery();
        
        $terms = $query->execute();
        
        $amount = $countQuery->execute()->fetchField();
  
        dpm('amount = ' . $amount);
        
        //$out = '';
        $out = '<div class="col-1">';
        $count = 0;
        $second = NULL;
        $third = NULL;
        foreach ($terms as $term) {
          //$out .= ($out ? ', ' : '') .  l($term->name, 'taxonomy/term/' . $term->tid);
          if (!$second && $count > ($amount - 1)/2) {
            $out .= '</div><div class="col-2">';
            $second = TRUE;
          }
          $out .= '<div class="link">' .  l($term->name, 'taxonomy/term/' . $term->tid) . '</div>';
        }
        $out .= '</div>';
        
        echo '<div class="types-block ' . $v_title . '">' . '<div class="title">' . l($v_title, $v_data['url']) . '</div><div class="content">' . $out . '</div></div>';
      }
      
      
      $service_types = array(
        'Business VoIP' => 'usage/business',
        'Enterprise VoIP' => 'usage/enterprise', 
        'Midsize Business VoIP' => 'usage/midsize-business', 
        'Residential VoIP' => 'usage/residential', 
        'Small Business VoIP' => 'usage/small-business',
      );
      $out = '';
      foreach ($service_types as $s_title => $s_url) {
        $out .= ($out ? ', ' : '') .  l($s_title, $s_url);
      }
      
      echo '<div class="types-block ' . $v_title . '">' . '<div class="title">' . l('VoIP Usage: ', 'usage') . '</div><div class="content">' . $out . '</div></div>';
      
      echo '<div class="notice">Not sure which type of VoIP you\'re looking for? Try browsing our list of featured VoIP providers below...</div>';
      
      
      if (@$node->field_display_type['und'][0]['value'] == 1) {
        echo render($content['field_preface_bottom']);
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
