<?php 
session_start();
if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);
	if(mysqli_query($db_con,"DELETE FROM `department_info` WHERE `department_info_id` = '$id'")){
			$datadelete['deletesucess'] = '<p style="color: green;">Department Deleted!</p>';
	}else{
		$datadelete['deleteerror'] = '<p style="color: red;">Department cannot be deleted!</p>';
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
        <strong class="mr-auto">Department Delete Alert</strong>
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