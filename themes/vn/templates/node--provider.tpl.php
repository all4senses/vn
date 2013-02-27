<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

           
  <div class="main-content" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review-aggregate">
    
        <?php if ($page): ?>
    
    
          <?php

            $url = 'http://www.voipnow.org'. url('node/' . $node->nid);
            echo '<div class="float share">' . vn_blocks_getSocialiteButtons($url, $node->title) . '</div>';

          ?>
    
    
          <h1<?php //print $title_attributes; 
                //echo 'property="dc:title v:summary"'; 
                echo ' property="v:summary"'; 
                if (!$node->status) {echo ' class="not-published"';}?> ><?php 
                  print $title; //t('Our Take on !p Business VoIP Provider', array('!p' => $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/) )
                ?></h1>
   
   
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
          
              <div class="images">
                <?php
                
                  //dpm($content);
                  //dpm($node);
                  
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    ////echo '<div class="logo"><a href="' . $node->p_data['info']['i_web'] . '" target="_blank">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $content['field_p_logo'][0]['#item']['alt'], 'title' => $content['field_p_logo'][0]['#item']['title'], 'attributes' => array('rel' => 'v:photo'))) . '</a></div>'; 
                    //////echo '<div class="logo"><a href="/click?p=' . urlencode($node->field_p_name['und'][0]['value']) . '" target="_blank" rel="nofollow">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $content['field_p_logo'][0]['#item']['alt'], 'title' => $content['field_p_logo'][0]['#item']['title'], 'attributes' => array('rel' => 'v:photo'))) . '</a></div>'; 
                    
                    echo '<div class="logo">' . vn_misc_getTrackingUrl(theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page', 'alt' => $content['field_p_logo'][0]['#item']['alt'], 'title' => $content['field_p_logo'][0]['#item']['title'], 'attributes' => array('rel' => 'v:photo')))), '</div>';
                  }
                  else {
                    //echo render($title_prefix), '<h2', $title_attributes,'>', $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/, '</h2>', render($title_suffix);
                  }
                  $url = 'http://www.voipnow.org'. url('node/' . $node->nid);
                  
                  $goto_link = 'click';
                  $goto_link_query = array('p' => urlencode($node->field_p_name['und'][0]['value'])/*, 'url' => urlencode($node->p_data['info']['i_web'])*/);
                    
                  if (isset($content['field_p_image'][0]['#item']['uri'])) {
                    
//                    echo '<div class="image"><a href="' , $node->p_data['info']['i_web'] , '" target="_blank">' , theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'image_provider_page', 'alt' =>  $content['field_p_image'][0]['#item']['alt'], 'title' =>  $content['field_p_image'][0]['#item']['title'])) , '</a></div>', 
//                         '<div class="site">' , l('Visit ' . $node->field_p_name['und'][0]['value'] /*$content['field_p_name'][0]['#markup']*/, $node->p_data['info']['i_web'], array('external' => TRUE, 'attributes' => array('target' => '_blank'))) , '</div>';
                    
                    
                    ////echo '<div><a href="' , $node->p_data['info']['i_web'] , '" target="_blank">' , theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'image_provider_page', 'alt' =>  $content['field_p_image'][0]['#item']['alt'], 'title' =>  $content['field_p_image'][0]['#item']['title'])) , '</a></div>', 
                    //////echo '<div class="image"><a href="/click?p=', urlencode($node->field_p_name['und'][0]['value']), '" rel="nofollow" target="_blank">' , theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'image_provider_page', 'alt' =>  $content['field_p_image'][0]['#item']['alt'], 'title' =>  $content['field_p_image'][0]['#item']['title'])) , '</a></div>';
                    
                    
                    ///////echo '<div class="image"><a href="/click?p=', urlencode($node->field_p_name['und'][0]['value']), '" rel="nofollow" target="_blank">' , theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'image_provider_page', 'alt' =>  $content['field_p_image'][0]['#item']['alt'], 'title' =>  $content['field_p_image'][0]['#item']['title'])) , '</a></div>';
                    
                    echo '<div class="image">' . vn_misc_getTrackingUrl(theme('image_style', array( 'path' =>  $content['field_p_image'][0]['#item']['uri'], 'style_name' => 'image_provider_page', 'alt' =>  $content['field_p_image'][0]['#item']['alt'], 'title' =>  $content['field_p_image'][0]['#item']['title']))), '</div>';
                    
                    
                    
                  }

                  $goto_link = 'click' . $_SERVER['REDIRECT_URL'];
                  
                  if (!$node->p_data['info']['i_web_hide'] && !empty($node->p_data['info']['i_web'])) {
                      echo   //'<div class="site">' , l('Visit ' . $node->field_p_name['und'][0]['value'], $node->p_data['info']['i_web'], array('external' => TRUE, 'attributes' => array('target' => '_blank'))) , '</div>';
                         //'<div class="site">' , l('Visit ' . $node->field_p_name['und'][0]['value'], $goto_link, array('query' => $goto_link_query, 'attributes' => array('rel' => 'nofollow', 'target' => '_blank'))) , '</div>';
                         /////'<div class="site">' , l('Visit ' . $node->field_p_name['und'][0]['value'], $goto_link, array('query' => $goto_link_query, 'attributes' => array('rel' => 'nofollow', 'target' => '_blank'))) , '</div>';
                         ///////'<div class="site">' , l('Visit ' . $node->field_p_name['und'][0]['value'], $goto_link, array('attributes' => array('rel' => 'nofollow', 'target' => '_blank'))) , '</div>';
                      
                        //'<div class="site">' , vn_misc_getTrackingUrl('Visit ' . $node->field_p_name['und'][0]['value']) , '</div>';
                      '<div class="site">' , vn_misc_getTrackingUrl('Visit ' . $node->field_p_name['und'][0]['value']) , '</div>';
                  }
                ?>  
                
              </div>
          
          

                    <?php /*if (!empty($node->p_data['ereview']['editor_rating_overall']))*/ { ?>
                  
                        <div class="pros-and-cons">
                            <?php 
                            if (!empty($node->p_data['ereview']['pros_and_cons']['Advantages'])) {
                              echo '<div class="title">Advantages</div><div class="text">' . $node->p_data['ereview']['pros_and_cons']['Advantages'] . '</div>'; 
                            }
                            if (!empty($node->p_data['ereview']['pros_and_cons']['Disadvantages'])) {
                              echo '<div class="title">Disadvantages</div><div class="text">' . $node->p_data['ereview']['pros_and_cons']['Disadvantages'] . '</div>';
                            }
                            if (!empty($node->p_data['ereview']['pros_and_cons']['Verdict'])) {
                              echo '<div class="title">Verdict</div><div class="text">' . $node->p_data['ereview']['pros_and_cons']['Verdict'] . '</div>';
                            }
                            ?>
                        </div>

                      <?php /*
                        <div class="vn_votes editor">
                          <?php $editor_overall_rating = number_format($node->p_data['ereview']['editor_rating_overall'] * 0.05, 1); ?>
                          <?php echo '<div class="caption"><span><span property="v:reviewer">Editor</span>\'s Overall Rating:</span> <span property="v:rating">' , $editor_overall_rating, '</span>' , '<div class="bottom-clear"></div></div>' , render($node->editor->content['vn_ratings']); ?>
                          <div class="rate-other">
                            <div class="text"><?php echo '<div class="title">' . t('Recommend') . ': </div><div class="data">' . $node->editor->vn_recommend . '</div>'?></div>
                            <?php echo '<div class="voters editor"><div class="count" property="v:count">' . (!empty($node->vn_voters) ? $node->vn_voters : 1) . '</div></div>';?>
                          </div>
                        </div>
                        */
                      ?>

                  <?php } ?>
              

          
              <!-- <div class="bottom-clear"></div> -->
              
                      
              <div class="data tabs">
                
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
                          $quick_stats_out .= '<div><span class="title">' . $wp_fields['Features'][$quick_stats_key] . ':</span> ' . $node->p_data['wp_fields']['Features'][$quick_stats_key] . '</div>';
                        }
                        else {
                          $quick_stats_out .= '<div><span class="title">' . $wp_fields['Features'][$quick_stats_key] . ':</span> No</div>'; 
                        }
                      }


                      foreach ($node->p_data['wp_fields']['Features'] as $key => $feature) {
                        if ($feature) {
                          $features[] = '<span class="title">' . $wp_fields['Features'][$key] . ':</span> ' . $feature;
                        }
                      }

                      if (!empty($features)) {

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

                      }

                ?>
                
                
                <ul>
                  <li><a href="#tabs-1"><?php echo 'Review'; ?></a></li>
                  <?php 
                    if (!empty($features)) {
                      echo '<li><a href="#tabs-2">Quick Stats</a></li>
                            <li><a href="#tabs-3">List Features</a></li>';
                    }
                  ?>
                </ul>
                <div id="tabs-1">
                  <?php echo render($content['body']); ?>
                </div>
                <?php 
                    if (!empty($features)) {
                      echo '<div id="tabs-2"><div>', $quick_stats_out, '<div><span class="title">Plans:</span> ',  $plans, '</div></div></div>',
                           //'<div id="tabs-3"><div class="title">List of Features Available on ' , $node->field_p_name['und'][0]['value'], '</div>', $features_out, '</div>';
                           '<div id="tabs-3">', $features_out, '</div>';
                    }
                ?>
                
                
                
              </div> <?php // End of <div class="data tabs"> ?>
              
          <?php echo render($content['metatags']); //vn_misc_renderMetatags_newOrder($content['metatags']);?>
          
          
              
              
              
              
          <?php else: ?> <!-- if ($page): -->
          
                <?php
                  if (isset($content['field_p_logo'][0]['#item']['uri'])) {
                    echo '<div class="logo">' . theme('image_style', array( 'path' =>  $content['field_p_logo'][0]['#item']['uri'], 'style_name' => 'logo_provider_page')) . '</div>';
                  }
                ?>
          
              <?php echo render($content['body']); ?>
          
          
          
          <?php endif; ?>  <!-- if ($page): -->
           
              
          <?php //echo render($content); ?>
          
        </div> <!-- content -->

        
        
      <?php if ($page): ?>
    
        <!--
        <footer>
        </footer>
        -->
        
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
