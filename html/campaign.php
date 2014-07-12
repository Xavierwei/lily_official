<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily Official Site")?>
<?php set_page_name("product");?>
<?php $next_index = -1;?>
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
	                        <p>FALL/14</p>
	                        <p>featuring<br />Tilda Lindstam</p>
	                    <?php else:?>
		                    <p>14秋季</p>
		                    <p>Lily 2014 年秋季广告大片</p>
	                    <?php endif;?>
                    </div>
	                <?php if(Yii::app()->language == 'en_us'):?>
	                    <div class="cp_season btn btnlink btnlink2 go_play_ground"><span>Wonderland of Plaid Shirts</span><span>Wonderland of Plaid Shirts</span></div>
	                    <div class="cp_season btn btnlink btnlink2 fadeout video"><span>Lily 2014 SS KV making off</span><span>Lily 2014 SS KV making off</span></div>
	                <?php else:?>
		                <div class="cp_season btn btnlink btnlink2 go_play_ground"><span>格子间的奇幻乐园</span><span>格子间的奇幻乐园</span></div>
		                <div class="cp_season btn btnlink btnlink2 fadeout video"><span>Lily 2014 年秋季广告大片</span><span>Lily 2014 年秋季广告大片</span></div>
	                <?php endif;?>
                </div>
	            <div class="left">
		            <img class='btn album' data-album="4" data-index="<?php $next_index += 1; echo $next_index;?>" src="pic/campaign/1.jpg" />
	            </div>
            </div>

            <div class="cs-clear limit">
                <div class="list">
                    <img class='right btn album' data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/4.jpg" />
                    <img class='right btn album' data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/3.jpg" />
                    <img class='right btn album' data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/2.jpg" />
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
		                <p>LILY2014秋季的拍摄，仍然以“办公室是我的游乐园”作为主题概念不仅延续了超现实的办公空间感，而且融入了具有春夏季节性的超大版植物，粉的绿的交织变幻着，为办公室增添不少朝气蓬勃的轻松气息。为了让春季和夏季之间的风格更加鲜明，创意团队分别选用了不同的艺术元素呈现。对春季的拍摄更侧重于春日舒展的枝叶做为视觉称托，一片绿意盎然的活力基调将LILY春季新品烘托得更加焕然出彩。夏日盛开的繁花则顺理成章地成为了夏季的最标志性元素，新鲜活脱的自然色彩，千姿百态的花瓣弧度，无一不为LILY的夏装阐释着盛夏的热情力度。</p>
	                <?php endif;?>
                </div>
	            <div class="right">
		            <img class='btn album' data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/5.jpg" />
		        </div>
            </div>

            <div class="cs-clear limit cp-full">
                <img class='full btn album' data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/6.jpg" />
            </div>

            <div class="cs-clear limit cp-model">
                <div class="cp_modtxt right">
	                <?php if(Yii::app()->language == 'en_us'):?>
	                    <h2>Tilda Lindstam</h2>
	                    <p>It is worth to mention that the design team fixes their eyes on Barbara Palvin, the new supermodel from Hungarian, to better show the grace and intelligence of LILY girls.  Through her beautiful face and inborn model nature, this young Hungarian girl has won friendly cooperation with many big international brands like Victoria’s Secret (even become the 2012 Victoria Secret Angel).  Barbara Palvin shows her jumping energy at Lily’s shooting scene. Wearing simple makeup and exquisite hairstyle, she exhibits the happy, lively and positive nature of LILY girls.</p>
	                <?php else:?>
		                <h2>Tilda Lindstam</h2>
		                <p>Lily女孩向来都有着自信独立、积极开朗的气质。本次秋季大片拍摄，Lily创意团队将挑剔的选角目光，投向了瑞典新晋超模Tilda Lindstam。年轻的Tilda拥有一张鹅卵石般的圆润脸庞，眼睛温柔剔透，亲和中透露着些许中性气魄。独具风格的她，可谓是2013春夏时装周的秀霸，共计走秀68场，包括Chloe， Miu Miu， Valentino， Calvin Klein等国际一线品牌。2014年，更荣升全球50强模特权威榜单第28位。在与Lily的合作中，Tilda尽展超模实力，配合纯净妆容与完美造型，将Lily女孩的魅力演绎得淋漓尽致。</p>
	                <?php endif;?>
                </div>
                <img class='left btn album' data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/7.jpg" />
            </div>

            <div class="limit cs-clear cp-full cp-mo1">
	            <div class="row1">
		            <div class="cp_blacktit"><?php echo Yii::t("strings", "MAKING OF")?></div>
		            <div class="cp_img cp_img_size1">
			            <img class="btn album" data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/8.jpg" />
		            </div>
	            </div>
				<div class="cs-clear"></div>
	            <div class="row2">
		            <div class="cp_img cp_img_size1">
			            <img class="btn album" data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/9.jpg" />
		            </div>
		            <div class="cp_img cp_img_size2">
			            <img class="btn album" data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/10.jpg" />
		            </div>
	            </div>
	            <div class="cs-clear"></div>
	            <div class="row3">
		            <div class="cp_img cp_img_size3">
			            <img class="btn album" data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/11.jpg" />
		            </div>
	            </div>
            </div>

            <div class="wrap cp-mo2">
                <img src="pic/campaign/12.jpg" />
                <a href="javascript:;" class="video fadeout cp_blacklink btnlink"><span><?php echo Yii::t("strings", "MAKING OF FALL")?></span><span><?php echo Yii::t("strings", "MAKING OF FALL")?></span></a>
            </div>


        </div>

	    <?php include_once "include/footer.php";?>
</body>
</html>
