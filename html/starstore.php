<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily 商务时装")?>
<?php set_page_name("store");?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='starstore lang_<?php global $language; echo $language;?>'>
<?php include_once "include/nav.php";?>
	<div id='wrap'>
        <!--  -->
        <div class="page page_starshop">
            <div class="limit">
                <h2><?php echo Yii::t("strings", "STAR STORE")?></h2>
                <div class="store_txt"><?php echo Yii::t("strings", "NEAR YOU")?></div>
                <div class="store_selbox" id='store-selectbox'>
                    <div class="store_select cs-clear" id='country'>
                        <a class="store_selectbg cs-clear" >
                            <span class="store_sl_txt"><?php echo Yii::t("strings", "China")?></span>
                            <span class="store_sl_icon"></span>
                        </a>
                        <select class="store_sl">
                            <option value="CN"><?php echo Yii::t("strings", "China")?></option>
                        </select>
                    </div>
                    <div class="store_select cs-clear" id='province'>
                        <a class="store_selectbg cs-clear" >
                            <span class="store_sl_txt"><?php echo Yii::t("strings", "Province")?></span>
                            <span class="store_sl_icon"></span>
                        </a>
                        <select class="store_sl"></select>
                    </div>
                    <div class="store_select cs-clear" id='city'>
                        <a class="store_selectbg cs-clear" >
                            <span class="store_sl_txt"><?php echo Yii::t("strings", "City")?></span>
                            <span class="store_sl_icon"></span>
                        </a>
                        <select class="store_sl">
                            <option value="ss_1" data-hash="ss_1"><?php echo Yii::t("strings", "Shanghai")?></option>
                        </select>
                    </div>
                </div>
            </div>
            
            <?php global $language;?>
            <?php if ($language == "cn"): ?>
            <div class='stores'>
                <div class="limit cs-clear" id="ss_1">
                    <div class="desc left">
                        <h2>上海南京路店</h2>
                        <p>上海黄浦区南京东路588号世纪广场对面</p>
                        <p>021-5302 8596</p>
                        <a href="javascript:;" class="store_view fadeout" data-lat="121.485919" data-lng="31.241687"><?php echo Yii::t("strings", "View Map")?></a>
                    </div>
                    <div class="starshop_map starshop_img_right">
                        <img alt="" src="images/starshop1.jpg">
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="limit cs-clear" id="ss_2">
                    <div class="desc right">
                        <h2>上海来福士店</h2>
                        <p>上海市黄浦区西藏中路268号来福士广场04-13</p>
                        <p>021-6313 092</p>
                        <a href="javascript:;" class="store_view fadeout" data-lat="121.483097" data-lng="31.237674"><?php echo Yii::t("strings", "View Map")?></a>
                    </div>
                    <div class="starshop_map starshop_img_left">
                        <img alt="" src="images/starshop4.jpg">
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="limit cs-clear" id="ss_2">
                    <div class="desc left">
                        <h2>上海正大广场店</h2>
                        <p>浦东新区陆家嘴西路168号5-17</p>
                        <p>021-6890 6095</p>
                        <a href="javascript:;" class="store_view fadeout" data-lat="121.506095" data-lng="31.242718"><?php echo Yii::t("strings", "View Map")?></a>
                    </div>
                    <div class="starshop_map starshop_img_right">
                        <img alt="" src="images/satrshop5.jpg">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <?php else: ?>
            <div class='stores'>
                <div class="limit cs-clear" id="ss_1">
                    <div class="desc left">
                        <h2>Shanghai Nanjing Road</h2>
                        <p>opposite to Century Square, No. 588, East Nanjing Rd., Huangpu Dist., Shanghai</p>
                        <p>021-5302 8596</p>
                        <a href="javascript:;" class="store_view fadeout" data-lat="121.485919" data-lng="31.241687"><?php echo Yii::t("strings", "View Map")?></a>
                    </div>
                    <div class="starshop_map starshop_img_right">
                        <img alt="" src="images/starshop1.jpg">
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="limit cs-clear" id="ss_2">
                    <div class="desc right">
                        <h2>Shanghai Raffles City shop</h2>
                        <p>04-13, No.268 Xi Zang Zhong Road, Shanghai, P.R. China</p>
                        <p>021-6313 092</p>
                        <a href="javascript:;" class="store_view fadeout" data-lat="121.483097" data-lng="31.237674"><?php echo Yii::t("strings", "View Map")?></a>
                    </div>
                    <div class="starshop_map starshop_img_left">
                        <img alt="" src="images/starshop4.jpg">
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="limit cs-clear" id="ss_2">
                    <div class="desc left">
                        <h2>Shanghai Super Brand Mall</h2>
                        <p>5-17, No.168 Lu Jia Zui Road, Shanghai, P.R. China</p>
                        <p>021-6890 6095</p>
                        <a href="javascript:;" class="store_view fadeout" data-lat="121.506095" data-lng="31.242718"><?php echo Yii::t("strings", "View Map")?></a>
                    </div>
                    <div class="starshop_map starshop_img_right">
                        <img alt="" src="images/satrshop5.jpg">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>          
            <?php endif;?>
        </div>
        <div id="map"></div>


		<?php include_once "include/footer.php";?>
</body>
</html>
