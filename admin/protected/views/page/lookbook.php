<div class="table-content" ng-controller="LookbookTable" ng-init="init()">
  <table class="table table-striped">
    <thead>
      <td><?php echo Yii::t("strings", "Title")?></td>
      <td><?php echo Yii::t("strings", "Date")?></td>
      <td><?php echo Yii::t("strings", "Actions")?></td>
    </thead>
    <tbody>
      <?php foreach($lookbookes as $lookbook) :?>
      <tr>
        <td><?php echo $lookbook->title?></td>
        <td><?php echo $lookbook->cdate?></td>
        <td>
          <a href="<?php echo Yii::app()->baseUrl."/page/addlookbook?id=". $lookbook->cid?>">Edit</a>
          <a href="javascript:void(0)" data-cid="<?php echo $lookbook->cid?>" >Delete</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>