<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

           
  <div class="main-content" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
    
        <?php if ($page): ?>
          <h1<?php //print $title_attributes; ?> property="dc:title v:summary" <?php if (!$node->status) {echo ' class="not-published"';}?> >
                <?php 
                  print $title; //t('Our Take on !p Business VoIP Provider', array('!p' => $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/) )
                ?>
          </h1>
   
        <?php else: ?>
          <header>
        
            <h2<?php //print $title_attributes; ?> property="dc:title v:summary">
                <a href="<?php print $node_url; ?>">
                  <?php print $title; ?>
                </a>
            </h2>
        
          </header>
        <?php endif; ?>
    

    

        <div class="content"<?php print $content_attributes; ?>>
          
          
          
           <?php if ($page): ?>
              <div class="logo-share">
                <?php
                
                  //dpm($content);
                  //dpm($node);
                  
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    echo '<div class="logo"><a href="' . $node->p_data['info']['i_web'] . '" target="_blank">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $content['field_p_logo'][0]['#item']['alt'], 'title' => $content['field_p_logo'][0]['#item']['title'], 'attributes' => array('rel' => 'v:photo'))) . '</a></div>'; 
                  }
                  else {
                    //echo render($title_prefix), '<h1', $title_attributes,'><a href="', $node_url, '>', $title, '</a></h1>', render($title_suffix);
                    echo render($title_prefix), '<h2', $title_attributes,'>', $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/, '</h2>', render($title_suffix);
                  }
                  $url = 'http://voipnow.org'. url('node/' . $node->nid);
                ?>
                
                <div class="share main">
                  
                  <div id="facebook-b">
                    <div id="fb-root"></div>
                    <div id="fb">
                      <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=138241656284512";
                        fjs.parentNode.insertBefore(js, fjs);
                      }(document, 'script', 'facebook-jssdk'));</script>
                      <div class="fb-like" data-href="<?php echo $url?>" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>
                    </div>
                  </div>

                  <div id="gplus-b">
                    <script type="text/javascript">
                      (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                      })();
                    </script>
                    <g:plusone size="medium" href="<?php echo $url?>"></g:plusone>
                  </div>

                  <div id="linkedin-b">
                    <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
                    <script type="IN/Share" data-url="<?php echo $url?>" data-counter="right" data-showzero="true"></script>
                  </div>

                  <div id="twitter-b">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url?>">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                  </div>
                  
                </div> <!-- main share buttons -->
                
              </div> <!-- <div class="logo share">-->
                
              <div class="basic-info" rel="v:itemreviewed">
                <div typeof="Organization">
                  <div class="caption"><?php echo t('!p Corporate Info:', array('!p' => '<span property="v:itemreviewed">' . $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/ . '</span>')); ?></div>
                  <div><?php echo '<span class="title">' . t('Headquarters') . ':</span><span property="v:address">' . @$node->p_data['info']['i_heads'] . '</span>'; ?></div>
                  <div><?php echo '<span class="title">' . t('Founded In') . ':</span>' . @$node->p_data['info']['i_founded']; ?></div>
                  <div><?php echo '<span class="title">' . t('Service Availability') . ':</span>' . @$node->p_data['info']['i_availability']; ?></div>
                  <div><?php if (!@$node->p_data['info']['i_web_hide']) echo '<span class="title">' . t('Website') . ':</span>' . l( (isset($node->p_data['info']['i_web_display']) && $node->p_data['info']['i_web_display']) ? $node->p_data['info']['i_web_display'] : str_replace(array('http://', 'https://'), '', $node->p_data['info']['i_web']), $node->p_data['info']['i_web'], array('attributes' => array('rel' => 'v:url', 'target' => '_blank'))); ?></div>
                </div>
              </div>
             
              <div class="image">
                <?php
                  if (isset($content['field_p_image'][0]['#item']['uri'])) {
                    echo '<div><a href="' , $node->p_data['info']['i_web'] , '" target="_blank">' , theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'image_provider_page', 'alt' =>  $content['field_p_image'][0]['#item']['alt'], 'title' =>  $content['field_p_image'][0]['#item']['title'])) , '</a></div>', 
                         '<div class="site">' , l('Visit ' . $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/, $node->p_data['info']['i_web'], array('external' => TRUE, 'attributes' => array('target' => '_blank'))) , '</div>';
                  }
                ?>  
                
              </div>
          
              
              <div class="bottom-clear"></div>

              <?php if (isset($content['vn_ratings']) && $content['vn_ratings']): ?>

                  <div class="vn_votes"><?php echo '<div class="caption">' . t('Overall Consumer Ratings') . '</div>' . render($content['vn_ratings']); ?></div>
                  <div class="overall"> 
                    <div class="text">
                      <?php echo '<a id="write-review" href="/voip-provider-submit-user-review?id=' . $node->nid . '"><img src="/sites/default/files/writeareview.png" /></a><div class="voters"><div class="title">' . 'Number of Reviews' . ':</div><div class="count" property="v:count"><a href="#reviews">' . $node->vn_voters . '</a></div></div>'; ?>
                      <?php //echo render($content['vn_recommend']); ?>
                      <?php echo '<div class="recommend"><div class="title">' . t('Would recommend') . ': </div><div class="data">' . $node->vn_recommend . '% of Users' . '</div></div>'; ?>
                      <div class="overall title"><?php $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/ . ' ' . t('Overall Rated:'); ?></div>
                    </div>
                    <div class="star-big">
                      <?php echo /*render($content['vn_rating_overall'])*/ '<div class="count" content="' . $node->vn_rating_overall . '" property="v:rating">' . $node->vn_rating_overall . '</div>' . '<div class="descr">' . t('Out of 5 stars') . '</div>'; ?>
                    </div>
                  </div>
              
              <?php endif; // end of if ($page && isset($content['vn_ratings']) && $content['vn_ratings']): ?>
              
              <div class="bottom-clear"></div>
              
              
                      
              <div class="data tabs">
                
                <ul>
                  <li><a href="#tabs-1"><?php echo t('!p Rundown', array('!p' => isset($node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/) ? /*'<span property="v:itemreviewed">' .*/ $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/ /*. '</span>'*/ : t(' Provider') )); ?></a></li>
                  <?php 
                  
                  ?>
                </ul>
                <div id="tabs-1">
                  <?php echo render($content['body']); ?>
                </div>
                
                
              </div> <?php // End of <div class="data tabs"> ?>
              
          <?php echo render($content['metatags']); //vn_misc_renderMetatags_newOrder($content['metatags']);?>
          
          
              
              
              
              
          <?php else: ?> <!-- if ($page): -->
          
              <div class="logo">
                <?php
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    echo '<div class="logo">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page')) . '</div>';
                  }
                  else {
                    echo render($title_prefix), '<h2', $title_attributes,'>', $node->field_p_name['und'][0]['value'], '</h2>', render($title_suffix);
                  }
                ?>
              </div>
          
              <?php echo render($content['body']); ?>
          
          
          
          <?php endif; ?>  <!-- if ($page): -->
           
              
          <?php //echo render($content); ?>
          
        </div> <!-- content -->

        
        
      <?php if ($page): ?>
    
        <footer>
          
          
          <?php 
            $wp_fields = unserialize(WP_FIELDS);
            
            
            
