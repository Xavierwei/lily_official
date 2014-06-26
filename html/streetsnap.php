<?php include_once "include/functions.php"?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>
  
<body class='streetshot' data-page="streetshot">
    <?php include_once "include/nav.php";?>
    <?php $streetsnap = loadStreehot();?>
    <?php $images = $streetsnap->streehot_image;?>
    <div id='wrap'>
        <!--  -->
        <div class="page page_streetshot">
            <div class='limit cs-clear'>
                <div class="left">
                    <div class="lb_tit">
                        <h2><?php echo Yii::t("strings", "STREET<br />SNAP")?></h2>
                        <div class="fw"><?php echo $streetsnap->season?></div>
                    </div>
                </div>
                <div class="streetshot_right">
                    <img class="btn album" data-album="5" src="<?php echo array_shift($images)?>" />
                </div>
            </div>
            <?php $third_images = array_splice($images, 0, 3)?>
            <div class="list limit cs-clear">
                <?php foreach ($third_images as $image):?>
                <img class="btn album" data-album="5" src="<?php echo $image?>" />
                <?php endforeach;?>
            </div>
            
            <div class="limit cs-clear">
                <img class="btn album" data-album="5" src="<?php echo array_shift($images)?>" />
            </div>

            <div class="limit cs-clear">
                <img class="btn album" data-album="5" class='right' src="<?php echo array_shift($images)?>" />
            </div>

            <?php $third_images = array_splice($images, 0, 3)?>
            <div class="list limit cs-clear">
                <?php foreach ($third_images as $image):?>
                <img class="btn album" data-album="5" src="<?php echo $image?>" />
                <?php endforeach;?>
            </div>
            <div class="limit cs-clear">
                <img class="btn album" data-album="5" src="<?php echo array_shift($images)?>" />
            </div>
            
            <?php while (count($images)) {?>
            <div class="limit cs-clear">
                <img class="btn album" data-album="5" src="<?php echo array_shift($images)?>" />
            </div>
              <?php $third_images = array_splice($images, 0, 3)?>
              <div class="list limit cs-clear">
                <?php foreach ($third_images as $image):?>
                <img class="btn album" data-album="5" src="<?php echo $image?>" />
                <?php endforeach;?>
              </div>

              <div class="limit cs-clear">
                  <img class="btn album" data-album="5" src="<?php echo array_shift($images)?>" />
              </div>
            <?php }?>
        </div>
    </div>
        
        <?php include_once "include/footer.php";?>
        
    </div>
</body>
</html>
