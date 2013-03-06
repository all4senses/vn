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
      
      global $user;
      if ($user->uid == 1) {
        
        switch ($node->field_p_types['und'][0]['value']) {
          case 'bu':
            $chart_title = 'Featured Business VoIP Providers';
          case 'smbv':
            $chart_title = 'Featured Small Business VoIP Providers';
            
            $block_data = array('module' => 'views', 'delta' => 'providers-block_chart_featured_providers', 'subject' => $chart_title);
            echo vn_blocks_getBlockThemed($block_data);
            
            
        }
        
      }
      
      echo render($content);
      

      
      
      
      /*
      
        // Filter criterion: Content: Service Type (field_p_types)
      
        $handler->display->display_options['filters']['field_p_types_value']['id'] = 'field_p_types_value';
        $handler->display->display_options['filters']['field_p_types_value']['table'] = 'field_data_field_p_types';
        $handler->display->display_options['filters']['field_p_types_value']['field'] = 'field_p_types_value';
        $handler->display->display_options['filters']['field_p_types_value']['value'] = array(
          'smbv' => 'smbv',
        );
      
      */
      
      
      if (empty($node->field_p_types['und'][0]['value'])) {
        // Usage page
        // Show all provider types and subtypes.
//        $view_name = 'providers'; 
//        $display_name = 'block_provider_types_all';
//        $view = views_get_view($view_name);
//        $results = $view->preview($display_name);
//        if ($view->result) {
//          echo $results;
//        }

      }
      elseif ($node->field_p_types['und'][0]['value'] == 'bu') {
        // Busines VoIP page.
        // Show all Business subtypes.
//        $view_name = 'providers'; 
//        $display_name = 'block_provider_types_bu';
//        $view = views_get_view($view_name);
//        $results = $view->preview($display_name);
//        if ($view->result) {
//          echo $results;
//        }
      }
      else {
//          // Other provider type pages.
//
//          // Show providers by a type.
//          $view_name = 'providers'; 
//          //$display_name = 'block_providers_by_type';
//          $display_name = 'block_chart_all_providers';
//          $view = views_get_view($view_name);
//
//          //$viewsFilterOptions_p_type = array('id' => 'field_p_types_value', 'value' => array('smbv' => 'smbv'));
//          $viewsFilterOptions_p_type = array('id' => 'field_p_types_value', 'value' => array($node->field_p_types['und'][0]['value'] => $node->field_p_types['und'][0]['value']));
//          $view->add_item($display_name, 'filter', 'field_data_field_p_types', 'field_p_types_value', $viewsFilterOptions_p_type);
//
//          $results = $view->preview($display_name);
//          if ($view->result) {
//            module_load_include('inc', 'vn_misc', 'inc/constants');
//            $service_types = unserialize(SERVICE_TYPES);
//            echo '<div class="block block-views"><div class="content"><h2 class="block-title">All VoIP Providers that Offer ' . $service_types[$node->field_p_types['und'][0]['value']] . ' VoIP Services</h2>' . $results . '</div></div>';
//          }
//          else {
//            //echo '<br/>no providers';
//          }

      }
  
    ?>
  
      
  </div>
