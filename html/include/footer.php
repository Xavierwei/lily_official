        <!--  -->
	    <div class="footer">
		    <div class="ft_logo"></div>

		    <div class="ft_com">
			    <div class="ft_list">
				    <h2 data-title="BRAND"><?php echo Yii::t("strings", "BRAND")?></h2>
				    <ol>
					    <li><a data-title="HISTORY" href='./history'><?php echo Yii::t("strings", "HISTORY")?></a></li>
					    <li><a data-title="EVENTS" href='./events'><?php echo Yii::t("strings", "EVENTS")?></a></li>
				    </ol>
			    </div>
			    <div class="ft_list">
				    <h2 data-title="PRODUCT"><?php echo Yii::t("strings", "PRODUCT")?></h2>
				    <ol>
					    <li><a data-title="CAMPAIGN" href='./campaign'><?php echo Yii::t("strings", "CAMPAIGN")?></a></li>
					    <li><a data-title="LOOK-BOOK" href='./lookbook'><?php echo Yii::t("strings", "LOOK BOOK")?></a></li>
					    <li><a data-title="STREET-SNAP" href='./streetsnap'><?php echo Yii::t("strings", "STREET SNAP")?></a></li>
				    </ol>
			    </div>
			    <div class="ft_list">
				    <h2 data-title="STORE"><?php echo Yii::t("strings", "STORE")?></h2>
				    <ol>
					    <li data-title="STAR-STORE"><a href='./starstore'><?php echo Yii::t("strings", "STAR STORE")?></a></li>
					    <li data-title="STORE-LOCATOR"><a href='./storelocator'><?php echo Yii::t("strings", "STORE LOCATOR")?></a></li>
				    </ol>
			    </div>
			    <div class="ft_list" style="display:none;">
				    <h2 data-title="CLUB" ><?php echo Yii::t("strings", "CLUB")?></h2>
				    <ol>
					    <li><a data-title="LILY-CLUB" href='./club_memberinfo.html' index='9'><?php echo Yii::t("strings", "LILY CLUB")?></a></li>
					    <li><a data-title="TERMS" href='./club_memberrules.html' index='10'><?php echo Yii::t("strings", "TERMS")?></a></li>
					    <li><a data-title="POINT-CHECKING" href='./club_pointinfo.html' index='11'><?php echo Yii::t("strings", "POINT CHECKING")?></a></li>
					    <li><a data-title="REDEMPTION" href='./club_gifthis.html' index='12'><?php echo Yii::t("strings", "REDEMPTION")?></a></li>
				    </ol>
			    </div>
			    <div class="cs-clear cs-height-footer"></div>
