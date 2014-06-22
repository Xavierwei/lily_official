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
                <h2<?php echo $firstNews->title?></h2>
                <div class="tit_time"><?php echo date('d/m/Y',strtotime($firstNews->attributes['cdate']));?></div>
                <div class="home_new_cn">
                    <?php echo $firstNews->body;?>
                </div>
                <div class="home_new_more cs-clear" >
                    <a href="#news" class="btn btnlink" ><span><?php echo Yii::t("strings", "More news")?></span><span><?php echo Yii::t("strings", "More news")?></span></a>
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
                        <p>
                            年轻OL的商务着装，可能太严肃，可能太时髦，或者像Lily这样正合适。 作为年轻OL商务时装的开创者，Lily秉承时尚与商务完美融合的理念，以清新明快、现代简约的风格，为都市年轻职业女性设计商务场合＂正合适＂的商务时装。
                        </p>
                        <p>
                            “力度、女性化、现代、明快”是Lily品牌核心的产品风格。设计师以“现代艺术范”为创作灵感，与超现实主义、摩登时代、拜占庭艺术等时尚潮流元素相结合，以简洁利落的廓形、独具创意的色彩和印花创造出独特的商务时装美学。
                        </p>
                        <p>
                            Lily商务时装已在中国开设700余家品牌店铺，入驻上海、北京、广州、深圳、武汉等250个城市，并在俄罗斯、沙特、泰国、新加坡、科威特等国际市场开设零售店铺近60家。
                        </p>
                        <p>
                            Lily品牌成功登陆国际米兰时装周、德国CPD等多个国际性时尚盛会，并在米兰时装周上荣膺“新锐设计师”大奖，成为国际时尚圈倍受关注的新锐时装品牌。
                        </p>
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
                    <div class="weibo">
                        <div class="weibo_wbbg"></div>
                        <div class="weibo_wbbox">
                            <div class="weibo_wblogo"></div>
                            <div class="weibo_wbtime">Monday 23 may</div>
                            <div class="weibo_wbcom">年轻OL的商务着装，可能太严肃，可能太时髦，或者像Lily这样正合适 作为年轻OL商务时装的开创者，</div>
                            <div class="weibo_wb_btn">
                                <a href="http://weibo.com/lilyofficial" target="_blank" class="btnlink"><span>Follow</span><span>Follow</span></a>
                            </div>
                        </div>
                    </div>
                    <a href="#campaign" class="home_cpbox">
                        <h2>
                            cam-
                            <br />
                            paign
                        </h2>
                        <p>FW/14</p>
                        <p>
                            featuring
                            <br />
                            barbara palvin
                        </p>
                    </a>
                </div>
                <!--  -->
                <div class="right">
                    <div class="home_lookbook">
                        <a href="#lookbook" class="home_lb_item border">
                            <h2>
                                LOOK
                                <br />
                                BOOK
                            </h2>
                            <p>FW/14</p>
                        </a>
                        <div class="home_lb_item">
                            <a href="#lookbook" class='border'>GARDEN</a>
                        </div>
                        <div class="home_lb_item">
                            <a href="#lookbook?hash=s2" class='border'>MODERN ART</a>
                        </div>
                        <div class="home_lb_item">
                            <a href="#lookbook?hash=s3" class='border'>OCEAN</a>
                        </div>
                        <div class='videowrap'>
                            <img class='video fadeout' src="images/home_img4.jpg" />
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div id='home-selectbox' class="home_store">
                <h2>STORE</h2>
                <div class="home_sttxt">CLOSE TO YOU</div>
                <div class="store_select cs-clear" id='province'>
                    <a class="store_selectbg cs-clear" >
                        <span class="store_sl_txt">Province</span>
                        <span class="store_sl_icon"></span>
                    </a>
                    <select class="store_sl"></select>
                </div>
                <div class="store_select cs-clear" id='city'>
                    <a class="store_selectbg cs-clear" >
                        <span class="store_sl_txt">City</span>
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
