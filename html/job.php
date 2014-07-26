<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily 商务时装")?>
<?php set_page_name("job");?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='history'>
<?php include_once "include/nav.php";?>
	<div id='wrap'>
        <!--  -->
        <div class="page page_job">
            <!--  -->
            <div class="job">
                <div class="job_tit">
                    <h2>JOB</h2>
                    <p>happy monday</p>
                    <h3 class="job_social"></h3>
                    <a href="http://lily.zhiye.com/Social" target="_blank" class="job_socialbtn"></a>
                    <h3 class="job_campus"></h3>
                </div>
                <?php $school_jobes = loadJob();?>
                <div class="job_list limit cs-clear">
                    <!--  -->
                    <?php foreach ($school_jobes as $index=>$school_job): ?>
                    <div class="job_item">
                        <div class="job_itemtit"> <strong><?php echo $index+1;?></strong>
                            <?php echo $school_job->title?> / <?php echo $school_job->job_people_number == 0 ? Yii::t("strings", "Limited"): $school_job->job_people_number?>
                        </div>
                        <div class="job_itemtxt">
                            <?php echo Yii::t("strings", "Job Requirements")?>:
                            <br />
                            <?php echo $school_job->body?>
                        </div>
                        <a href="http://lily.zhiye.com/Campus" target="_blank" class="job_itembtn btnlink"><span><?php echo Yii::t("strings", "APPLY")?></span><span><?php echo Yii::t("strings", "APPLY")?></span></a>
                    </div>
                    <?php endforeach;?>
                    <!--  --> </div>
            </div>
            <!--  -->
	    </div>
    <?php include_once "include/footer.php";?>
</body>
</html>
