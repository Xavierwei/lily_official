<div class="table-content" ng-controller="CententTable" ng-init="init()">
  <table class="table table-striped">
    <thead>
      <td><?php echo Yii::t("strings", "Title")?></td>
      <td><?php echo Yii::t("strings", "Season")?></td>
      <td><?php echo Yii::t("strings", "Date")?></td>
      <td><?php echo Yii::t("strings", "Actions")?></td>
    </thead>
    <tbody>
      <?php foreach($lookbookGalleries as $lookbookGallery) :?>
      <tr>
        <td><?php echo $lookbookGallery->title?></td>
        <td><?php echo $lookbookGallery->season?></td>
        <td><?php echo $lookbookGallery->cdate?></td>
        <td>
          <a href="<?php echo Yii::app()->baseUrl."/page/addlookbookgallery?id=". $lookbookGallery->cid?>">Edit</a> |
          <a href="<?php echo Yii::app()->baseUrl."/page/lookbook?gallery=". $lookbookGallery->cid?>">Book Item</a> |
          <a href="javascript:void(0)" data-cid="<?php echo $lookbookGallery->cid?>" >Delete</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>