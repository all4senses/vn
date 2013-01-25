<?php

/**
 * @file
 * Module constants list.
 */

// Ratings titles.
define('INSTALL', 'Installation Process');
define('FEATURES', 'Features');
define('PRICE', 'Price');
define('OVERALL', 'Overall Average Rating');

define('SOUND', 'Sound/Call Quality');
define('CUSTOMER', 'Customer Experience');
define('RELY', 'Service Reliability');
define('RECOMMEND', 'Would you recommend this VoIP provider?');

// Phones only
define('USE_EASE', 'Ease of Use');
define('VOICE', 'Voice Quality');
define('DURABILITY', 'Durability');
define('PERFORMANCE', 'Value Performance');
define('RECOMMEND_PHONE', 'Would you recommend this VoIP phone?');





// Fields hints.
define('FNAME_HINT', 'First');
define('LNAME_HINT', 'Last');
define('EMAIL_HINT', 'Enter a valid email');
define('PROS_HINT', 'Optional');
define('CONS_HINT', 'Optional');

// Provider data

//$service_types = serialize(array('Residential' => 're', 'Business' => 'bu', 'Mobile' => 'mo', 'Internet Fax' => 'ifa', 'Hosted PBX' => 'pbx', 'SIP Trunking' => 'sip', 'Call Center' => 'cc'));
//$service_descriptions = serialize(array('Preface title' => 'pti', 'Preface text' => 'pte', 'Basic info title' => 'biti', 'Basic info text' => 'bite', 'Special notes title' => 'snti', 'Special notes text' => 'snte', 'Money Back Guarentee' => 'mbg'));
//$fee_types = serialize(array('Monthly fees' => array('mon', '$'), 'Setup fees' => array('set', ''), 'Shipping fees' => array('shp', ''), 'Cancellation fees' => array('can', '$'), 'Long distance fees' => array('lng', ''), 'Other fees' => array('oth', '') ));
      

$service_types = serialize(array('re' => 'Residential', 'bu' => 'Business', 'smbv' => 'Small Business', 'eb' => 'Enterprise Business', 'mb' => 'Midsize Business', 'mo' => 'Mobile', 'ifa' => 'Internet Fax', 'pbx' => 'Hosted PBX', 'sip' => 'SIP Trunking', 'cc' => 'Call Center', 're_ca' => 'Residential Canada', 'bu_ca' => 'Business Canada'));
$service_descriptions = serialize(array('pti' => 'Preface title', 'pte' => 'Preface text', 'biti' => 'Basic info title', 'bite' => 'Basic info text', 'snti' => 'Special notes title', 'snte' => 'Special notes text', 'mbg' => 'Money Back Guarentee', 'vr-y' => 'Video Review (YouTube video ID)'));
$fee_types = serialize(array('mon' => array('Monthly fees', '$'), 'set' => array('Setup fees', ''), 'shp' => array('Shipping fees', ''), 'can' => array('Cancellation fees', '$'), 'lng' => array('Long distance fees', ''), 'oth' => array('Other fees', '') ));

define('SERVICE_TYPES', $service_types);
define('SERVICE_DESCRIPTIONS', $service_descriptions);
define('FEE_TYPES', $fee_types);

$wp_fields = serialize(array(
  'Features' => array(
    'fe_Call_Waiting' => 'Call Waiting',
    'fe_911_Service' => '911 Service',
    'fe_Caller_ID' => 'Caller ID',
    'fe_Support' => 'Support',
    'fe_Keep_Your_Number' => 'Keep Your Number',
    'fe_Voicemail' => 'Voicemail',
    'fe_Guarantee' => 'Guarantee',
    'fe_Click_to_Call' => 'Click-to-Call',
    'fe_IP_PBX_Solution' => 'IP PBX Solution',
    'fe_Residential' => 'Residential',
    'fe_Small_Business' => 'Small Business',
    'fe_Enterprise' => 'Enterprise Business',
    'fe_PC_to_PC' => 'PC-to-PC',
    'fe_PC_to_Phone' => 'PC-to-Phone',
    'fe_International_Calling' => 'International Calling',
    'fe_Fax_Line' => 'Fax Line',
    'fe_Call_Return' => 'Call Return',
    'fe_411_Service' => '411 Service',
    'fe_Virtual_Phone_Numbers' => 'Virtual Phone Numbers',
    'fe_Mid_Size_Business' => 'Mid-Size Business',
    'fe_3_Way_Calling' => '3-Way Calling',
    'fe_Call_Forwarding' => 'Call Forwarding',
    'fe_E_mail' => 'E-mail',
    'fe_Encrypted_Calling' => 'Encrypted Calling',
    'fe_Free_VoIP' => 'Free',
    'fe_Instant_Messaging' => 'Instant Messaging',
    'fe_Toll_Free_Number' => 'Toll-Free Number',
    'fe_Video_VoIP_VVoIP' => 'Video VoIP (VVoIP)',
    'fe_VoIP_Gaming' => 'VoIP Gaming',
  ),
    
  'Marketing' => array(
    'af_javascript' => 'Javascript',
    'af_banner' => 'Banner',
    'af_link' => 'Affiliate Link',
    'af_offer1' => 'Offer 1',
    'af_offer2' => 'Offer 2',
    'af_js_banner' => 'JS Banner',
    'af_js_link' => 'JS Link',
    'af_js_offer1' => 'JS Offer 1',
    'af_js_offer2' => 'JS Offer 2',
  ),
    
  'Featured' => array(
    'pr_featured' => 'Featured',
  ),
));

define('WP_FIELDS', $wp_fields);