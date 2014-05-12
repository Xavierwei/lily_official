<div class="headContent">
	<div class="headInner">
		<div class="headLogo"><img src="<?php echo yii::app()->baseUrl;?>/style/admin/images/headLogo.png" alt="VCMS"></div>
		<ul class="nav">
			<?php foreach(Yii::app()->params['menu'] as $key=>$item){
                $current = $key==0? 'class="current"':''; 
				echo $item[0]['audit']==1?'<li '.$current.' com="'.$item[0]['com'].'" rel="'.Yii::app()->createUrl('admin/'.$item[0]['com']).'">'.$item[0]['name'].'</li>':'';
			}?>
		</ul>
		<div class="sessionInfo"><img src="<?php echo yii::app()->baseUrl;?>/style/admin/images/master.png">欢迎您&nbsp;<?php echo Yii::app()->user->name;?>&nbsp;<?php echo CHtml::link('退出','',array('class'=>'logout','rel'=>Yii::app()->createUrl('admin/manage/logout'))); ?></div>
	</div>
</div>