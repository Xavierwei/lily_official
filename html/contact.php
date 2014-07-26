<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily 商务时装")?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='contact'>
<?php include_once "include/nav.php";?>
	<div id='wrap'>
        <!--  -->
        <div class="page page_contact">
            <!--  -->
            <div class="contact">
                <!--  -->
                <div class="contact_tit">
                    <h2><?php echo Yii::t("strings", "CONTACT")?></h2>
                </div>
                <!--  -->
                <div class="contact_con">
                    <?php if(Yii::app()->language == 'en_us'):?>
                        <h2>Shanghai Silk（GROUP）Brand Development Co., Ltd.</h2>
                        <div class="contact_fi cs-clear">
                            <span>Address</span>
                            <p>
                                17F, No. 1666, North Sichuan Road, Global New Times Plaza, <br/>
                                Hongkou District, 200080, <br/>
                                Shanghai, China
                            </p>
                        </div>
                        <br/>
                        <div class="contact_fi cs-clear">
                            <span>Tel</span>
                            <p>021-25108888</p>
                        </div>
                        <div class="contact_fi cs-clear">
                            <span>Fax</span>
                            <p>021-25108888</p>
                        </div>
                        <br/>
                        <div class="contact_fi cs-clear">
                            For Lily Overseas Franchise Business Info, Please Call +86-021-25108863 attn. Miss Liu.
                        </div>
                        <br/>
                        <div class="contact_fi cs-clear">
                            <span>Marketing</span>
                            <p>mk@lily.sh.cn</p>
                        </div>
                        <div class="contact_fi cs-clear">
                            <span>Member service</span>
                            <p>
                                vip@lily.sh.cn
                            </p>
                        </div>
                    <?php else:?>
                        <h2>上海丝绸集团品牌发展有限公司</h2>
                        <div class="contact_fi cs-clear">
                            <span>地址</span>
                            <p>
                                上海市虹口区四川北路1666号高宝新时代广场17楼
                            </p>
                        </div>
                        <br/>
                        <div class="contact_fi cs-clear">
                            <span>电话</span>
                            <p>021-25108888</p>
                        </div>
                        <div class="contact_fi cs-clear">
                            <span>传真</span>
                            <p>021-25108888</p>
                        </div>
                        <div class="contact_fi cs-clear">
                            <span>加盟招商</span>
                            <p>021-25108863，刘小姐</p>
                        </div>
                        <br/>
                        <div class="contact_fi cs-clear">
                            <span>品牌行销</span>
                            <p>mk@lily.sh.cn</p>
                        </div>
                        <div class="contact_fi cs-clear">
                            <span>会员服务</span>
                            <p>
                                vip@lily.sh.cn
                            </p>
                        </div>
                    <?php endif;?>
                </div>
                <!--  --> </div>

	        </div>

        <?php include_once "include/footer.php";?>
</body>
</html>
