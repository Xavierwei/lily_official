<form class="login" action="<?php echo Yii::app()->baseUrl?>/index/login" method="POST" enctype="multipart/form-data">
  <div class="field-group">
    <label for="">UserName: </label>
    <input type="text" name="user" placeholder="please input login name"/>
  </div>
  <div class="field-group">
    <label for="">Password</label>
    <input type="password" name="pass"  />
  </div>
  
  <div class="field-group">
    <input class="btn" type="submit" value="Login" />
  </div>
</form>