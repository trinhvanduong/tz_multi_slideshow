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
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'helper.php');

$document	= JFactory::getDocument();

$load = $params->get('loadjquery');
$title_link = $params->get('title_link');
$limittext = $params->get('limit_intro');
$flex_thumb = $params->get('flex-thumb', 'true');
//option supersized
$title = $params->get('title');
$intro = $params->get('introtext');
$limittext = $params->get('limit_intro');
$autoplay = $params->get('autoplay');
$transition = $params->get('transition');
$slide_interval = $params->get('slide_interval');
$transition_speed = $params->get('transition_speed');
$new_window = $params->get('new_window');
$pause_hover = $params->get('pause_hover');
$keyboard_nav = $params->get('keyboard_nav');
$image_protect = $params->get('image_protect');
$thumb_links = $params->get('thumb_links');
$thumbnail_navigation = $params->get('thumbnail_navigation');
$show_music = $params->get('show_music');
$start_slide = $params->get('start_slide');
$vertical_center = $params->get('vertical_center');
$horizontal_center = $params->get('horizontal_center');
$fit_always = $params->get('fit_always');
$fit_portrait = $params->get('fit_portrait');
$fit_landscape = $params->get('fit_landscape');
$title_link = $params->get('title_link');
$bg_title = $params->get('background_title');
$bg_intro = $params->get('background_intro');
$mouse_scrub = $params->get('mouse_scrub');
$audio_mp3 = $params->get('slide_audio_mp3');
$audio_ogg = $params->get('slide_audio_ogg');
$thumb_tray = $params->get('thumb_tray');
$tz_thumb = $params->get('tz_thumb');
$supersized_thumb_bottom = $params->get('supersized_thumb_bottom');
$music_name = substr($audio_mp3, 0, -4);


//Options Moving Box
$mv_startPanel = $params->get('startPanel');
if ($params->get('moving_loop') == 1) {
    $mv_loop = 'true';
} else {
    $mv_loop = 'false';
}
if ($params->get('buildNav') == 1) {
    $mv_nav = 'true';
} else {
    $mv_nav = 'false';
}
if ($params->get('fixedHeight') == 1) {
    $mv_fixheight = 'true';
} else {
    $mv_fixheight = 'false';
}
$mv_reducedSize = $params->get('reducedSize');
$mv_speed = $params->get('speed');
$mv_delay = $params->get('delayBeforeAnimate');
$mv_panel_width  = $params->get('panelWidth');
$list = modTzMultiSlideshowHelper::getItemsSlideshow($params);

//add jquery libraries
if ($load == 1) :
    $document->addScript($url . 'modules/mod_tz_multi_slideshow/js/jquery-1.10.1.min.js');
endif;

 
if ($list) {
    require(JModuleHelper::getLayoutPath('mod_tz_multi_slideshow', $params->get('layout', 'Flexslider')));
} else {
    echo "<p align='center'> Not Item! </p>";
}