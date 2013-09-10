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

$tz_effect          =   $params->get('tz_effect');
$tz_autoslide = $params->get('tz_autoslide');
$tz_speed = $params->get('tz_slideSpeed');
$tz_direction = $params->get('tz_direction_slide');
$document   =   &JFactory::getDocument();
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/flexslider.css');
//var_dump($title); die();
$document->addStyleDeclaration('
    #tz_Flexslider{

    }
    #carousel{
    width:1500px;
    bottom:-85px !important;
    }
');

?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        var win_height = jQuery(window).height();
        jQuery('#tz_Flexslider, #slider, #tz_Flexslider #slider .slides .info_slide').css('height',win_height+'px');
    });
</script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/jquery.fitvid.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/froogaloop.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/modernizr.js"></script>

<div class="tz_slideshow">
    <div id="tz_Flexslider">
        <div id="slider" class="flexslider">
            <ul class="slides">
                <?php foreach($list as $item):  ?>
                    <li>
                        <div class="info_slide">
                            <span class="tz_image">
                                <iframe id="player_1" src="http://player.vimeo.com/video/<?php echo $item->video_id; ?>?api=1&amp;player_id=player_1" width="1500" height="744" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            </span>
                            <?php if($title == 1 || $intro == 1 || $readmore == 1) { ?>
                            <div class="sl-description">
                                <?php } ?>
                                <?php if($title == 1){ ?>
                                    <h3 class="tz_title_slide caption-title">
                                        <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                                    </h3>
                                <?php } ?>
                                <?php if($hits == 1){ ?>
                                    <span class="tz_hits">
                                            <?php echo JText::sprintf('MOD_TZ_NEWS_HIST_LIST', $item->hit) ?>
                                        </span>
                                <?php } ?>
                                <?php if($date == 1){ ?>
                                    <span class="tz_date">
                                            <?php echo JText::sprintf("MOD_TZ_NEWS_DATE_ALL",date(JText::_('MOD_TZ_NEWS_DATE_FOMAT'),strtotime($item->created))) ; ?>
                                        </span>
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
                                        <?php if($readmore == 1){ ?>
                                            <span class="tz_readmore">
                                                <a class="font-bold" href="<?php echo $item->link; ?>"><?php echo JText::_('MOD_TZ_NEWS_READ_MORE') ?></a>
                                                </span>
                                        <?php } ?>
                                    </p>
                                <?php } ?>
                                <?php if($title == 1 || $des == 1 || $readmore == 1) { ?>
                            </div>

                        <?php } ?>

<!--                            <div class="bg-slide-overlay"></div>-->


                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>

        </div>

        <div id="carousel" class="flexslider">
            <ul class="slides">
                <?php foreach($list as $item): ?>
                <li>
                    <img src="<?php echo $item->image; ?>" />
                </li>

                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(window).load(function(){
        // Vimeo API nonsense
        var player = document.getElementById('player_1');
        $f(player).addEvent('ready', ready);

        function addEvent(element, eventName, callback) {
            (element.addEventListener) ? element.addEventListener(eventName, callback, false) : element.attachEvent(eventName, callback, false);
        }

        function ready(player_id) {
            var froogaloop = $f(player_id);

            froogaloop.addEvent('play', function(data) {
                jQuery('.flexslider').flexslider("pause");
            });

            froogaloop.addEvent('pause', function(data) {
                jQuery('.flexslider').flexslider("play");
            });

        }


        // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
        jQuery(".flexslider")
            .fitVids()
            .flexslider({
                animation: "slide",
                useCSS: false,
                animationLoop: false,
                smoothHeight: true,
                start: function(slider){
                    jQuery('body').removeClass('loading');
                },
                before: function(slider){
                    $f(player).api('pause');
                }
            });
    });
</script>


