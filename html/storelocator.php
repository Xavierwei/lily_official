<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily Official Site")?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='storelocator'>
<?php include_once "include/nav.php";?>
	<div id='wrap'>
        <!--  -->
        <div class="page page_storelocator">
            <div class="limit">
                <h2><?php echo Yii::t("strings", "STORE")?></h2>
                <div class="store_txt"><?php echo Yii::t("strings", "NEAR YOU")?></div>
                <div class="store_selbox" id='store-selectbox'>
                    <div class="store_select cs-clear" id='country'>
                        <a class="store_selectbg cs-clear" >
                            <span class="store_sl_txt"><?php echo Yii::t("strings", "China")?></span>
                            <span class="store_sl_icon"></span>
                        </a>
                        <select class="store_sl">
                            <option value="cn"><?php echo Yii::t("strings", "China")?></option>
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
                        <select class="store_sl"></select>
                    </div>
                    <div class="store_select cs-clear" id='district'>
                        <a class="store_selectbg cs-clear" >
                            <span class="store_sl_txt"><?php echo Yii::t("strings", "District")?></span>
                            <span class="store_sl_icon"></span>
                        </a>
                        <select class="store_sl"></select>
                    </div>
                </div>

                <button class='searchbtn'><?php echo Yii::t("strings", "Search")?></button>
            </div>

            <div id='map'></div>

            <div class="limit stores"></div>

		</div>
        <?php include_once "include/footer.php";?>
</body>
</html>
