<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
    

  if (isset($_POST['updatehall'])) {
    $hall_code = $_POST['hall_code'];
    $hall_name = $_POST['hall_name'];
    
  	

  	$query = "UPDATE `hall_info` SET`hall_code`='$hall_code', `hall_name`='$hall_name' WHERE `hall_information_id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Hall Updated!</p>';
  		
  	}else{
  		$datainsert['inserterror'] = '<p style="color: red;">Hall cannot be Updated!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Hall Informations!<small class="text-warning"> Edit Hall!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-hall">All Halls </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Hall</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `hall_information_id`, `hall_code`, `hall_name` FROM `hall_info` WHERE `hall_information_id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">

<div class="col-sm-6">
    <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Hall Edit Alert</strong>
        <small><?php echo date('d-M-Y'); ?></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        <?php 
            if (isset($datainsert['insertsucess'])) {
                echo $datainsert['insertsucess'];
            }
            if (isset($datainsert['inserterror'])) {
                echo $datainsert['inserterror'];
            }
        ?>
      </div>
    </div>
    <?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
        <div class="form-group">
            <label for="hall_name">Hall Name</label>
            <input name="hall_name" type="text" class="form-control" id="hall_name" value="<?php echo $row['hall_name']; ?>" required="">
        </div>
		
        <div class="form-group">
            <label for="hall_code">Hall Code</label>
            <input name="hall_code" type="text" class="form-control" id="hall_code" value="<?php echo $row['hall_code']; ?>" required="">
        </div>
       
	  	<div class="form-group text-center">
		    <input name="updatehall" value="Edit Hall" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>