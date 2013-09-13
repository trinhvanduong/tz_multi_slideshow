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

$nivo_effect =   $params->get('nivo_effect','fade');
$nivo_speed = $params->get('nivo_speed','500');
$nivo_pause = $params->get('nivo_pause','3000');
$nivo_direction = $params->get('nivo_directionNav','true');
$nivo_width = $params->get('nivo_width',1500);
$nivo_bottom = $params->get('nivo_bottom','85');
$themes = $params->get('nivo_theme','default');
$nivo_start = $params->get('nivo_start',0);
$nivo_controlNav = $params->get('nivo_controlNav','true');
$nivo_pauseOnHover = $params->get('nivo_pauseOnHover','true');

$document   =   JFactory::getDocument();
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/nivo-slider.css');
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/themes/'. $themes.'/'.$themes.'.css');

$document->addStyleDeclaration('
    .slider-wrapper {
    width:'.$nivo_width.'px;
    }

');

?>

<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/jquery.nivo.slider.js"></script>

<div class="tz_slideshow">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <?php $i=1;foreach($list as $item): ?>

                <img src="<?php echo JUri::root().$item->image; ?>" data-thumb="<?php echo JUri::root().$item->image_thumb; ?>" alt="" title="#htmlcaption<?php echo $i; ?>" />

            <?php $i++; endforeach; ?>
        </div>
        <?php $j=1;foreach($list as $item): ?>
        <div id="htmlcaption<?php echo $j; ?>" class="nivo-html-caption">
            <?php if($title == 1){ ?>
                <h3 class="tz_title_slide caption-title">
                    <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                </h3>
            <?php } ?>
            <?php if($intro == 1){ ?>
                <p class="">
                    <?php
                    if(isset($limittext) && !empty($limittext)){
                        $arr_title = explode(' ',$item->intro);
                        $arr_title = array_slice($arr_title,0,$limittext);
                        $arr_text  = implode(' ',$arr_title);
                        echo $arr_text;
                    }else{
                        echo strip_tags($item->intro);
                    }
                    ?>

                </p>
            <?php } ?>
        </div>
        <?php $j++; endforeach; ?>

        <div class="nivo-overlay"></div>
    </div>

</div>
<script type="text/javascript">
    jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({
            effect: '<?php echo $nivo_effect; ?>',
            directionNav: <?php echo $nivo_direction; ?> ,
            controlNav: <?php echo $nivo_controlNav; ?> ,
            pauseOnHover: <?php echo $nivo_pauseOnHover; ?>,
            animSpeed: <?php echo $nivo_speed; ?>,
            pauseTime: <?php echo $nivo_pause;?>,
            startSlide: <?php echo $nivo_start;?>
        });
    });
</script>