<!--			    <div class="ft_links">
				    <ol>
					    <li><a class='fadeout' href="./job"><?php echo Yii::t("strings", "JOB")?></a></li>
					    <li><a class='fadeout' href="./contact"><?php echo Yii::t("strings", "CONTACT")?></a></li>
					    <li><a class='fadeout' href="./privacy"><?php echo Yii::t("strings", "PRIVACY")?></a></li>
				    </ol>
			    </div>-->
          <div class="ft_list">
            <h2><a href="./job"><?php echo Yii::t("strings", "JOB")?></a></h2>
          </div>
          <div class="ft_list">
            <h2><a href="./contact"><?php echo Yii::t("strings", "CONTACT")?></a></h2>
          </div>
          <div class="ft_list">
            <h2><a href="./privacy"><?php echo Yii::t("strings", "PRIVACY")?></a></h2>
          </div>
			    <div class="ft_list">
				    <div class="ft_share cs-clear">
					    <a href="http://weibo.com/lilyofficial" target='_blank' class="ft_shareitem ft_share1"></a>
					    <a href="javascript:;" class="ft_shareitem ft_share3"></a>
				    </div>
			    </div>
			    <div class="cs-clear"></div>
		    </div>

		    <div class="ft_copy">© 2013 Lily <?php echo Yii::t("strings", "OFFICIAL WEBSITE")?> 沪ICP备05036513号-1</div>
	    </div>
    </div>

    <!-- showy -->
    <div class="showy">
        <div class="showyitem showyitem1" data-0='bottom: 20%;' data-1200="bottom:120%;"></div>
        <div class="showyitem showyitem3" data-0='bottom: -20%;' data-5000="bottom:120%;"></div>
        <div class="showyitem showyitem4" data-0='bottom: -20%;' data-900-end="bottom:60%;"></div>
        <div class="showyitem showyitem5" data-0='bottom: -20%;' data-1300-end="bottom:5%;" data-900-end="bottom:20%;" data-500-end="bottom:35%;"></div>
    </div>


    <span class='loading top' data-0="top:100px;" data-100="top:80px;"></span>
    <span class='loading left' data-0="top:100px;" data-100="top:80px;"></span>
    <span class='loading bottom' data-0="bottom:70px;" data-100="bottom:90px;"></span>
    <span class='loading right' data-0="top:100px;" data-100="top:80px;"></span>

        <!-- mobile menu -->
    <div class='mbmenu'>
        <ul>
            <li class='item <?php echo active_class("home")?>'>
                <h2><a data-title="Home" href='./index' title='index' index='1'><?php echo Yii::t("strings", "Home")?></a></h2>
                <ol></ol>
            </li>
            <li class='item <?php echo active_class("brand")?>'>
                <h2 data-title="BRAND"><?php echo Yii::t("strings", "BRAND")?></h2>
                <ol>
                    <li><a href='./history' data-title="HISTORY"><?php echo Yii::t("strings", "HISTORY")?></a></li>
                    <li><a href='./events' data-title="EVENTS"><?php echo Yii::t("strings", "EVENTS")?></a></li>
                </ol>
            </li>
            <li class='item <?php echo active_class("product")?>'>
                <h2 data-title="PRODUCT"><?php echo Yii::t("strings", "PRODUCT")?></h2>
                <ol>
                    <li><a href='./campaign' data-title="CAMPAIGN"><?php echo Yii::t("strings", "CAMPAIGN")?></a></li>
                    <li><a href='./lookbook' data-title="LOOKBOOK"><?php echo Yii::t("strings", "LOOK BOOK")?></a></li>
                    <li><a href='./streetsnap' data-title="STREET-SNAP"><?php echo Yii::t("strings", "STREET SNAP")?></a></li>
                </ol>
            </li>
            <li class='item <?php echo active_class("store")?>'>
                <h2 data-title="STORE"><?php echo Yii::t("strings", "STORE")?></h2>
                <ol>
                    <li><a href='./starstore' data-title="STAR-STORE"><?php echo Yii::t("strings", "STAR STORE")?></a></li>
                    <li><a href='./storelocator' data-title="STORE-LOCATOR"><?php echo Yii::t("strings", "STORE LOCATOR")?></a></li>
                </ol>
            </li>
            <li class='item' style="display: none;">
                <h2 data-title="CLUB"><?php echo Yii::t("strings", "CLUB")?></h2>
                <ol>
	                <li><a href='./club_memberinfo.html' index='9' data-title="LILY-CLUB"><?php echo Yii::t("strings", "LILY CLUB")?></a></li>
	                <li><a href='./club_memberrules.html' index='10' data-title="TERMS"><?php echo Yii::t("strings", "TERMS")?></a></li>
	                <li><a href='./club_pointinfo.html' index='11' data-title="POINT-CHECKING"><?php echo Yii::t("strings", "POINT CHECKING")?></a></li>
	                <li><a href='./club_gifthis.html' index='12' data-title="REDEMPTION"><?php echo Yii::t("strings", "REDEMPTION")?></a></li>
                </ol>
            </li>
        </ul>
    </div>

    <div class="popup_overlay"></div>
    <div class="search_popup popup">
        <div class="popup_close"></div>
        <div class="search_form">
	        <input class="search_input" type="text" placeholder="<?php echo Yii::t("strings", "Please Enter Keyword")?>" />
	        <input class="search_btn" type="submit" value="<?php echo Yii::t("strings", "Search")?>" />
        </div>
    </div>

    <!--  -->
    <script type="text/javascript" src="js/lib/modernizr.min.js"></script>
    <script type="text/javascript" src="js/track.js"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AwxxvHue9bTdFietVWM4PLtk"></script>
    <script data-main="js/config" src="js/lib/require.js"></script>


    <!--  -->
    <!--IE6透明判断-->
    <!--[if IE 6]>
    <script src="js/lib/DD_belatedPNG.js"></script>
    <script>
    DD_belatedPNG.fix('*');
    document.execCommand("BackgroundImageCache", false, true);
</script>
    <![endif]-->
