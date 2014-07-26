<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily 商务时装")?>
<?php set_page_name("product");?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>
 
<?php 
  $lookbookes = loadLookbook();
  $title = $lookbookes[0];
  $lookbookes = $lookbookes[1];
  $next_index = -1;
?>

<body class='lookbook lang_<?php global $language; echo $language;?>'>
<?php include_once "include/nav.php";?>
	<div id='wrap'>
        <!--  -->
        <div class="page page_lookbook">

	        <div class="ss_group ss_group_top">
		        <div class='limit cs-clear ss_row1'>
			        <div class="left">
				        <div class="lb_tit">
					        <h2><?php echo Yii::t("strings", "LOOK<br />BOOK")?></h2>
					        <div class="fw"><?php echo $title?></div>
				        </div>
			        </div>
			        <?php $first_lookbook = array_shift($lookbookes); ?>
			        <?php if ($first_lookbook):?>
				        <div class="lookbook_right">
					        <img class="btn album" data-album="1" data-index="<?php $next_index += 1; echo $next_index;?>" src="<?php echo array_shift($first_lookbook->look_book_image)?>" />
				        </div>
			        <?php endif;?>
		        </div>

		        <?php $last_image = array_pop($first_lookbook->look_book_image);?>
		        <div class="list limit cs-clear  ss_row2">
			        <div class="ss_list">
				        <?php foreach ($first_lookbook->look_book_image as $index => $look_image):?>
                <img class="btn album" data-album="1" data-index="<?php $next_index += 1; echo $next_index;?>" src="<?php echo $look_image?>" />
				        <?php endforeach;?>
			        </div>
		        </div>

		        <div class="limit cs-clear ss_row3">
			        <div class="left">
				        <img class="btn album" data-album="1" data-index="<?php $next_index += 1; echo $next_index;?>" src="<?php echo $last_image?>" />
			        </div>
		        </div>
	        </div>
            
            <?php foreach ($lookbookes as $index => $lookbook):?>
            <?php $look_images = $lookbook->look_book_image;?>
	            <div class="ss_group" id="s<?php echo $index+1;?>">
		            <div class='limit cs-clear ss_row1'>

			            <div class="lookbook_right">
				            <img class="btn album" data-album="1" data-index='<?php $next_index += 1; echo $next_index;?>' src="<?php echo array_shift($look_images)?>" />
			            </div>
		            </div>
		            <?php $last_image = array_pop($look_images);?>
		            <div class="list limit cs-clear  ss_row2">
			            <div class="ss_list">
				            <?php foreach ($look_images as $look_image):?>
					            <img class="btn album" data-album="1" data-index='<?php $next_index += 1; echo $next_index;?>' src="<?php echo $look_image?>" />
				            <?php endforeach;?>
			            </div>
		            </div>

		            <div class="limit cs-clear ss_row3">
			            <div class="left">
				            <img class="btn album" data-album="1" data-index='<?php $next_index += 1; echo $next_index;?>' src="<?php echo $last_image?>" />
			            </div>
		            </div>
	            </div>
            <?php endforeach;?>
        </div>
        <!--  -->

	<?php include_once "include/footer.php";?>
</body>
</html>
