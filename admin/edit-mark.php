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
    

  if (isset($_POST['updatemark'])) {
    $result_id = $_POST['result_id'];
    $course_id = $_POST['course_id'];
    $cgpa = $_POST['cgpa'];
    $tried = $_POST['tried'];
    
    
  	

  	$query = "UPDATE `course_wise_result` SET `result_id` = '$result_id' ,`course_id` = '$course_id' , `cgpa` = '$cgpa', `tried` = '$tried' WHERE `course_result_id`=$id";
     
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Mark Updated!</p>';
  		
  	}else{
  		$datainsert['inserterror'] = '<p style="color: red;">Mark cannot be Updated!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Mark Informations!<small class="text-warning"> Edit Mark!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-mark">All Marks </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Mark</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `result_id`,`course_id`, `cgpa`, `tried` FROM `course_wise_result` WHERE `course_result_id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">

<div class="col-sm-6">
    <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Mark Edit Alert</strong>
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
            <label for="result_id">Result ID</label>
            <input name="result_id" type="text" class="form-control" id="result_id" value="<?php echo $row['result_id']; ?>" placeholder="Enter result id" required="">
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input name="course_id" type="text" value="<?php echo $row['course_id']; ?>" placeholder="Enter course id" class="form-control"  id="course_id"  required="">
        </div>
        <div class="form-group">
            <label for="cgpa">CGPA</label>
            <input name="cgpa" type="text" class="form-control" id="cgpa" value="<?php echo $row['cgpa']; ?>" placeholder="Enter cgpa" required="">
        </div>
		
        <div class="form-group">
            <label for="tried">Tried</label>
            <input name="tried" type="text" class="form-control" id="tried" value="<?php echo $row['tried']; ?>" placeholder="0/1/2.." required="">
        </div>

       


	  	<div class="form-group text-center">
		    <input name="updatemark" value="Edit Mark" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>