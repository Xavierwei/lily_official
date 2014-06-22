<div class="table-content" ng-controller="StreehotTable" ng-init="init()">
  <table class="table table-striped">
    <thead>
      <td><?php echo Yii::t("strings", "Title")?></td>
      <td><?php echo Yii::t("strings", "Date")?></td>
      <td><?php echo Yii::t("strings", "Actions")?></td>
    </thead>
    <tbody>
      <?php foreach($streehotes as $streehot) :?>
      <tr>
        <td><?php echo $streehot->title?></td>
        <td><?php echo $streehot->cdate?></td>
        <td>
          <a href="<?php echo Yii::app()->baseUrl."/page/addstreehot?id=". $streehot->cid?>">Edit</a>
          <a href="javascript:void(0)" data-cid="<?php echo $streehot->cid?>" ng-click="deleteContent()">Delete</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>