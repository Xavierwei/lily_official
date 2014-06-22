<?php require_once 'include/functions.php';?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='lookbook'>
<?php include_once "include/nav.php";?>
	<div id='wrap'>
        <!--  -->
        <div class="page page_lookbook">
            <div class='limit cs-clear'>
                <div class="left">
                    <div class="lb_tit">
                        <h2><?php echo Yii::t("strings", "LOOK<br />BOOK")?></h2>
                        <div class="fw">FW/14</div>
                    </div>
                    <div class="lb_modtit fadeout"><?php echo Yii::t("strings", "GARDEN")?></div>
                    <div class="gohash lb_modtit fadeout" data-hash="s2"><?php echo Yii::t("strings", "MODERN ART")?></div>
                    <div class="gohash lb_modtit fadeout" data-hash="s3"><?php echo Yii::t("strings", "OCEAN")?></div>
                </div>
                <div class="lookbook_right">
                    <img class="btn album" data-album="1" src="pic/lookbook/garden/850_850/1.jpg" />
                </div>
            </div>

            <div class="list limit cs-clear">
                <img class="btn album" data-album="1" src="pic/lookbook/garden/425_610/2.jpg" />
                <img class="btn album" data-album="1" src="pic/lookbook/garden/425_610/3.jpg" />
                <img class="btn album" data-album="1" src="pic/lookbook/garden/425_610/4.jpg" />
            </div>

            <div class="lb_modimg3 cs-clear">
                <div class="lookbook_left">
                    <img class="btn album" data-album="2" src="pic/lookbook/garden/850_850/5.jpg" />
                </div>
            </div>

            <div class='limit cs-clear' id="s2">
                <div class="left middle lb_modtit fadeout"><?php echo Yii::t("strings", "MODERN ART")?></div>
                <div class="lookbook_right">
                    <img class="btn album" data-album="2" src="pic/lookbook/modernart/850_850/28.jpg" />
                </div>
            </div>

            <div class="list limit cs-clear">
                <img class="btn album" data-album="2" src="pic/lookbook/modernart/425_610/29.jpg" />
                <img class="btn album" data-album="2" src="pic/lookbook/modernart/425_610/30.jpg" />
                <img class="btn album" data-album="2" src="pic/lookbook/modernart/425_610/31.jpg" />
            </div>

            <div class="limit cs-clear">
                <div class="lookbook_left">
                    <img class="btn album" data-album="2" src="pic/lookbook/modernart/850_850/32.jpg" />
                </div>
            </div>

            <div class='limit cs-clear' id="s3">
                <div class="left middle lb_modtit fadeout"><?php echo Yii::t("strings", "OCEAN")?></div>
                <div class="lookbook_right">
                    <img class="btn album" data-album="3" src="pic/lookbook/ocean/850_850/9.jpg" />
                </div>
            </div>

            <div class="list limit cs-clear">
                <img class="btn album" data-album="3" src="pic/lookbook/ocean/425_610/10.jpg" />
                <img class="btn album" data-album="3" src="pic/lookbook/ocean/425_610/11.jpg" />
                <img class="btn album" data-album="3" src="pic/lookbook/ocean/425_610/12.jpg" />
            </div>

            <div class="limit cs-clear">
                <div class="lookbook_left">
                    <img src="pic/lookbook/ocean/850_850/13.jpg" />
                </div>
            </div>
        </div>
        <!--  -->

	<?php include_once "include/footer.php";?>
</body>
</html>
