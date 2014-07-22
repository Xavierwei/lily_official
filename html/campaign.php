<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily Official Site")?>
<?php set_page_name("product");?>
<?php $next_index = -1;?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='campaign lang_<?php global $language; echo $language;?>'>
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
	                    <div class="cp_season btn btnlink btnlink2 go_play_ground"><span>PERFECT BALANCE<br/>BETWEEN SERIOUSNESS AND JOY</span><span>PERFECT BALANCE<br/>BETWEEN SERIOUSNESS AND JOY</span></div>
	                    <div class="cp_season btn btnlink btnlink2 fadeout video"><span>2014 FALL FASHION LOOK VIDEO</span><span>2014 FALL FASHION LOOK VIDEO</span></div>
	                <?php else:?>
		                <div class="cp_season btn btnlink btnlink2 go_play_ground"><span>商务与时尚的完美平衡</span><span>商务与时尚的完美平衡</span></div>
		                <div class="cp_season btn btnlink btnlink2 fadeout video"><span>Lily 2014 秋季时尚大片</span><span>Lily 2014 秋季时尚大片</span></div>
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
		                <h2>PERFECT BALANCE BETWEEN SERIOUSNESS AND JOY</h2>
		                <p>Lily brand is perfectly well balanced between seriousness and joy. In this new campaign for the 2014 FW season collection, we are still exploring the “not too fashion, not too business” concept. To illustrate this concept, we depicted a beautiful software atmosphere made by power-point-style charts with a feminine and delightful color palette. A very stylish woman will evolve with elegance and enjoyment in this universe by entering meeting room, exposing a presentation, hosting interviews... The charts-pie will clearly identify her look trough this work moment as just right, always perfectly balanced. We enjoy a campaign very graphical & thoughtful at the same time. It brings the viewer on another perplexing exploration into the Lily brand, this time with the help of the ‘ it ' model Tilda Lindstam and shot by the very talented Julia Noni. </p>
	                <?php else:?>
		                <h2>商务与时尚的完美平衡</h2>
		                <p>在2014秋冬新一季广告中，Lily再次针对“正合适”的品牌理念，进行了别有趣致的深入探索。为阐明理念，我们运用了商务女性常用办公软件中、堪称标志性的表格元素，再加以跳跃明快的色彩，营造出极具艺术风格的摩登现代商务场合气氛。继而安排一位身着Lily商务时装的年轻女性，在这些充满抽象商务感的场景中自信穿梭，仿佛置身提案演讲、面试会谈等多个关键商务场合。在办公软件趣味风格的印衬下，她以时尚感与职业性兼具的商务着装，和大方得体、轻松自如的洒脱表现，清晰定义了Lily“正合适”的着装态度。本次视频拍摄，由极富才华的Julia Noni执导，新晋超模Tilda Lindstam加盟演绎。从视觉与创意角度，明确勾勒并精妙诠释了Lily的独特品牌气质。</p>
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
	                    <p>Lily girl has always been independent, confident, positive, and out-going. For this fall campaign, Lily creative team, with its fastidious taste, picked super model—Tilda Lindstam. Young Tilda has an oval visage and a pair of soft and gentle eyes. Within her affinity, there reveals a sense of androgynous. With unique style, she was considered the queen of the 2013 spring and summer Fashion Week. She has walked 68 shows, including Chloe, Miu Miu, Valentino, Calvin Klein, and other first well-known international brands. In her cooperation with Lily, Tilda thoroughly demonstrated her modeling ability with her clean make up and wonderfully played out the Lily girl charisma.</p>
	                <?php else:?>
		                <h2>模特介绍</h2>
		                <p>Lily女孩向来都有着自信独立、积极开朗的气质。本次秋季大片拍摄，Lily创意团队将挑剔的选角目光，投向了瑞典新晋超模Tilda Lindstam。年轻的Tilda拥有一张鹅卵石般的圆润脸庞，眼睛温柔剔透，亲和中透露着些许中性气魄。独具风格的她，可谓是2013春夏时装周的秀霸，共计走秀68场，包括Chloe， Miu Miu， Valentino， Calvin Klein等国际一线品牌。2014年，更荣升全球50强模特权威榜单第28位。在与Lily的合作中，Tilda尽展超模实力，配合纯净妆容与完美造型，将Lily女孩的魅力演绎得淋漓尽致。</p>
	                <?php endif;?>
                </div>
                <img class='left btn album' data-index="<?php $next_index += 1; echo $next_index;?>" data-album="4" src="pic/campaign/7.jpg" />
            </div>

            <div class="wrap cp-mo2">
                <img src="pic/campaign/25.jpg" />
                <a href="javascript:;" class="video fadeout cp_blacklink btnlink" data-video="video1"><span><?php echo Yii::t("strings", "FALL FASHION LOOK VIDEO")?></span><span><?php echo Yii::t("strings", "FALL FASHION LOOK VIDEO")?></span></a>
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
                <a href="javascript:;" class="video fadeout cp_blacklink btnlink" data-video="video2"><span><?php echo Yii::t("strings", "MAKING OF FALL")?></span><span><?php echo Yii::t("strings", "MAKING OF FALL")?></span></a>
            </div>


        </div>

	    <?php include_once "include/footer.php";?>
</body>
</html>
