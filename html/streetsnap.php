<?php include_once "include/functions.php"?>
<?php set_page_title("Lily 商务时装")?>
<?php set_page_name("product");?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>
  
<body class='streetsnap' data-page="streetsnap">
    <?php include_once "include/nav.php";?>
    <?php $streetsnap = loadStreehot();?>
    <?php $images = $streetsnap->streehot_image;?>
    <?php $next_index = -1;?>
    <div id='wrap'>
        <!--  -->
        <div class="page page_streetsnap">
	        <div class="ss_group ss_group_top">
		        <div class='limit cs-clear ss_row1'>
			        <div class="left">
				        <div class="lb_tit">
					        <h2><?php echo Yii::t("strings", "STREET<br />SNAP")?></h2>
					        <div class="fw"><?php echo $streetsnap->season?></div>
				        </div>
			        </div>
			        <div class="streetshot_right">
				        <img class="btn album" data-album="5" data-index='<?php $next_index += 1; echo $next_index;?>'  src="<?php echo thumbnail(array_shift($images), array(850, 850))?>" />
			        </div>
		        </div>
		        <?php $third_images = array_splice($images, 0, 3)?>
		        <div class="list limit cs-clear  ss_row2">
			        <div class="ss_list">
				        <?php foreach ($third_images as $image):?>
					        <img class="btn album" data-index='<?php $next_index += 1; echo $next_index;?>' data-album="5" src="<?php echo $image?>" />
				        <?php endforeach;?>
			        </div>
		        </div>

		        <div class="limit cs-clear ss_row3">
			        <div class="left">
			            <img class="btn album" data-index='<?php $next_index += 1; echo $next_index;?>' data-album="5" src="<?php echo array_shift($images)?>" />
			        </div>
		        </div>
		    </div>


	        <div class="ss_group">
		        <div class='limit cs-clear ss_row1'>
			        <div class="streetshot_right">
				        <img class="btn album" data-index='<?php $next_index += 1; echo $next_index;?>' data-album="5" src="<?php echo array_shift($images)?>" />
			        </div>
		        </div>
		        <?php $third_images = array_splice($images, 0, 3)?>
		        <div class="list limit cs-clear  ss_row2">
			        <div class="ss_list">
				        <?php foreach ($third_images as $image):?>
					        <img class="btn album" data-index='<?php $next_index += 1; echo $next_index;?>' data-album="5" src="<?php echo $image?>" />
				        <?php endforeach;?>
			        </div>
		        </div>

		        <div class="limit cs-clear ss_row3">
			        <div class="left">
				        <img class="btn album" data-index='<?php $next_index += 1; echo $next_index;?>' data-album="5" src="<?php echo array_shift($images)?>" />
			        </div>
		        </div>
		    </div>

	        <div class="ss_group">
		        <div class='limit cs-clear ss_row1'>
			        <div class="streetshot_right">
				        <img class="btn album" data-index='<?php $next_index += 1; echo $next_index;?>' data-album="5" src="<?php echo array_shift($images)?>" />
			        </div>
		        </div>
		        <?php $third_images = array_splice($images, 0, 3)?>
		        <div class="list limit cs-clear  ss_row2">
			        <div class="ss_list">
				        <?php foreach ($third_images as $image):?>
					        <img class="btn album" data-index='<?php $next_index += 1; echo $next_index;?>' data-album="5" src="<?php echo $image?>" />
				        <?php endforeach;?>
			        </div>
		        </div>

		        <div class="limit cs-clear ss_row3">
			        <div class="left">
				        <img class="btn album" data-index='<?php $next_index += 1; echo $next_index;?>' data-album="5" src="<?php echo array_shift($images)?>" />
			        </div>
		        </div>
	        </div>


        </div>
        
        <?php include_once "include/footer.php";?>
        
    </div>
</body>
</html>
