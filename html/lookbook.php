<?php require_once 'include/functions.php';?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>
 
<?php 
  $lookbookes = loadLookbook();
?>

<body class='lookbook'>
<?php include_once "include/nav.php";?>
	<div id='wrap'>
        <!--  -->
        <div class="page page_lookbook">
            <div class='limit cs-clear'>
                <div class="left">
                    <div class="lb_tit">
                        <h2><?php echo Yii::t("strings", "LOOK<br />BOOK")?></h2>
                        <div class="fw">FW/14</div>
                    </div>
                    <?php foreach ($lookbookes as $index => $lookbook):?>
                    <div class="gohash lb_modtit fadeout" data-hash="s<?php echo $index?>"><?php echo $lookbook->title?></div>
                    <?php endforeach;?>
                </div>
                <?php $first_lookbook = array_shift($lookbookes); ?>
                <?php if ($first_lookbook):?>
                <div class="lookbook_right">
                    <img class="btn album" data-album="1" src="<?php echo array_shift($first_lookbook->look_book_image)?>" />
                </div>
                <?php endif;?>
            </div>

            <div class="list limit cs-clear">
                <?php foreach ($first_lookbook->look_book_image as $index => $look_image):?>
                <img class="btn album" data-album="1" src="<?php echo $look_image?>" />
                <?php endforeach;?>
            </div>
            
            <?php foreach ($lookbookes as $index => $lookbook):?>
            <?php $look_images = $lookbook->look_book_image;?>
          
            <div class="lb_modimg3 cs-clear">
                <div class="lookbook_left">
                    <img class="btn album" data-album="<?php echo $index + 2?>" src="<?php echo array_shift($look_images)?>" />
                </div>
            </div>

            <div class='limit cs-clear' id="s2">
                <div class="left middle lb_modtit fadeout"><?php echo $lookbook->title?></div>
                <div class="lookbook_right">
                    <img class="btn album" data-album="<?php echo $index + 2?>" src="<?php echo array_shift($look_images)?>" />
                </div>
            </div>
            <?php $last_image = array_pop($look_images);?>
          
            <?php foreach ($look_images as $look_image):?>
            <div class="list limit cs-clear">
                <img class="btn album" data-album="<?php echo $index + 2?>" src="<?php echo $look_image?>" />
            </div>
            <?php endforeach;?>

            <div class="limit cs-clear">
                <div class="lookbook_left">
                    <img class="btn album" data-album="<?php echo $index + 2?>" src="<?php echo $last_image?>" />
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <!--  -->

	<?php include_once "include/footer.php";?>
</body>
</html>
