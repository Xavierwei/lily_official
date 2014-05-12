<div class="content">
    <?php $form=$this->beginWidget('CActiveForm',array(
        'id'=>'listForm',
        'action'=>array('/admin/advertisement/auditAll/'),
    ));?>
    <table class="contentTab listTab" width="100%">
        <tr>
            <td class="titleTd" colspan="11">广告管理</td>
        </tr>
        <?php
            if(Yii::app()->user->hasFlash('submit')){
                echo '<tr><td class="leftTd" colspan="13"><p class="submitInfo">'.Yii::app()->user->getFlash('submit').'</p></td></tr>';
            }
        ?>
        <tr>
            <th class="leftTd" width="20"><?php echo CHtml::checkBox('',false,array('class'=>'checkAll'))?></th>
            <th width="25"><?php echo $form->labelEx($model,'id'); ?></th>
            <th>图片</th>
            <th><?php echo $form->labelEx($model,'name'); ?></th>
            <th><?php echo $form->labelEx($model,'link'); ?></th>
            <th><?php echo $form->labelEx($model,'advertising_id'); ?></th>
            <th><?php echo $form->labelEx(Advertising::model(),'size'); ?></th>
            <th><?php echo $form->labelEx($model,'deadline'); ?></th>
            <th><?php echo $form->labelEx($model,'create_time'); ?></th>
            <th><?php echo $form->labelEx($model,'audit'); ?></th>
            <th>操作</th>
        </tr>
        <?php foreach($data as $key=>$item){ ?>
            <tr>
                <td class="leftTd"><?php echo CHtml::checkBox('id[]',false,array('value'=>$item->id))?></td>
                <td><?php echo $item->id;?></td>
                <td width="100"><?php echo $item->photo1!=''?CHtml::image(Yii::app()->baseUrl.$item->photo1,$item->name,array('height'=>'40px')):'';?></td>
                <td><?php echo CHtml::link($item->name,array('/admin/advertisement/edit/','id'=>$item->id)); ?></td>
                <td><?php echo $item->link!=''?CHtml::link($item->link,$item->link,array('target'=>'_blank')):$item->link;?></td>
                <td><?php echo isset($item->advertising->name)?$item->advertising->name:'';?></td>
                <td><?php echo isset($item->advertising->size)?$item->advertising->size:'';?></td>
                <td><?php echo $item->deadline;?></td>
                <td><?php echo date("Y-m-d",$item->create_time);?></td>
                <?php $audit = $item->audit==1?'<img src="'.yii::app()->baseUrl.'/style/admin/images/audit.gif">':'<img src="'.yii::app()->baseUrl.'/style/admin/images/unaudit.gif">';?>
                <td><?php echo CHtml::link($audit,array('/admin/advertisement/audit/','id'=>$item->id)); ?></td>
                <td><?php echo CHtml::link('<img src="'.yii::app()->baseUrl.'/style/admin/images/edit.gif">',array('/admin/advertisement/edit/','id'=>$item->id)); ?> <?php echo CHtml::link('<img src="'.yii::app()->baseUrl.'/style/admin/images/del.gif">',array('/admin/advertisement/delete/','id'=>$item->id),array('class'=>'delete','id'=>$item->id)); ?></td>
            </tr>
        <?php }?>
        <tr>
            <td class="pageTd" colspan="11">
                <div class="action">
                    <?php echo CHtml::submitButton('审核',array('class'=>'button'));?>
                    <?php echo CHtml::Button('未审核',array('class'=>'button','onclick'=>'formSubmit("'.$this->createUrl('/admin/advertisement/unAuditAll/').'","")'));?>
                    <?php echo CHtml::Button('删除',array('class'=>'button','onclick'=>'formSubmit("'.$this->createUrl('/admin/advertisement/deleteAll/').'","确定要删除吗？")'));?>
                </div>
                <?php    
                $this->widget('CLinkPager',array(    
                    'header'=>'',    
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '末页',
                    'prevPageLabel' => '上一页',
                    'nextPageLabel' => '下一页',
                    'pages' => $page,
                    'maxButtonCount'=>13
                    )    
                );?>
            </td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>