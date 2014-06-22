<?php require_once 'functions.php';?>
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
                    <h2>NEWS</h2>
                    <p>BUILDING EVERY DAY HISTORY</p>
                </div>
                <div class="limit event_list cs-clear">
                    <!--  -->

                    <?php $newsList = searchNews();?>
                    <?php foreach ($newsList as $news):?>
                    <div class="event_item" data-nid="<?php echo $news->cid;?>">
                        <div class="event_img">
                            <p></p>
	                        <a href="javascript:;" class="event_open"><img src="images/news2.jpg" /></a>
                        </div>
                        <div class="event_com">
                            <h3><a href="javascript:;" class="event_open"><?php echo $news->title;?></a></h3>
                            <div class="news_body">
                                <?php echo $news->body;?>
                            </div>
                            <a href="javascript:;" class="event_open event_look"><?php echo Yii::t("strings", "LOOK")?></a>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <!--  -->
                </div>
            </div>
            <!--  --> </div>
        
       <?php include_once "include/footer.php";?>
    </div>
</body>
</html>
