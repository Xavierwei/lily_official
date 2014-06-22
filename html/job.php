<?php require_once 'include/functions.php';?>
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
                    <a href="javascript:;" class="job_socialbtn"></a>
                    <h3 class="job_campus"></h3>
                </div>
                <?php $school_jobes = loadJob();?>
                <div class="job_list limit cs-clear">
                    <!--  -->
                    <?php foreach ($school_jobes as $school_job): ?>
                    <div class="job_item">
                        <div class="job_itemtit"> <strong>01</strong>
                            <?php echo $school_job->title?> / <?php echo $school_job->job_people_number == 0 ? Yii::t("strings", "Limited"): $school_job->job_people_number?>
                        </div>
                        <div class="job_itemtxt">
                            <?php echo Yii::t("strings", "Requirements")?>：
                            <br />
                            <?php echo $school_job->body?>
                        </div>
                        <a href="javascript:;" class="job_itembtn">APPLY</a>
                    </div>
                    <?php endforeach;?>
                    <!--  --> </div>
            </div>
            <!--  -->
	    </div>
    <?php include_once "include/footer.php";?>
</body>
</html>
