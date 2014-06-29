<?php require_once 'include/functions.php';?>
<?php set_page_title("Lily Official Site")?>
<!DOCTYPE html>
<html>
<?php include_once 'include/header.php';?>

<body class='history'>
<?php include_once "include/nav.php";?>
    <div id='wrap'>
        <!--  -->
        <div class="page page_heritage">
            <!-- ha_mod -->


	        <?php $milestones = loadMilestone();?>
	        <?php
	            $i = 0;
	            foreach ($milestones as $milestone): ?>
		        <div class="ha_mod ha_modL cs-clear limit">
			        <div class="ha_modtxt <?php echo $i%2 == 0 ? 'left' : 'right'; ?>">
				        <h2><?php echo $milestone->attributes['title'];?></h2>
				        <div class="ha_modbody">
					        <?php echo $milestone->attributes['body'];?>
				        </div>
			        </div>
		        </div>

	        <?php
	            $i++;
	            endforeach;?>
        </div>
        <!--  -->

	    <?php include_once "include/footer.php";?>


</body>
</html>
