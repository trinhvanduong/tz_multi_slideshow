<?php
/**
 * Created by PhpStorm.
 * User: Hien-Thao
 * Date: 2/14/14
 * Time: 10:04 AM
 */
defined('_JEXEC') or die('Restricted access');

$url = JURI::base();
$document   =   JFactory::getDocument();
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/idangerous.swiper.css');
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/normalize.css');
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/gallery-app.css');
?>


<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/idangerous.swiper-2.0.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/gallery-app.js"></script>


<div class="swiper-container">
    <div class="pagination"></div>
    <div class="swiper-wrapper" style="width:2424px;">
        <?php foreach($list as $item): ?>
        <div class="swiper-slide">
            <div class="inner">
                <img src = "<?php echo JUri::root().$item->image; ?>" alt ="<?php echo $item->title; ?>" />
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>