//            911 Service:	Included
//            International Calling:	Yes
//            Guarantee:	30-day money back
//            Plans:	Residential, Business
                    
            $quick_stats_out = '';
            $quick_stats_keys = array('fe_911_Service', 'fe_International_Calling', 'fe_Guarantee');
            
            $quick_stats_plans_keys = array('fe_Residential', 'fe_Small_Business', 'fe_Enterprise', 'fe_Mid_Size_Business');
            
            $plans = '';
            foreach ($quick_stats_plans_keys as $quick_stats_plans_key) {
              if(!empty($node->p_data['wp_fields']['Features'][$quick_stats_plans_key])) {
                $plans .= ($plans ? ', ' : '') . $wp_fields['Features'][$quick_stats_plans_key];
              }
            }
            
            foreach ($quick_stats_keys as $quick_stats_key) {
              if (!empty($node->p_data['wp_fields']['Features'][$quick_stats_key])) {
                $quick_stats_out .= '<div>' . $wp_fields['Features'][$quick_stats_key] . ': ' . $node->p_data['wp_fields']['Features'][$quick_stats_key] . '</div>';
              }
              else {
                $quick_stats_out .= '<div>' . $wp_fields['Features'][$quick_stats_key] . ': No</div>'; 
              }
            }
            
            echo '<div class="title">Quick Stats</div>';
            echo '<div>' . $quick_stats_out . '<div>Plans: ' .  $plans . '</div></div>';
            
            
            echo '<div class="title">List of Features Available on ' , $node->field_p_name['und'][0]['value'], '</div>';
            
            foreach ($node->p_data['wp_fields']['Features'] as $key => $feature) {
              if ($feature) {
                $features[] = $wp_fields['Features'][$key] . ': ' . $feature;
              }
            }
            //dpm($features);
            $rows = count($features);
            $features_count = 0;
            $features_out = '';
            for ($i = 0; $i < 3; $i++) {
              $features_out .= '<div>';
              for ($j = 0; $j < ($rows / 3); $j++) {
                if (!isset($features[$features_count])) {
                  $features_out .= '</div>';
                  break 2; 
                }
                $features_out .= '<div>' . $features[$features_count++] . '</div>';
              }
              $features_out .= '</div>';
            }
            
            echo $features_out;
            
            
          
