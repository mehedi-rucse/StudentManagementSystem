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
    

  if (isset($_POST['updatedepartment'])) {
    $department_code = $_POST['department_code'];
    $department_name = $_POST['department_name'];
    $department_building = $_POST['department_building'];
  	

  	$query = "UPDATE `department_info` SET`department_code`='$department_code', `department_name`='$department_name',`department_building`='$department_building' WHERE `department_info_id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Department Updated!</p>';
  		
  	}else{
  		$datainsert['inserterror'] = '<p style="color: red;">Department cannot be Updated!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Department Informations!<small class="text-warning"> Edit Department!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-department">All Departments </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Department</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `department_info_id`, `department_code`, `department_name`, `department_building` FROM `department_info` WHERE `department_info_id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
    
<div class="col-sm-6">
    <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Department Edit Alert</strong>
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
            <label for="department_name">Department Name</label>
            <input name="department_name" type="text" class="form-control" id="department_name" value="<?php echo $row['department_name']; ?>" required="">
        </div>
		
        <div class="form-group">
            <label for="department_code">Department Code</label>
            <input name="department_code" type="text" class="form-control" id="department_code" value="<?php echo $row['department_code']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="department_building">Department Building </label>
            <input name="department_building" type="text" class="form-control" id="department_building" value="<?php echo $row['department_building']; ?>" required="">
        </div>
        

	  	<div class="form-group text-center">
		    <input name="updatedepartment" value="Edit Department" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>