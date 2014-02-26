<?php
/**
 * Created by PhpStorm.
 * User: tranhien
 * Date: 2/18/14
 * Time: 2:45 PM
 */
defined('_JEXEC') or die('Restricted access');

$url = JURI::base();
$document   =   JFactory::getDocument();
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/demo1.css');
$document->addStyleSheet('modules/mod_tz_multi_slideshow/css/style.css');
?>
<script type="text/javascript" src="<?php echo $url;?>modules/mod_tz_multi_slideshow/js/modernizr.custom.04022.js"></script>
<div class="containers">
    <section>
        <div class="hs-wrapper">
            <?php foreach($list as $item): ?>
            <img src = "<?php echo JUri::root().$item->image; ?>" alt ="<?php echo $item->title; ?>" />
<!--                <div class="hs-overlay">-->
<!--                    --><?php //if($title == 1 || $intro == 1) { ?>
<!--                    <div class="sl-description">-->
<!--                        --><?php //} ?>
<!--                        --><?php //if($title == 1){ ?>
<!--                        <a href="--><?php //echo $item->link; ?><!--">--><?php //echo $item->title; ?><!--</a>-->
<!--                    </div>-->
<!---->
<!--                --><?php //} ?>
<!--                </div>-->
            <?php endforeach; ?>
        </div>
    </section>
</div>