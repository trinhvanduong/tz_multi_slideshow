<?php
/**
 * Created by PhpStorm.
 * User: TuanMap
 * Date: 5/28/14
 * Time: 6:51 PM
 */

$doc = JFactory::getDocument();
$doc->addStyleSheet(JUri::base() . 'modules/mod_tz_multi_slideshow/css/movingbox.css');
$doc->addScript(JUri::base() . 'modules/mod_tz_multi_slideshow/js/jquery.movingboxes.js');
?>
<ul id="slider">
    <?php foreach ($list as $item): ?>
        <li>
            <div class="tz_img">
                <img src="<?php echo JUri::root() . $item->image; ?>"
                     alt="<?php echo $item->title; ?>"/>
            </div>
            <div class="tz_information">
                <?php if ($title == 1) : ?>
                    <div class="tz_title">
                        <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                    </div>
                <?php endif; ?>
                <?php if ($intro == 1) : ?>
                    <div class="tz_intro">
                        <?php if (isset($limittext) && !empty($limittext)) :
                            $arr_title = explode(' ', $item->intro);
                            $arr_title = array_slice($arr_title, 0, $limittext);
                            $arr_text = implode(' ', $arr_title);
                            echo $arr_text;
                        else :
                            echo $item->intro;
                        endif;?>
                    </div>
                <?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<script type="text/javascript">
    jQuery(window).bind("load resize", function () {
        var timer;
        var b;
        var a = jQuery('.tz_img').height();
        if (jQuery(window).width() < 767) {
            b = a * 0.5;
        } else {
            b = a * 0.2;
        }
        jQuery('#slider').movingBoxes({
            startPanel: <?php echo $mv_startPanel; ?>,      // start with this panel
            wrap: <?php echo $mv_loop;?>,  // if true, the panel will infinitely loop
            buildNav: <?php echo $mv_nav;?>,   // if true, navigation links will be added
            panelWidth: <?php echo $mv_panel_width;?>,
            reducedSize: <?php echo $mv_reducedSize;?>,
            hashTags: true,
            fixedHeight: <?php echo $mv_fixheight;?>,
            speed: <?php echo $mv_speed;?>,
            delayBeforeAnimate: <?php echo $mv_delay;?>,
            completed: function () {

                jQuery('li .tz_information').animate(
                    {
                        bottom: +'-30px'
                    }
                    , 1000
                );
                jQuery('li.current .tz_information').animate(
                    {
                        bottom: b + 'px'
                    }
                    , 1000
                );
            }
        });
        clearTimeout(timer);
        var slider = jQuery('#slider').data('movingBoxes');
        if (jQuery(window).width() >= 1100 && jQuery(window).width() <= 1200) {
            slider.options.width = jQuery(window).width() * 0.85;
            slider.options.panelWidth = 0.5;
        }
        if (jQuery(window).width() >= 992 && jQuery(window).width() <= 1100) {
            slider.options.width = jQuery(window).width() * 0.95;
            slider.options.panelWidth = 0.5;
        }
        if (jQuery(window).width() >= 904 && jQuery(window).width() <= 991) {
            slider.options.width = jQuery(window).width() * 0.775;
            slider.options.panelWidth = 0.455;
        }
        if (jQuery(window).width() >= 840 && jQuery(window).width() < 904) {
            slider.options.width = jQuery(window).width() * 0.81;
            slider.options.panelWidth = 0.4;
        }
        if (jQuery(window).width() >= 768 && jQuery(window).width() < 840) {
            slider.options.width = jQuery(window).width() * 0.8725;
            slider.options.panelWidth = 0.4;
        }
        if (jQuery(window).width() <= 767) {
            slider.options.width = jQuery(window).width() * 0.9;
            slider.options.panelWidth = 1.0;
            slider.options.completed(function () {
                var a = jQuery('.tz_img').height();
                jQuery('li .tz_information').animate(
                    {
                        bottom: +'-30px'
                    }
                    , 1000
                );
                jQuery('li.current .tz_information').animate(
                    {
                        bottom: +(a * 0.8 ) + 'px'
                    }
                    , 1000
                );

            });
        }
        timer = setTimeout(function () {
            slider.update(false);
        }, 100);
    });
</script>