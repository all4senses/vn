<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <!-- <div class="inside"> -->
<?php else: ?>
  <div class="main-content"> 
<?php endif; ?>

 
  
 
          

      <?php if (!$page): ?>
        <header>
      <?php endif; ?>

          <?php 
          if ($page): ?>
          <h1 
          <?php elseif($_GET['q'] == 'home'): ?>
          <h3  
          <?php else: ?>
          <h2 
          <?php endif; ?>
              
            <?php print ' ' /*. $title_attributes*/ /*preg_replace('/datatype=".*"/', '', $title_attributes);*/ /*preg_replace('/datatype=""/', '', $title_attributes)*/; if (!$node->status) {echo ' class="not-published"';} ?>>
            
            <?php if (!isset($node->title_no_link) && !$page): ?>
              <a href="<?php print $node_url; ?>">
                <?php print $title; ?>
              </a>
            <?php else: ?>
              <?php print $title; ?>
            <?php endif; ?>

          <?php if ($page): ?>
          </h1>
          <?php elseif($_GET['q'] == 'home'): ?>
          </h3>  
          <?php else: ?>
          </h2>
          <?php endif; ?> 

          <?php 

              //$created_str = date('F d, Y \a\t g:ia', $node->created);
              $created_str = date('m.d.Y', $node->created);
              $created_rdf = preg_replace('|(.*)content=\"(.*)\"\s(.*)|', '$2', $date); //date('Y-m-d\TH:i:s', $node->created); 
              
              
              if ($page) {
                
                $extra_data['guest_author'] = NULL;
                if (!empty($node->field_extra_data['und'][0]['value'])) {
                  $extra_data = unserialize($node->field_extra_data['und'][0]['value']);
                  //dpm($extra_data);
                  $extra_data['guest_author'] = $author_name = !empty($extra_data['guest_author']) ? $extra_data['guest_author'] : NULL;
                }

                if (!$extra_data['guest_author']) {
                  $authorExtendedData = vn_misc_loadUserExtendedData($node->uid);
                  $author_name = $authorExtendedData->realname;
                }

                global $language;

                if (!$extra_data['guest_author']) {
                  $author_url = url('user/' . $node->uid);
                  //$gplus_profile = (isset($author->field_u_gplus_profile['und'][0]['safe_value']) && $author->field_u_gplus_profile['und'][0]['safe_value']) ? ' <a class="gplus" title="Google+ profile of ' . $author_name . '" href="' . $author->field_u_gplus_profile['und'][0]['safe_value'] . '?rel=author">(G+)</a>' : '';
                  $gplus_profile = ($authorExtendedData->field_u_gplus_profile_value) ? ' <a class="gplus" title="Google+ profile of ' . $author_name . '" href="' . $authorExtendedData->field_u_gplus_profile_value . '?rel=author">(G+)</a>' : '';
                  $author_title = t('!author\'s profile', array('!author' => $author_name));
                }

                $submitted = '<span property="dc:date dc:created" content="' . $created_rdf . '" datatype="xsd:dateTime" rel="sioc:has_creator">' .
                                'By ' .
                                //'<a href="' . $author_url . '" title="View user profile." class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' .

                                (!$extra_data['guest_author'] ? '<a href="' . $author_url . '" title="' . $author_title . '" class="username" lang="' . $language->language . '" xml:lang="' . $language->language . '" about="' . $author_url . '" typeof="sioc:UserAccount" property="foaf:name">' . $author_name . '</a>' . $gplus_profile : '<span class="guest-author">' . $author_name . '</span>') .

                                //($node->type == 'article' ? '' : '<span class="delim">|</span>' . $created_str) .
                                ', posted on ' . $created_str .

                              '</span>';
               

                echo '<span class="submitted">', $submitted, '</span>';
              }              
            ?>
          


      <?php if (!$page): ?>
        </header>
      <?php endif; ?>



      <div class="content <?php echo ($page ? 'page' : 'teaser'); ?>"<?php print $content_attributes; ?>><?php
      
          // Hide comments, tags, and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          hide($content['field_categories']);
          hide($content['disqus']);
          
          
          //dpm($content);
          //dpm($node);
          
          if (!$page) {
            
            //dpm($node);
            //dpm($content);
            
              hide($content['body']);

              if (!empty($node->body['und'][0]['summary'])) {
                //dpm('field_a_teaser is not empty');
                //echo l('Read more »', 'node/' . $node->nid, array('attributes' => array('class' => array('more')))) . strip_tags($node->body['und'][0]['summary']);
                echo l('Read more »', 'node/' . $node->nid, array('attributes' => array('class' => array('more')))) . $node->body['und'][0]['summary'];
              }
              else 
                {
                //dpm('field_a_teaser IS empty');
                $teaser_data = vn_misc_getArticleTeaserData('all', $content['body'][0]['#markup'], $node->nid);
                echo l('Read more »', 'node/' . $node->nid, array('attributes' => array('class' => array('more')))) . $teaser_data['teaser'];
              }
            
            
          }
          
          $keyword_metatag_name = ($node->type == 'news_post') ? 'news_keywords' : 'keywords';
          
          if (isset($content['metatags']['keywords'])) {
            hide($content['metatags']['keywords']);
          }
          
          if (isset($content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) && $content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']) {
            vn_misc_addMetatag($keyword_metatag_name, $content['metatags']['keywords']['#attached']['drupal_add_html_head'][0][0]['#value']);
          }
          elseif (@$content['field_topics']) {
            vn_misc_pushTagsToMetatags($keyword_metatag_name, $content['field_topics']);
          }
          
          echo render($content);
        ?></div>




    
      <footer>

        <?php 
        
         if (!$page) {
            global $user;
            echo '<div class="links">' . l($content['field_categories'][0]['#title'], $content['field_categories'][0]['#href']). '<span class="delim">|</span><span class="submitted">', $created_str, '</span><span class="delim">|</span>' . l('Comments' . ( ($user->uid && $node->comment_count) ? ' (' . $node->comment_count . ')' : ''), 'node/' . $node->nid, array('fragment' => 'comments')) . '</div>';
         }
         else {
           
          echo '<div class="links">' . l($content['field_categories'][0]['#title'], $content['field_categories'][0]['#href']) . '</div>';
          //dpm($node);
          //dpm($content);
          
        ?>
        
        
              <div class="share">

                <?php $url = 'http://voipnow.org'. url('node/' . $node->nid); ?>

                <div class="main">
                  <?php echo vn_blocks_getSocialiteButtons($url, $title); ?>
                </div> <!-- main share buttons -->

              </div>
      <?php } ?>
      </footer>
    
    
    
      <div class="bottom-clear"></div>
 

  
  
  <?php if ($page && $node->type != 'news_post'): ?>
      
  </div> <!-- main-content -->
  

  <?php endif; ?>
  
    
  <?php 
    if ($page) {
      echo '<a id="comments"></a>' .  render($content['comments']); 
      echo render($content['disqus']);
    }
  ?>

<?php if (!$page): ?>
  <!-- </div> --> <!-- /.inside -->
  <!-- <div class="shadow"></div> -->
  </article> <!-- /.node -->
<?php endif; ?>


