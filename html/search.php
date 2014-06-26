<?php require_once 'include/functions.php';?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>
  
<body class='events'>
  <?php include_once "include/nav.php";?>

    <div id='wrap'>
        <!--  -->
        <div class="page page_event">
            <!--  -->
            <div class="event">
                <div class="event_tit">
                    <h2><?php echo Yii::t("strings", "NEWS")?></h2>
                    <p><?php echo Yii::t("strings", "BUILDING EVERY DAY HISTORY")?></p>
                </div>
                <div class="limit event_list cs-clear">
                    <!--  -->

                    <?php $newsList = searchNews();?>
                    <?php foreach ($newsList as $news):
                        ?>
                    <div class="event_item" data-nid="<?php echo $news['cid'];?>">
                        <div class="event_img">
                            <p></p>
	                        <a href="javascript:;" class="event_open"><img src="<?php echo thumbnail($news['thumbnail'], array('360', '266'));?>" /></a>
                        </div>
                        <div class="event_com">
                            <h3><a href="javascript:;" class="event_open"><?php echo $news['title'];?></a></h3>
                            <div class="news_body">
                                <?php echo $news['body'];?>
                            </div>
                            <a href="javascript:;" class="event_open event_look"><?php echo Yii::t("strings", "LOOK")?></a>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php if (!count($newsList)): ?>
                        <h2><?php echo Yii::t("strings", "no result found")?></h2>
                    <?php endif;?>
                    <!--  -->
                </div>
            </div>
            <!--  --> </div>
        
       <?php include_once "include/footer.php";?>
    </div>
</body>
</html>