//            if (isset($content['field_topics'])) {
//              $tags = NULL;
//              foreach (element_children($content['field_topics']) as $key) {
//                $tags .= ($tags ? '<div class="delim">|</div>' : '') . l(t($content['field_topics'][$key]['#title']), 'articles/tags/' . str_replace(' ', '-', drupal_strtolower($content['field_topics'][$key]['#title'])));
//              }
//              if ($tags) {
//                echo '<div class="topics"><div class="title">' . t('TAGS:') . '</div>' . $tags . '</div>';
//              }
//            }
            //print render($content['field_topics']); 
            //print render($content['links']);

          ?>
        </footer>
    
      <?php endif; ?>
        
      

  </div> <!-- main-content -->
  
    
  
  <?php /*if ($page && isset($content['reviews_entity_view_1']) && $content['reviews_entity_view_1']): ?>
    <div class="reviews">
      <div class="header">
        <a id="reviews"></a>
        <h2 class="button"><?php echo $node->field_p_name['und'][0]['value'], ' ', t('User Reviews'); ?></h2>
        
        <!-- <div class="button"> -->
          <?php 
  
//            if (isset($node->current_user_has_review)) {
//              echo l(t('Your Review'), $node->current_user_has_review, array('attributes' => array('title' => t('You have already submitted a review for this provider: "' . $node->current_user_has_review_title . '"')))); 
//            }
//            else {
//              echo l(t('Submit Your Review'), 'node/add/review'); 
//            }

          ?>
        <!--</div> -->
      </div>

      
      <?php 
        // Hide Sort be Select element.
        //<div class="form-item form-type-select form-item-sort-by">
        ////$content['reviews_entity_view_1'] = preg_replace('/(.*<div.*views-widget-sort-by.*\")(>.*)/', "$1 style=" . '"display: none;"' . "$2", $content['reviews_entity_view_1']);
      
      
//      <div class="views-exposed-widget views-widget-sort-order">
//        <div class="form-item form-type-select form-item-sort-order">
//          <label for="edit-sort-order">Order </label>
//          <select class="form-select" name="sort_order" id="edit-sort-order"><option value="ASC">Asc</option><option selected="selected" value="DESC">Desc</option></select>
//        </div>
//      </div>
    
//        if (strpos($content['reviews_entity_view_1'], '<option selected="selected" value="created">Post date</option>')) {
//          $content['reviews_entity_view_1'] = preg_replace('/(.*<option value="ASC">)(.*)(<.*)/', "$1xxx$3", $content['reviews_entity_view_1']);
//        }
//        else {
//          $content['reviews_entity_view_1'] = preg_replace('/(.*<option value="ASC">)(.*)(<.*)/', "$1yyy$3", $content['reviews_entity_view_1']);
//        }
        echo render($content['reviews_entity_view_1']); 
      ?>
      
    </div>
 <?php endif; */ ?>
  

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
