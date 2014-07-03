<div class="header" data-0="height:100px;" data-100="height:70px;">
    <ul id='nav' >
        <li class='item logo' data-0="line-height:50px;" data-100="line-height:24px;">
            <img src="./images/hd_logo.png">
        </li>
        <li class='item' style="display:none">
            <h2 data-title="LILY-CLUB"><span class="club"><?php echo Yii::t("strings", "VIP CLUB")?></span></h2>
            <ol>
                <li><a data-title="LILY-CLUB" href='./club_memberinfo.html' index='9'><?php echo Yii::t("strings", "LILY CLUB")?></a></li>
                <li><a data-title="TERMS" href='./club_memberrules.html' index='10'><?php echo Yii::t("strings", "TERMS")?></a></li>
                <li><a data-title="POINT CHECKING" href='./club_pointinfo.html' index='11'><?php echo Yii::t("strings", "POINT CHECKING")?></a></li>
                <li><a data-title="REDEMPTION" href='./club_gifthis.html' index='12'><?php echo Yii::t("strings", "REDEMPTION")?></a></li>
            </ol>
        </li>
        <li class='item <?php echo active_class("home")?>'>
          <h2 data-0="padding-top:36px;" data-100="padding-top:20px;"><a class="" data-title="Home" href='./index' title='index' index='1'><?php echo Yii::t("strings", "Home")?></a></h2>
        </li>
        <li class='item <?php echo active_class("brand")?>'>
            <h2 data-0="padding-top:36px;" data-100="padding-top:20px;" data-title="BRAND"><?php echo Yii::t("strings", "BRAND")?></h2>
            <ol>
                <li><a data-title="HISTORY" href='./history' title='history' index='2'><?php echo Yii::t("strings", "HISTORY")?></a></li>
                <li><a data-title="EVENTS" href='./events' title='events' index='3'><?php echo Yii::t("strings", "EVENTS")?></a></li>
            </ol>
        </li>
        <li class='item <?php echo active_class("product")?>'>
            <h2 data-0="padding-top:36px;" data-100="padding-top:20px;" data-title="PRODUCT"><?php echo Yii::t("strings", "PRODUCT")?></h2>
            <ol>
                <li><a data-title="CAMPAIGN" href='./campaign' title='campaign' index='4'><?php echo Yii::t("strings", "CAMPAIGN")?></a></li>
                <li><a data-title="LOOKBOOK" href='./lookbook' title="lookbook" index='5'><?php echo Yii::t("strings", "LOOK BOOK")?></a></li>
                <li><a data-title="STREET-SNAP" href='./streetsnap' title="streetsnap" index='6'><?php echo Yii::t("strings", "STREET SNAP")?></a></li>
            </ol>
        </li>
        <li class='item <?php echo active_class("store")?>'>
            <h2 data-0="padding-top:36px;" data-100="padding-top:20px;" data-title="STORE"><?php echo Yii::t("strings", "STORE")?></h2>
            <ol>
                <li><a data-title="STAR-STORE" href='./starstore' title="starstore" index='7'><?php echo Yii::t("strings", "STAR STORE")?></a></li>
                <li><a data-title="STORE-LOCATOR" href='./storelocator' title="storelocator" index='8'><?php echo Yii::t("strings", "STORE LOCATOR")?></a></li>
            </ol>
        </li>
    </ul>

    <a class='menu'></a>
	<div class="language lang-<?php global $language; echo $language;?>" data-0="top:38px;" data-100="top:28px;">
		<a href="" data-lang="en_us" class="lang_en">EN</a>
		<a href="" data-lang="zh_cn" class="lang_cn">中文</a>
	</div>
    <a href="javascript:void(0);" class="search btn" data-0="top:43px;" data-100="top:30px;"></a>
</div>