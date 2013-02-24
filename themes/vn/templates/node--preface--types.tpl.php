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
    


      <?php
        $url = 'http://www.voipnow.org' . ($_GET['q'] == 'home' ? '' : $_SERVER['REQUEST_URI']);
        
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

        echo '<div class="float share">' . vn_blocks_getSocialiteButtons($url, $share_title) . '</div>';
      ?>



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
        'VoIP Equipment' => array('vid' => 5, 'url' => 'equipment', 'banner' => '/f/img/eqipment-banner.jpg'),
        'VoIP Features' => array('vid' => 4, 'url' => 'features', 'banner' => NULL),
        'VoIP Protocols' => array('vid' => 6, 'url' => 'protocols', 'banner' => NULL),
      );
      
      foreach ($vocabularies as $v_title => $v_data) {
        $query = db_select('taxonomy_term_data', 'td');
        $query->fields('td', array('tid', 'name'));
        $query->condition('td.vid', $v_data['vid']);
        
        $countQuery = $query->countQuery();
        
        $terms = $query->execute();
        
        $amount = $countQuery->execute()->fetchField();
  

        if ($v_data['banner']) {
            $out = '<div class="col3-1">';
            $count = 0;
            $second = NULL;
            $third = NULL;
            foreach ($terms as $term) {

              //$out .= ($out ? ', ' : '') .  l($term->name, 'taxonomy/term/' . $term->tid);
              if (!$second && $count > ($amount - 1)/3) {
                $out .= '</div><div class="col3-2">';
                $second = TRUE;
              }
              if (!$third && $count > (($amount)/3) * 2) {
                $out .= '</div><div class="col3-3">';
                $third = TRUE;
              }
              $out .= '<div class="link">' .  l($term->name, 'taxonomy/term/' . $term->tid) . '</div>';

              $count++;
            }
            $out .= '</div>' . '<img src="' . $v_data['banner'] . '" />';
        }
        else {
            $out = '<div class="col4-1">';
            $count = 0;
            $second = NULL;
            $third = NULL;
            $fourth = NULL;
            foreach ($terms as $term) {
              if (!$second && $count > ($amount - 1)/4) {
                $out .= '</div><div class="col4-2">';
                $second = TRUE;
              }
              if (!$third && $count > ($amount)/2) {
                $out .= '</div><div class="col4-3">';
                $third = TRUE;
              }
              if (!$fourth && $count > (($amount)/4) * 3) {
                $out .= '</div><div class="col4-4">';
                $fourth = TRUE;
              }
              $out .= '<div class="link">' .  l($term->name, 'taxonomy/term/' . $term->tid) . '</div>';

              $count++;
            }
            $out .= '</div>';
        }
        
        echo '<div class="types-block ' . $v_title . '">' . '<div class="title">' . l($v_title, $v_data['url']) . '</div><div class="content">' . $out . '</div></div>';
      }
      
      
      $service_types = array(
        'Business VoIP' => 'usage/business',
        'Enterprise VoIP' => 'usage/enterprise', 
        'Midsize Business VoIP' => 'usage/midsize-business', 
        'Residential VoIP' => 'usage/residential', 
        'Small Business VoIP' => 'usage/small-business',
        'Hosted PBX' => 'usage/hosted-pbx',
        'SIP Trunking' => 'usage/sip-trunking',
      );
            
      $amount = count($service_types);
      
//      $out = '<div class="col3-1">';
//      $count = 0;
//      $second = NULL;
//      $third = NULL;
//      foreach ($service_types as $s_title => $s_url) {
//        
//        if (!$second && $count > ($amount - 1)/3) {
//          $out .= '</div><div class="col3-2">';
//          $second = TRUE;
//        }
//        if (!$third && $count > (($amount)/3) * 2) {
//          $out .= '</div><div class="col3-3">';
//          $third = TRUE;
//        }
//          
//        //$out .= ($out ? ', ' : '') .  l($s_title, $s_url);
//        $out .= '<div class="link">' .  l($s_title, $s_url) . '</div>';
//        
//        $count++;
//      }
//      $out .= '</div>';
      
      $out = '<div class="col4-1">';
      $count = 0;
      $second = NULL;
      $third = NULL;
      $fourth = NULL;
      foreach ($service_types as $s_title => $s_url) {
        
        if (!$second && $count > ($amount - 1)/4) {
          $out .= '</div><div class="col4-2">';
          $second = TRUE;
        }
        if (!$third && $count > ($amount)/2) {
          $out .= '</div><div class="col4-3">';
          $third = TRUE;
        }
        if (!$fourth && $count > (($amount)/4) * 3) {
          $out .= '</div><div class="col4-4">';
          $fourth = TRUE;
        }
          
        //$out .= ($out ? ', ' : '') .  l($s_title, $s_url);
        $out .= '<div class="link">' .  l($s_title, $s_url) . '</div>';
        
        $count++;
      }
      $out .= '</div>';
      
      echo '<div class="types-block usage">' . '<div class="title">' . l('VoIP Usage', 'usage') . '</div><div class="content">' . $out . '</div></div>';
      
      echo '<div class="notice">Not sure which type of VoIP you\'re looking for? Try browsing our list of featured VoIP providers below...</div>';
      
      
      if (@$node->field_display_type['und'][0]['value'] == 1) {
        echo render($content['field_preface_bottom']);
      }
    
    ?>
    
      
  </div>
