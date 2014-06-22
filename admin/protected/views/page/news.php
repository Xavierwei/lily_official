<div class="table-content" ng-controller="NewsTable" ng-init="init()">
  <table class="table table-striped">
    <thead>
      <td><?php echo Yii::t("strings", "Title")?></td>
      <td><?php echo Yii::t("strings", "Date")?></td>
      <td><?php echo Yii::t("strings", "Actions")?></td>
    </thead>
    <tbody>
      <?php foreach($news_list as $news) :?>
      <tr>
        <td><?php echo $news->title?></td>
        <td><?php echo $news->cdate?></td>
        <td>
          <a href="<?php echo Yii::app()->baseUrl."/page/addnews?id=". $news->cid?>">Edit</a>
          <a href="javascript:void(0)" data-cid="<?php echo $news->cid?>" ng-click="deleteContent()">Delete</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>