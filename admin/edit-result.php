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
    

  if (isset($_POST['updateresult'])) {
    $about_me_id = $_POST['about_me_id'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    

  	$query = "UPDATE `result` SET `about_me_id` = '$about_me_id' ,`year` = '$year' , `semester` = '$semester' WHERE `result_id`=$id";
     
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Result Updated!</p>';
  		
  	}else{
  		$datainsert['inserterror'] = '<p style="color: red;">Result cannot be Updated!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Result Informations!<small class="text-warning"> Edit Result!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-result">All Results </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Result</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT  `about_me_id`,`year`,`semester` FROM `result` WHERE `result_id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">

<div class="col-sm-6">
    <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Result Edit Alert</strong>
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
            <label for="about_me_id">Student ID</label>
            <input name="about_me_id" type="text" class="form-control" id="about_me_id" value="<?php echo $row['about_me_id']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input name="year" type="text" class="form-control" id="year" value="<?php echo $row['year']; ?>" placeholder="1st/2nd/3rd/4th" required="">
        </div>
		
        <div class="form-group">
            <label for="semester">Semester</label>
            <input name="semester" type="text" class="form-control" id="semester" value="<?php echo $row['semester']; ?>" placeholder="1st/2nd" required="">
        </div>

	  	<div class="form-group text-center">
		    <input name="updateresult" value="Edit Result" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>