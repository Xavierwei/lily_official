<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily Official Site")?>
<?php set_page_name("store");?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='starstore'>
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
                            <option value="ss_2" data-hash="ss_2"><?php echo Yii::t("strings", "Guangzhou")?></option>
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
                        <h2>广州正佳</h2>
                        <p>广州市天河区天河路228号正佳广场1F-1A032L.1A032M号LILY专卖店</p>
                        <p>020-3835 0621</p>
                        <a href="javascript:;" class="store_view fadeout" data-lat="113.333869" data-lng="23.138652"><?php echo Yii::t("strings", "View Map")?></a>
                    </div>
                    <div class="starshop_map starshop_img_left">
                        <img alt="" src="images/starshop2.jpg">
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
                        <h2>Grandview Mall</h2>
                        <p>LILY Store, No. 1A032L.1A032M, 1/F, Zhengjia Plaza, No. 228, Tianhe Road, Tianhe District, Guangzhou</p>
                        <p>020-3835 0621</p>
                        <a href="javascript:;" class="store_view fadeout" data-lat="113.333869" data-lng="23.138652"><?php echo Yii::t("strings", "View Map")?></a>
                    </div>
                    <div class="starshop_map starshop_img_left">
                        <img alt="" src="images/starshop2.jpg">
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
