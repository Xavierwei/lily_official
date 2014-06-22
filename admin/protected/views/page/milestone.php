<div class="table-content" ng-controller="MilestoneTable" ng-init="init()">
  <table class="table table-striped">
    <thead>
      <td><?php echo Yii::t("strings", "Title")?></td>
      <td><?php echo Yii::t("strings", "Body")?></td>
      <td><?php echo Yii::t("strings", "Date")?></td>
      <td><?php echo Yii::t("strings", "Actions")?></td>
    </thead>
    <tbody>
      <?php foreach($milestones as $milestone) :?>
      <tr>
        <td><?php echo $milestone->title?></td>
        <td><?php echo $milestone->body?></td>
        <td><?php echo $milestone->cdate?></td>
        <td>
          <a href="<?php echo Yii::app()->baseUrl."/page/addmilestone?id=". $milestone->cid?>">Edit</a>
          <a href="<?php echo Yii::app()->baseUrl."/page/addstreehot"?>">Delete</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>