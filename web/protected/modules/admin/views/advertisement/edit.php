<div class="content">
    <?php $form=$this->beginWidget('CActiveForm',array(
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        'focus'=>array($model,'title'),
    ));?>
    <table class="contentTab" width="100%">
        <tr>
            <td class="titleTd" colspan="2">友情链接</td>
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
            <td class="leftTd" width="100"><?php echo $form->labelEx($model,'link'); ?></td>
            <td>
                <?php echo $form->textField($model,'link',array('value'=>$model->link,'class'=>'commonText'));?>
                <?php echo $form->error($model,'link'); ?>
            </td>
        </tr>
        <tr>
            <td class="leftTd"><?php echo $form->labelEx($model,'advertising_id'); ?></td>
            <td>
                <?php echo $form->dropDownList($model,'advertising_id',Advertising::model()->getAdvertisingList('0','请选择'),array('class'=>'select')); ?>
                <?php echo $form->error($model,'advertising_id'); ?>
            </td>
        </tr>
        <tr>
            <td class="leftTd"><?php echo $form->labelEx($model,'photo1'); ?></td>
            <td>
                <?php echo CHtml::Button('上传图片',array('id'=>'uploadButton1','class'=>'uploadButton'));?>
                <?php echo CHtml::activeHiddenField($model,'photo1',array('value'=>$model->photo1,'id'=>'photo1'));?>
                <?php echo $form->error($model,'photo1'); ?>

                <?php
                    $this->widget('ext.kindeditor.KindUploadWidget',array(
                        'id'=>'uploadButton1',
                        'dir'=>'image/advertisement',
                        'preview'=>'photoPreview1',
                        'delete'=>'photoDelete1',
                        'callback_url'=>Yii::app()->createUrl('/admin/advertisement/photoSave'),

                        'parameters'=>array(
                            'id'=>$model->id,
                            'name'=>'photo1',
                        )
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td class="leftTd">预览1</td>
            <td>
                <?php echo CHtml::image($model->photo1!=''?yii::app()->baseUrl.$model->photo1:yii::app()->baseUrl.'/style/admin/images/noPhoto.png',$model->name,array('id'=>'photoPreview1','class'=>'photoPreview','height'=>'50px'));?>
                <?php echo CHtml::ajaxLink(
                    '删除', 
                    array('/admin/advertisement/photoDelete'),
                    array(
                        'data'=>array('id'=>$model->id,'name'=>'photo1','photo_url'=>'js:$("#photo1").val()','YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                        'type'=>"post",
                        'success' => 'js:function(data){
                            $("#photoDelete1").hide();
                            $("#photoPreview1").attr("src","'.yii::app()->baseUrl.'/style/admin/images/noPhoto.png");
                            $("#photo1").val("");
                        }'
                    ),
                    array('id'=>'photoDelete1','class'=>'photoDelete','style'=>$model->photo1!=''?'':'display:none')
                )
                ?>
            </td>
        </tr>
        <tr>
            <td class="leftTd" width="100"><?php echo $form->labelEx($model,'code'); ?></td>
            <td>
                <?php echo CHtml::activeTextArea($model,'code',array('value'=>$model->code,'class'=>'textArea'));?>
                <?php echo $form->error($model,'code'); ?>
            </td>
        </tr>
        <tr>
            <td class="leftTd" width="100"><?php echo $form->labelEx($model,'deadline'); ?></td>
            <td>
                <?php echo $form->textField($model,'deadline',array('value'=>$model->deadline,'class'=>'commonText'));?>
                <?php echo $form->error($model,'deadline'); ?>
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