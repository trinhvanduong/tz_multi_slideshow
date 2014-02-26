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

$zoom_width = $params->get('zoom_width','100');
$zoom_height = $params->get('zoom_height','744');
$units_width_zoom = $params->get('units_width_zoom','%');
$units_height_zoom = $params->get('units_height_zoom','px');
$zoom_time = $params->get('zoom_time',6);
$zoom_top = $params->get('zoom_top','-200');
$zoom_right = $params->get('zoom_right','-200');
$zoom_bottom = $params->get('zoom_bottom','-200');
$zoom_left = $params->get('zoom_left','-200');

$document   =   JFactory::getDocument();
$document ->addStyleSheet('modules/mod_tz_multi_slideshow/css/zoomstyle2.css');
$count_list = count($list);
$timetotal = $zoom_time * $count_list;
$document->addStyleDeclaration('
.cb-slideshow li span.even{
    bottom: '.$zoom_bottom.'px;
    left: '.$zoom_left.'px;
    right: '.$zoom_right.'px;
    top: '.$zoom_top.'px;
}
.cb-slideshow li span
{
    -webkit-animation: imageAnimation '.$timetotal.'s linear infinite 0s;
    -moz-animation: imageAnimation '.$timetotal.'s linear infinite 0s;
    -o-animation: imageAnimation '.$timetotal.'s linear infinite 0s;
    -ms-animation: imageAnimation '.$timetotal.'s linear infinite 0s;
    animation: imageAnimation '.$timetotal.'s linear infinite 0s;
}
.cb-slideshow li span.even
{
    -webkit-animation: imageAnimationEven '.$timetotal.'s linear infinite 0s;
    -moz-animation: imageAnimationEven '.$timetotal.'s linear infinite 0s;
    -o-animation: imageAnimationEven '.$timetotal.'s linear infinite 0s;
    -ms-animation: imageAnimationEven '.$timetotal.'s linear infinite 0s;
    animation: imageAnimationEven '.$timetotal.'s linear infinite 0s;
}
.cb-slideshow li div
{
    -webkit-animation: titleAnimation '.$timetotal.'s linear infinite 0s;
    -moz-animation: titleAnimation '.$timetotal.'s linear infinite 0s;
    -o-animation: titleAnimation '.$timetotal.'s linear infinite 0s;
    -ms-animation: titleAnimation '.$timetotal.'s linear infinite 0s;
    animation: titleAnimation '.$timetotal.'s linear infinite 0s;
}


');

?>
<script src="modules/mod_tz_multi_slideshow/js/modernizr.custom.86080.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.cb-slideshow').css('height',<?php echo $zoom_height; ?>+'<?php echo $units_height_zoom;?>');
        jQuery('ul.cb-slideshow').css('width',<?php echo $zoom_width; ?>+'<?php echo $units_width_zoom;?>');
    });
</script>


<?php if($list){ ?>
<?php  $i=1;foreach ($list as $item) :
        $j= $i+1;
        $timer = $i * $zoom_time;
        $images = JUri::base().$item->image;
        if($j <= count($list)){
            $document->addStyleDeclaration('
        .cb-slideshow li:nth-child('.$j.') span {
            -webkit-animation-delay: '.$timer.'s;
            -moz-animation-delay: '.$timer.'s;
            -o-animation-delay: '.$timer.'s;
            -ms-animation-delay: '.$timer.'s;
            animation-delay: '.$timer.'s;
        }
        .cb-slideshow li:nth-child('.$j.') div {
            -webkit-animation-delay: '.$timer.'s;
            -moz-animation-delay: '.$timer.'s;
            -o-animation-delay: '.$timer.'s;
            -ms-animation-delay: '.$timer.'s;
            animation-delay: '.$timer.'s;
        }

        ');
        }
        $document->addStyleDeclaration('
        .cb-slideshow li:nth-child('.$i.') span {
            background-image: url('.$images.');
        }
        .cb-slideshow li:nth-child('.$j.') span {
            -webkit-animation-delay: '.$timer.'s;
            -moz-animation-delay: '.$timer.'s;
            -o-animation-delay: '.$timer.'s;
            -ms-animation-delay: '.$timer.'s;
            animation-delay: '.$timer.'s;
        }

        ');


    $i++; endforeach;
 } ?>
<div class="tz_zoomslider">
<ul class="cb-slideshow">
    <?php if($list){ ?>
<?php $i=1;foreach ($list as $item) : ?>
            <li data-count="<?php echo "number".$i; ?>">
                <?php if($i%2 ==0){ ?>
                <span class="even"><?php echo $item->title; ?></span>
                <?php } else { ?>
                    <span><?php echo $item->title; ?></span>
                <?php } ?>

                <div>
                        <div class="caption-description">
                            <h3 class="slide-title"><?php if($title == 1){ ?>
                                    <?php if($title_link==1){ ?>
                                    <a href="<?php echo $item->link; ?>"> <?php echo $item->title; ?></a><?php } else { ?>
                                        <?php echo $item->title; ?>
                                    <?php } ?>
                                <?php } ?>
                            </h3>
                            <?php if($intro == 1){ ?>
                                <p class="description">
                            <?php echo $item->intro; ?>
                                </p>
                            <?php } ?>
                        </div>

                </div>

            </li>
    <?php     $i++; endforeach;
    } ?>


</ul>

</div>