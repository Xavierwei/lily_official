<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Language" content="zh-CN" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta content="telephone=no" name="format-detection" />
    <title>Lily</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="css/mediaelementplayer.css" />
    <link rel="stylesheet" type="text/css" href="css/response.css" />
</head>
<body class='storelocator'>
    <div class="header">
        <ul id='nav'>
            <li class='item'>
                <h2><span class="club">VIP CLUB</span></h2>
                <ol>
                    <li><a href='javascript:;' index='9'>LILY CLUB</a></li>
                    <li><a href='javascript:;' index='10'>TERMS</a></li>
                    <li><a href='javascript:;' index='11'>POINT CHECKING</a></li>
                    <li><a href='javascript:;' index='12'>REDEMPTION</a></li>
                </ol>
            </li>
            <li class='item'>
                <h2><a href='#index' title='index' index='1'>Home</a></h2>
            </li>
            <li class='item'>
                <h2>BRAND</h2>
                <ol>
                    <li><a href='#index' title='index' index='1'>BRAND STORY</a></li>
                    <li><a href='#milestone' title='milestone' index='2'>MILESTONE</a></li>
                    <li><a href='#news' title='news' index='3'>NEWS</a></li>
                </ol>
            </li>
            <li class='item'>
                <h2>PRODUCT</h2>
                <ol>
                    <li><a href='#campaign' title='campaign' index='4'>CAMPAIGN</a></li>
                    <li><a href='#lookbook' title="lookbook" index='5'>LOOKBOOK</a></li>
                    <li><a href='#streetshot' title="streetshot" index='6'>STREET SHOTS</a></li>
                </ol>
            </li>
            <li class='item'>
                <h2>SHOP</h2>
                <ol>
                    <li><a href='#starshop' title="starshop" index='7'>STAR SHOP</a></li>
                    <li><a href='#storelocator' title="storelocator" index='8'>STORE LOCATOR</a></li>
                </ol>
            </li>
        </ul>
        <a class='menu'></a>
        <div class="language">
            <a href="index" class="lang_en"></a>
            <a href="index_cn" class="lang_cn"></a>
        </div>
        <div class="search"></div>
    </div>

    <div id='wrap'>
        <!--  -->
        <div class="page page_storelocator">
            <div class="limit">
                <h2>STORE</h2>
                <div class="store_txt">CLOSE TO YOU</div>
                <div class="store_selbox" id='store-selectbox'>
                    <div class="store_select cs-clear" id='country'>
                        <a class="store_selectbg cs-clear" >
                            <span class="store_sl_txt">中国</span>
                            <span class="store_sl_icon"></span>
                        </a>
                        <select class="store_sl">
                            <option value="中国">中国</option>
                        </select>
                    </div>
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
                    <div class="store_select cs-clear" id='district'>
                        <a class="store_selectbg cs-clear" >
                            <span class="store_sl_txt">District</span>
                            <span class="store_sl_icon"></span>
                        </a>
                        <select class="store_sl"></select>
                    </div>
                </div>

                <button class='searchbtn'>Search</button>
            </div>

            <div id='map'></div>

            <div class="limit stores"></div>

        </div>

        <!--  -->
	    <div class="footer">
		    <div class="ft_logo"></div>

		    <div class="ft_com">
			    <div class="ft_list">
				    <h2>BRAND</h2>
				    <ol>
					    <li><a class='fadeout' href="#index">BRANDS STORY</a></li>
					    <li><a class='fadeout' href='#milestone'>MILESTONE</a></li>
					    <li><a class='fadeout' href='#news'>NEWS</a></li>
				    </ol>
			    </div>
			    <div class="ft_list">
				    <h2>PRODUCT</h2>
				    <ol>
					    <li><a class='fadeout' href="#campaign">CAMPAIGN</a></li>
					    <li><a class='fadeout' href="#lookbook">LOOKBOOK</a></li>
					    <li><a class='fadeout' href="#streetshot">STREET SHOTS</a></li>
				    </ol>
			    </div>
			    <div class="ft_list">
				    <h2>SHOP</h2>
				    <ol>
					    <li><a class='fadeout' href='#starshop'>STAR SHOP</a></li>
					    <li><a class='fadeout' href='#storelocator'>STORE LOCATOR</a></li>
				    </ol>
			    </div>
			    <div class="ft_list">
				    <h2>CLUB</h2>
				    <ol>
					    <li><a class='fadeout' href="javascript:;">LILY CLUB</a></li>
					    <li><a class='fadeout' href="javascript:;">TERMS</a></li>
					    <li><a class='fadeout' href="javascript:;">POINT CHECKING</a></li>
					    <li><a class='fadeout' href="javascript:;">REDEMPTION</a></li>
				    </ol>
			    </div>
			    <div class="ft_links">
				    <ol>
					    <li><a class='fadeout' href="#job">JOB</a></li>
					    <li><a class='fadeout' href="#contact">CONTACT</a></li>
					    <li><a class='fadeout' href="#privacy">PRIVACY</a></li>
				    </ol>
			    </div>
			    <div class="ft_touch">
				    <p>lets stay in touch</p>
				    <br />
				    <div class="ft_share cs-clear">
					    <a href="http://weibo.com/lilyofficial" target='_blank' class="ft_shareitem ft_share1"></a>
					    <a href="javascript:;" class="ft_shareitem ft_share3"></a>
				    </div>
				    <p>
					    HOTLINE
					    <br />
					    134-654-987
				    </p>
			    </div>
			    <div class="cs-clear"></div>
		    </div>

		    <div class="ft_copy">© 2013 LILY OFFICAIL WEBSITE 沪ICP备10202509号-2</div>
	    </div>
    </div>

    <!-- showy -->
    <div class="showy">
        <div class="showyitem showyitem1" data-0='bottom: 20%;' data-1200="bottom:120%;"></div>
        <div class="showyitem showyitem2" data-0='bottom: -20%;' data-3200="bottom:120%;"></div>
        <div class="showyitem showyitem3" data-0='bottom: -20%;' data-5000="bottom:120%;"></div>
        <div class="showyitem showyitem4" data-0='bottom: -20%;' data-900-end="bottom:60%;"></div>
        <div class="showyitem showyitem5" data-0='bottom: -20%;' data-1300-end="bottom:5%;" data-900-end="bottom:20%;" data-500-end="bottom:35%;"></div>
    </div>

    <span class='loading top'></span>
    <span class='loading left'></span>
    <span class='loading bottom'></span>
    <span class='loading right'></span>

    <!-- mobile menu -->
    <div class='mbmenu'>
        <ul>
            <li class='item'>
                <h2>BRAND</h2>
                <ol>
                    <li><a href='#index'>BRAND STORY</a></li>
                    <li><a href='#milestone'>MILESTONE</a></li>
                    <li><a href='#news'>NEWS</a></li>
                </ol>
            </li>
            <li class='item'>
                <h2>PRODUCT</h2>
                <ol>
                    <li><a href='#campaign'>CAMPAIGN</a></li>
                    <li><a href='#lookbook'>LOOKBOOK</a></li>
                    <li><a href='#streetshot'>STREET SHOTS</a></li>
                </ol>
            </li>
            <li class='item'>
                <h2>SHOP</h2>
                <ol>
                    <li><a href='#starshop'>STAR SHOP</a></li>
                    <li><a href='#storelocator'>STORE LOCATOR</a></li>
                </ol>
            </li>
            <li class='item'>
                <h2>CLUB</h2>
                <ol>
                    <li><a href='javascript:;'>LILY CLUB</a></li>
                    <li><a href='javascript:;'>TERMS</a></li>
                    <li><a href='javascript:;'>POINT CHECKING</a></li>
                    <li><a href='javascript:;'>REDEMPTION</a></li>
                </ol>
            </li>
        </ul>
    </div>
    <!--  -->
    <script type="text/javascript" src="js/lib/modernizr.min.js"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=AwxxvHue9bTdFietVWM4PLtk"></script>
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
</body>
</html>