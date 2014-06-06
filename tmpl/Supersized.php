<?php
/*------------------------------------------------------------------------
    # (TZ Module, TZ Plugin, TZ Component)
    # ------------------------------------------------------------------------
    # author    Sunland .,JSC
    # copyright Copyright (C) 2011 Sunland .,JSC. All Rights Reserved.
    # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
    # Websites: http://www.TemPlaza.com
    # Technical Support:  Forum - http://www.TemPlaza.com/forums/
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');
$url = JURI::base();
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/supersized.css');
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/supersized.shutter.css');
$document->addStyleDeclaration('
    #wrapper #slidecaption h2,
    #tz_fullslide #slidecaption h2{
        background:' . $bg_title . ';
    }
    #tz_fullslide #slidecaption1,
    #wrapper #slidecaption1{
        background:' . $bg_intro . ';
    }
    #thumb-tray{
        display: ' . $thumb_tray . ' !important;
    }
    .tz_thumb{
        display: ' . $tz_thumb . ' !important;
    }
    #thumb-tray{
        bottom: ' . $supersized_thumb_bottom . 'px !important;
    }
    #slidecaption h2{
    animation-duration: ' . $run_text . 's;
    }
');

if ($intro == 0) {
    $document->addStyleDeclaration('
    div#sitebar_slide #ourner-sitebar{
        width: 100%;
    }
    #wrapper #slidecaption h2,
    #tz_fullslide #slidecaption h2{
        background:' . $bg_title . ';
    }
    #tz_fullslide #slidecaption1,
    #wrapper #slidecaption1{
        background:' . $bg_intro . ';
    }

');
}
if ($thumb_links == 0) {
    $document->addStyleDeclaration('
    div#fullslide-des{
        width: 100%;
    }
');
}
$document->addScript($url . 'modules/mod_tz_multi_slideshow/js/base64.js');
$document->addScript($url . 'modules/mod_tz_multi_slideshow/js/jquery.easing.min.js');
$document->addScript($url . 'modules/mod_tz_multi_slideshow/js/supersized.3.2.7.js');
$document->addScript($url . 'modules/mod_tz_multi_slideshow/js/supersized.shutter.js');
$document->addScript($url . 'modules/mod_tz_multi_slideshow/js/buzz.js');
?>
<script type="text/javascript">
    //     var tz = jQuery.noConflict();

    var show_music = <?php echo $show_music; ?>;
    var music_name = "<?php echo $music_name; ?>";
    var urlpath = "<?php echo $url.'images/'.$music_name; ?>";

    jQuery(function (jQuery) {
        jQuery.supersized({

                // Functionality
                slideshow: 1,			// Slideshow on/off
                autoplay:    <?php echo $autoplay; ?>,			// Slideshow starts playing automatically
                start_slide:   <?php echo $start_slide ?>,			// Start slide (0 is random)
                stop_loop: 0,			// Pauses slideshow on last slide
                random: 0,			// Randomize slide order (Ignores start slide)
                slide_interval:   <?php echo $slide_interval; ?>,		// Length between transitions
                transition:   <?php echo $transition; ?>,			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                transition_speed:    <?php echo $transition_speed ; ?>,		// Speed of transition
                new_window:    <?php echo $new_window ; ?>,			// Image links open in new window/tab
                pause_hover:   <?php echo $pause_hover ; ?>,			// Pause slideshow on hover
                keyboard_nav:   <?php echo $keyboard_nav ; ?>,			// Keyboard navigation on/off
                performance: 0,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                image_protect:    <?php echo $image_protect ; ?>,			// Disables image dragging and right click with Javascript

                // Size & Position
                min_width: 0,			// Min width allowed (in pixels)
                min_height: 0,			// Min height allowed (in pixels)
                vertical_center:   <?php echo $vertical_center ; ?>,			// Vertically center background
                horizontal_center:   <?php echo $horizontal_center ; ?>,			// Horizontally center background
                fit_always:    <?php echo $fit_always ; ?>,			// Image will never exceed browser width or height (Ignores min. dimensions)
                fit_portrait:   <?php echo $fit_portrait ; ?>,			// Portrait images will not exceed browser height
                fit_landscape:   <?php echo $fit_landscape ; ?>,			// Landscape images will not exceed browser width

                // Components
                slide_links: 'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
                thumb_links:    <?php echo $thumb_links ; ?>,			// Individual thumb links for each slide
                thumbnail_navigation:   <?php echo $thumbnail_navigation ; ?>,			// Thumbnail navigation
                slides: [

                    <?php
                    $j = count($list)-1;
                    for ($i=0; $i<=$j; $i++) {
                        $text = base64_encode( $list[$i]->intro); ?>
                    {
                        image: "<?php echo $url.$list[$i]->image; ?>",
                        title: "<h2><?php if($title_link==1){ ?> <a href='<?php echo $list[$i]->link; ?>'> <?php echo JText::sprintf($list[$i]->title); ?></a><?php } else {  echo JText::sprintf($list[$i]->title);  } ?></h2>",
                        thumb: "<?php echo $url.$list[$i]->image_thumb; ?>",
                        url: "<?php echo $list[$i]->link; ?>",
                        caption: "<?php echo $text; ?>"
                    }
                    <?php if($i < $j):?>
                    ,
                    <?php endif;?>

                    <?php } ?>
                ],
                // Theme Options
                progress_bar: 0,			// Timer for each slide
                mouse_scrub:    <?php echo $mouse_scrub; ?>

            }, show_music,
            urlpath);
    });


</script>
<div class="background_overload"></div>
<div class="tz_supersized">
    <div id="tz_supersized">

        <div id="prevthumb"></div>
        <div id="nextthumb"></div>
        <div class="slide-des">
            <?php if ($title == 1) { ?>
                <div id="slidecaption" class="tz-slider-title">

                </div>
            <?php } ?>
            <?php if ($intro == 1) { ?>
                <div id="slidecaption1" class="tz-slider-title"></div>
            <?php } ?>
        </div>


        <div id="sitebar_slide">

            <?php if ($thumb_links == 1) { ?>
                <div id="ourner-sitebar">
                    <div id="thumb-tray" class="load-item"></div>
                </div>
            <?php } ?>

            <div class="slider-control">
                <!--Arrow Navigation-->
                <a id="prevslide" class="load-item"></a>
                <?php if ($show_music == 1) { ?>
                    <span class="music_icon">&nbsp;</span>
                    <span class="close-music">&nbsp;</span>
                <?php } ?>
                <?php if ($show_music == 0) { ?>
                    <span class="music_icon" style="display: none;">&nbsp;</span>
                    <span class="close-music" style="display: inline-block;">&nbsp;</span>
                <?php } ?>
                <?php if ($intro == 0 && $title == 0) { ?>
                    <span class="slide-description" style="display: none;">&nbsp;</span>
                    <span class="slide-hidden" style="display: none;">&nbsp;</span>
                <?php } ?>
                <?php if ($intro == 1 || $title == 1) { ?>
                    <span class="slide-description">&nbsp;</span>
                    <span class="slide-hidden">&nbsp;</span>
                <?php } ?>
                <a id="nextslide" class="load-item"></a>
            </div>
        </div>
    </div>
</div>
<div class="tz_thumb">
    <div class="thumb_up"></div>
    <div class="thumb_down"></div>
</div>


<script type="text/javascript">
    var tz = jQuery.noConflict();
    tz('body').prepend('<div class="bg-slide-overlay"> </div> ');
    tz('span.slide-description').click(function () {
        tz('.slide-des').hide();
        tz(this).hide();
        tz('span.slide-hidden').css('display', 'inline-block');
    });
    tz('span.slide-hidden').click(function () {
        tz('.slide-des').show();
        tz(this).hide();
        tz('.slide-description').css('display', 'inline-block');

    });
    tz('div.tz_thumb').css('display', 'block');

    tz('div.thumb_up').click(function () {
        tz('div#thumb-tray').css('bottom', '0');
    });
    tz('div.thumb_down').click(function () {
        tz('div#thumb-tray').css('bottom', '-160px');
    });

    var thum_height = tz('#thumb-tray').height() / 2;
    tz('#thumb-tray').mouseenter(function () {
        tz(this).stop(true, false).animate({
            bottom: 0,
            duration: 1000
        });
    }).mouseleave(function () {
            tz(this).animate({
                bottom: 0 + 'px',
                duration: 1000
            });
        });
</script>



