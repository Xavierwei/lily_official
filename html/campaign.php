<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily Office Site")?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='campaign'>
<?php include_once "include/nav.php";?>
	<div id='wrap'>
        <!--  -->
        <div class="page page_campaign">
            <div class='limit cp-top cs-clear'>
                <div class="cp_box right">
                    <div class="cp_tit">
                        <h2><?php echo Yii::t("strings", "CAM-<br />PAIGN")?></h2>
	                    <?php if(Yii::app()->language == 'en_us'):?>
	                        <p>FW/14</p>
	                        <p>featuring<br />Tilda Lindstam</p>
	                    <?php else:?>
		                    <p>14秋冬</p>
		                    <p>Lily 2014 年春季广告大片</p>
	                    <?php endif;?>
                    </div>
	                <?php if(Yii::app()->language == 'en_us'):?>
	                    <div class="cp_season btn go_play_ground">Wonderland of Plaid Shirts</div>
	                    <div class="cp_season btn fadeout video">Lily 2014 SS KV making off</div>
	                <?php else:?>
		                <div class="cp_season btn go_play_ground">格子间的奇幻乐园</div>
		                <div class="cp_season btn fadeout video">Lily 2014 年春季广告大片</div>
	                <?php endif;?>
                </div>
	            <div class="left">
		            <img class='btn album' data-album="4" src="pic/campaign/1.jpg" />
	            </div>
            </div>

            <div class="cs-clear limit">
                <div class="list">
                    <img class='right btn album' data-album="4" src="pic/campaign/4.jpg" />
                    <img class='right btn album' data-album="4" src="pic/campaign/3.jpg" />
                    <img class='right btn album' data-album="4" src="pic/campaign/2.jpg" />
                </div>
            </div>

            <div class="cs-clear limit cp-ground">
                <div class="cp_modtxt left" id="play_ground">
	                <?php if(Yii::app()->language == 'en_us'):?>
		                <h2>Office is my play ground</h2>
		                <p>Lily is a perfect fusion of serious and playful, Lily is the touch of colour in the grey, cold office daily life.</p>
		                <p>The 2014 SS season collection, is about a mix of playful and serious: flashy colours; floral printings; surrealistic printings with classic/ formal shapes...</p>
		                <p>We want to translate this serious /playful attitude by visuals, to show the attitude a young working girl could have in a serious working environment.</p>
		                <p>Our concept is "Office is my playground". To illustrate this concept, we enlarged daily office objects : clock, pen, typewriter, with a palette of rich spring/summer colours, to build a colourful surreal world. The Lily t girl, sitting or standing - playing easily with oversized fauna which represent the vivacity of the spring/summer.</p>
		                <p>For the season 2014 Spring/Summer campaign, we decide to collaborate with the world top 20 model Barbara Palvin and photographer John Wright.</p>
	                <?php else:?>
		                <h2>格子间的奇幻乐园</h2>
		                <p>LILY(Lily)2014春夏季的拍摄，仍然以“办公室是我的游乐园”作为主题概念不仅延续了超现实的办公空间感，而且融入了具有春夏季节性的超大版植物，粉的绿的交织变幻着，为办公室增添不少朝气蓬勃的轻松气息。为了让春季和夏季之间的风格更加鲜明，创意团队分别选用了不同的艺术元素呈现。对春季的拍摄更侧重于春日舒展的枝叶做为视觉称托，一片绿意盎然的活力基调将LILY春季新品烘托得更加焕然出彩。夏日盛开的繁花则顺理成章地成为了夏季的最标志性元素，新鲜活脱的自然色彩，千姿百态的花瓣弧度，无一不为LILY的夏装阐释着盛夏的热情力度。</p>
	                <?php endif;?>
                </div>
	            <div class="right">
		            <img class='btn album' data-album="4" src="pic/campaign/5.jpg" />
		        </div>
            </div>

            <div class="cs-clear limit cp-full">
                <img class='full btn album' data-album="4" src="pic/campaign/6.jpg" />
            </div>

            <div class="cs-clear limit cp-model">
                <div class="cp_modtxt right">
	                <?php if(Yii::app()->language == 'en_us'):?>
	                    <h2>Barbara Palvin</h2>
	                    <p>It is worth to mention that the design team fixes their eyes on Barbara Palvin, the new supermodel from Hungarian, to better show the grace and intelligence of LILY girls.  Through her beautiful face and inborn model nature, this young Hungarian girl has won friendly cooperation with many big international brands like Victoria’s Secret (even become the 2012 Victoria Secret Angel).  Barbara Palvin shows her jumping energy at Lily’s shooting scene. Wearing simple makeup and exquisite hairstyle, she exhibits the happy, lively and positive nature of LILY girls.</p>
	                <?php else:?>
		                <h2>Barbara Palvin</h2>
		                <p>非常值得一提的是，在这次的模特选角上，为了更好地体现LILY女孩大方、轻松的灵动气质，创意团队将聚光灯投放在全球新一代超模Barbara Palvin身上，这位来自匈牙利的年轻女孩凭借镜头最青眯的天使面孔，以及与生俱来的模特素质，已迅速取得如维多利亚的秘密（更成为2012维密天使）等多个国际级大牌的友好合作。Barbara Palvin在LILY的拍摄现场更是展现出一身的跳动活力，在简洁的妆容与精致的造型配合下，时刻绽放着LILY女孩特有的开朗、活力、积极气息。</p>
	                <?php endif;?>
                </div>
                <img class='left btn album' data-album="4" src="pic/campaign/7.jpg" />
            </div>

            <div class="limit cs-clear cp-full cp-mo1">
	            <div class="row1">
		            <div class="cp_blacktit"><?php echo Yii::t("strings", "MAKING OF")?></div>
		            <div class="cp_img cp_img_size1">
			            <img class="btn album" data-album="4" src="pic/campaign/8.jpg" />
		            </div>
	            </div>
				<div class="cs-clear"></div>
	            <div class="row2">
		            <div class="cp_img cp_img_size1">
			            <img class="btn album" data-album="4" src="pic/campaign/9.jpg" />
		            </div>
		            <div class="cp_img cp_img_size2">
			            <img class="btn album" data-album="4" src="pic/campaign/10.jpg" />
		            </div>
	            </div>
	            <div class="cs-clear"></div>
	            <div class="row3">
		            <div class="cp_img cp_img_size3">
			            <img class="btn album" data-album="4" src="pic/campaign/11.jpg" />
		            </div>
	            </div>
            </div>

            <div class="wrap cp-mo2">
                <img src="pic/campaign/12.jpg" />
                <a href="javascript:;" class="video fadeout cp_blacklink"><?php echo Yii::t("strings", "MAKING OF SPRING")?></a>
            </div>

	        <div class='limit cp-top cs-clear'>
		        <div class="left">
			        <img class='btn album' data-album="4" src="pic/campaign/13.jpg" />
		        </div>
	        </div>


            <div class="cs-clear limit">
                <div class="list">
                    <img class='right btn album' data-album="4" src="pic/campaign/16.jpg" />
                    <img class='right btn album' data-album="4" src="pic/campaign/15.jpg" />
                    <img class='right btn album' data-album="4" src="pic/campaign/14.jpg" />
                </div>
            </div>


	        <div class="cs-clear limit cp-ground">
		        <div class="right">
			        <img class='btn album' data-album="4" src="pic/campaign/17.jpg" />
		        </div>
	        </div>

            <div class="cs-clear limit cp-full">
                <img class='full btn album' data-album="4" src="pic/campaign/18.jpg" />
            </div>


	        <div class='limit cp-top cs-clear'>
		        <div class="left">
			        <img class='btn album' data-album="4" src="pic/campaign/19.jpg" />
		        </div>
	        </div>



	        <div class="limit cs-clear cp-full cp-mo3">
		        <div class="row1">
			        <div class="cp_blacktit"><?php echo Yii::t("strings", "MAKING OF")?></div>
			        <div class="cp_img cp_img_size2">
				        <img class="btn album" data-album="4" src="pic/campaign/20.jpg" />
			        </div>
		        </div>
		        <div class="cs-clear"></div>
		        <div class="row2">
			        <div class="cp_img cp_img_size3">
				        <img class="btn album" data-album="4" src="pic/campaign/21.jpg" />
			        </div>
		        </div>
		        <div class="cs-clear"></div>
		        <div class="row3">
			        <div class="cp_img cp_img_size1">
				        <img class="btn album" data-album="4" src="pic/campaign/22.jpg" />
			        </div>
		        </div>
		        <div class="cs-clear"></div>
		        <div class="row4">
			        <div class="cp_img cp_img_size1">
				        <img class="btn album" data-album="4" src="pic/campaign/23.jpg" />
			        </div>
		        </div>
	        </div>



            <div class="wrap cp-mo2">
                <img src="pic/campaign/24.jpg" />
                <a href="javascript:;" class="video fadeout cp_blacklink"><?php echo Yii::t("strings", "MAKING OF SUMMER")?></a>
            </div>
        </div>

	    <?php include_once "include/footer.php";?>
</body>
</html>
