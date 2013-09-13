<?php
/*------------------------------------------------------------------------
    # (TZ Module, TZ Plugin, TZ Component)
    # ------------------------------------------------------------------------
    # author    Templaza .,JSC
    # copyright Copyright (C) 2011 Sunland .,JSC. All Rights Reserved.
    # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
    # Websites: http://www.TemPlaza.com
    # Technical Support:  Forum - http://www.TemPlaza.com/forums/
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php');

$load = $params->get('loadjquery');
$title = $params->get('title');
$title_link = $params->get('title_link');
$intro = $params->get('introtext');
$limittext = $params->get('limit_intro');
$flex_thumb = $params->get('flex-thumb','true');


$list = modTzMultiSlideshowHelper::getItemsSlideshow($params);

if($list){
require(JModuleHelper::getLayoutPath('mod_tz_multi_slideshow',$params->get('layout', 'Flexslider')));
} else{
    echo "<p align='center'> Not Item! </p>";
}