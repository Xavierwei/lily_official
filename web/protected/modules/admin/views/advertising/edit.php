<div class="content">
	<?php $form=$this->beginWidget('CActiveForm',array(
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		'focus'=>array($model,'title'),
	));?>
	<table class="contentTab" width="100%">
		<tr>
			<td class="titleTd" colspan="2">广告位</td>
		</tr>
		<tr>
			<td class="leftTd" width="100">&nbsp;</td>
			<td>
				<?php
				if(Yii::app()->user->hasFlash('submit')){
					echo '<p class="submitInfo">'.Yii::app()->user->getFlash('submit').'</p>';
				}else{
					echo'<p class="note">带<span class="required">*</span>为必填项</p>';
				}
				?>
				<?php echo CHtml::errorSummary($model); ?>
			</td>
		</tr>
		<tr>
			<td class="leftTd" width="100"><?php echo $form->labelEx($model,'name'); ?></td>
			<td>
				<?php echo $form->textField($model,'name',array('value'=>$model->name,'class'=>'commonText'));?>
				<?php echo $form->error($model,'name'); ?>
			</td>
		</tr>
		<tr>
			<td class="leftTd" width="100"><?php echo $form->labelEx($model,'size'); ?></td>
			<td>
				<?php echo $form->textField($model,'size',array('value'=>$model->size,'class'=>'commonText'));?>
				<?php echo $form->error($model,'size'); ?>
			</td>
		</tr>
		<tr>
			<td class="leftTd"><?php echo $form->labelEx($model,'description'); ?></td>
			<td>
				<?php echo CHtml::activeTextArea($model,'description',array('value'=>$model->description,'class'=>'textArea'));?>
				<?php echo $form->error($model,'description'); ?>
			</td>
		</tr>
		<tr>
			<td class="leftTd" width="100"><?php echo $form->labelEx($model,'audit'); ?></td>
			<td>
				<?php echo $form->radioButtonList($model,'audit',array(0=>'未审核',1=>'已审核'),array('separator'=>'&nbsp;&nbsp;'));?>
				<?php echo $form->error($model,'audit'); ?>
			</td>
		</tr>
		<tr>
			<td class="pageTd" colspan="2"><?php echo CHtml::submitButton($model->isNewRecord ? '添加':'保存',array('class'=>'button'));?></td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>