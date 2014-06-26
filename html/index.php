<?php include_once 'include/functions.php';?>

<!DOCTYPE html>
<html>
<?php include_once "include/header.php"; ?>
<body class='index'>
    
    <?php include_once 'include/nav.php';?>

    <div id='wrap'>
        <!--  -->
        <div class="page page_home">
            <!--  -->
            <div class="limit home_new">
                <?php $firstNews = loadFirstNews(); ?>
                <h2><?php echo Yii::t("strings", "NEWS")?></h2>
                <div class="tit_time"><?php echo date('d/m/y',strtotime($firstNews->cdate));?></div>
                <div class="home_new_cn">
	                <?php echo Yii::t("strings", "news_text")?>
                </div>
                <div class="home_new_more cs-clear" >
                    <a href="./events" class="btn btnlink" ><span><?php echo Yii::t("strings", "More news")?></span><span><?php echo Yii::t("strings", "More news")?></span></a>
                </div>
            </div>
            <!--  -->
            <div class="limit home_img1">
                <img src="images/home_img1.jpg" />
            </div>
            <!--  -->
            <div class="limit home_brand cs-clear" id="brand_story">
                <div class='left'>
                    <h2><?php echo Yii::t("strings", "BRAND")?></h2>
                    <div class="home_brand_txt">
	                    <?php echo Yii::t("strings", "brand_story_text")?>
                    </div>
                </div>
                <div class='right'>
                    <div class="home_img2">
                        <img src="images/home_img2.jpg" />
                    </div>
                    <div class="home_img3">
                        <img src="images/home_img3.jpg" />
                    </div>
                </div>
            </div>
            <div class='limit cs-clear'>
                <div class="left">
                    <!--  -->
                    <?php $timeline = loadWeibo();?>
                    <div class="weibo">
                        <div class="weibo_wbbg"></div>
                        <div class="weibo_wbbox">
                            <div class="weibo_wblogo"></div>
                            <div class="weibo_wbtime"><?php echo date("l d M", strtotime($timeline["created_at"]))?></div>
                            <div class="weibo_wbcom"><?php echo $timeline["text"]?>，</div>
                            <div class="weibo_wb_btn">
                                <a href="http://weibo.com/lilyofficial" target="_blank" class="btnlink"><span><?php echo Yii::t("strings", "Follow")?></span><span><?php echo Yii::t("strings", "Follow")?></span></a>
                            </div>
                        </div>
                    </div>
                    <a href="#campaign" class="home_cpbox">
                        <h2><?php echo Yii::t("strings", "CAM-<br />PAIGN")?></h2>
	                    <?php if(Yii::app()->language == 'en_us'):?>
		                    <p>FW/14</p>
		                    <p>featuring<br />Tilda Lindstam</p>
	                    <?php else:?>
		                    <p>14秋冬</p>
		                    <p>蒂尔达·林斯丹姆</p>
	                    <?php endif;?>
                    </a>
                </div>
                <!--  -->
                <div class="right">
                    <div class="home_lookbook">
                        <a href="#lookbook" class="home_lb_item border">
                            <h2><?php echo Yii::t("strings", "LOOK<br />BOOK")?></h2>
                            <p>FW/14</p>
                        </a>
                        <div class="home_lb_item">
                            <a href="#lookbook" class='border'><?php echo Yii::t("strings", "GARDEN")?></a>
                        </div>
                        <div class="home_lb_item">
                            <a href="#lookbook?hash=s2" class='border'><?php echo Yii::t("strings", "MODERN ART")?></a>
                        </div>
                        <div class="home_lb_item">
                            <a href="#lookbook?hash=s3" class='border'><?php echo Yii::t("strings", "OCEAN")?></a>
                        </div>
                        <div class='videowrap'>
                            <img class='video fadeout' src="images/home_img4.jpg" />
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div id='home-selectbox' class="home_store">
                <h2><?php echo Yii::t("strings", "STORE")?></h2>
                <div class="home_sttxt"><?php echo Yii::t("strings", "NEAR YOU")?></div>
                <div class="store_select cs-clear" id='province'>
                    <a class="store_selectbg cs-clear" >
                        <span class="store_sl_txt">Province</span>
                        <span class="store_sl_icon"></span>
                    </a>
                    <select class="store_sl"></select>
                </div>
                <div class="store_select cs-clear" id='city'>
                    <a class="store_selectbg cs-clear" >
                        <span class="store_sl_txt"><?php echo Yii::t("strings", "City")?></span>
                        <span class="store_sl_icon"></span>
                    </a>
                    <select class="store_sl"></select>
                </div>
            </div>

            <div id='map'>
            </div>
        </div>
        
      <?php include_once 'include/footer.php';?>
    </div>
</body>
</html>
