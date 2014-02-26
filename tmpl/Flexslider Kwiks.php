<?php
/**
 * Created by PhpStorm.
 * User: Hien-Thao
 * Date: 2/13/14
 * Time: 9:53 AM
 */
defined('_JEXEC') or die('Restricted access');

$url = JURI::base();
$container_width = $params->get('container_width','800');
$units_width_container = $params->get('units_width_container','px');
$flex_caption = $params->get('flex_caption','block');
$document   =   JFactory::getDocument();
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/default-five-slides.css');
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/Flexslider-Kwiks.css');
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/default.css');
$document->addStyleDeclaration('
    #container{
        margin: 0 auto;
        max-width:'.$container_width.''.$units_width_container.';
        width: 80%
    }
    .flex-caption{
        display: '.$flex_caption.' !important;
    }
');
?>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/kwiks.js"></script>
<script type="text/javascript">
    var Main = Main || {};

    jQuery(window).load(function() {
        window.responsiveFlag = jQuery('#responsiveFlag').css('display');
        Main.gallery = new Gallery();

        jQuery(window).resize(function() {
            Main.gallery.update();
        });
    });

    function Gallery(){
        var self = this,
            container = jQuery('.flexslider'),
            clone = container.clone( false );

        this.init = function (){
            if( responsiveFlag == 'block' ){
                var slides = container.find('.slides');

                slides.kwicks({
                    max : 500,
                    spacing : 0
                }).find('li > a').click(function (){
                        return false;
                    });
            } else {
                container.flexslider();
            }
        }
        this.update = function () {
            var currentState = jQuery('#responsiveFlag').css('display');

            if(responsiveFlag != currentState) {

                responsiveFlag = currentState;
                container.replaceWith(clone);
                container = clone;
                clone = container.clone( false );

                this.init();
            }
        }

        this.init();
    }
</script>
<div id="container">

    <div class="flexslider">
        <ul class="slides">
            <?php foreach($list as $item): ?>
                <li>
                    <div class="info_slide">
                            <span class="tz_image">
                                <img src = "<?php echo JUri::root().$item->image; ?>" alt ="<?php echo $item->title; ?>" />
                            </span>
                        <?php if($title == 1 || $intro == 1) { ?>
                        <div class="flex-caption">
                            <?php } ?>
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
                            <?php if($title == 1 || $intro == 1) { ?>
                        </div>

                    <?php } ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<span id="responsiveFlag"></span>
