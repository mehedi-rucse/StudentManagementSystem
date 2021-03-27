
<?php 

if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);
	$photo = base64_decode($_GET['photo']);
	if(mysqli_query($db_con,"DELETE FROM `about_me` WHERE `about_me_id` = '$id'")){
		unlink('images/'.$photo);
		$datadelete['deletesucess'] = '<p style="color: green;">Student Deleted!</p>';
	}else{
		$datadelete['deleteerror'] = '<p style="color: red;">Student cannot be deleted!</p>';
	}
    }else{
	header('Location: login.php');
 }
 ?>
 <div class="row">
    
<div class="col-sm-6">
    <?php if (isset($datadelete)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Student Delete Alert</strong>
        <small><?php echo date('d-M-Y'); ?></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        <?php 
            if (isset($datadelete['deletesucess'])) {
                echo $datadelete['deletesucess'];
            }
            if (isset($datadelete['deleteerror'])) {
                echo $$datadelete['deleteerror'];
            }
        ?>
      </div>
    </div>
    <?php } ?>