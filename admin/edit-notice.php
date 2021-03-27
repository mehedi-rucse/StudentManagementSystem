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

  if (isset($_POST['updatenotice'])) {
    $department_code = $_POST['department_code'];
    $notice_year = $_POST['notice_year'];
    $notice_semester = $_POST['notice_semester'];
    $type_of_notice = $_POST['type_of_notice'];
    $title = $_POST['title'];
    $details =$_POST['details'];
    $due_date = $_POST['due_date'];
  	$query = "UPDATE `student_notice` SET`department_code`='$department_code', `notice_year`='$notice_year', `notice_semester`='$notice_semester', `type_of_notice`='$type_of_notice', `title`='$title', `details`='$details', `due_date`='$due_date' WHERE `student_notice_id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Notice Updated!</p>';
  		
  	}else{
  		$datainsert['inserterror'] = '<p style="color: red;">Notice cannot be Updated!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Notice Informations!<small class="text-warning"> Edit Notice!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-notice">All Notices </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Notice</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `student_notice_id`, `department_code`, `notice_year`, `notice_semester`, `type_of_notice`, `title`, `details`, `due_date` FROM `student_notice` WHERE `student_notice_id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">

<div class="col-sm-6">
    <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Notice Edit Alert</strong>
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
            <label for="department_code">Department Code</label>
            <input name="department_code" type="text" class="form-control" id="department_code" value="<?php echo $row['department_code']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="notice_year">Year</label>
            <input name="notice_year" type="text" value="<?php echo $row['notice_year']; ?>" class="form-control"  id="notice_year"  placeholder="Enter :1st/2nd/3rd/4th"  required="">
        </div>
        <div class="form-group">
            <label for="notice_semester">Semester</label>
            <input name="notice_semester" type="text" class="form-control" id="notice_semester" value="<?php echo $row['notice_semester']; ?>" placeholder="Enter :1st/2nd" required="">
        </div>
        <div class="form-group">
            <label for="type_of_notice">Type</label>
            <input name="type_of_notice" type="text" class="form-control" id="type_of_notice" value="<?php echo $row['type_of_notice']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="<?php echo $row['title']; ?>" required="">
        </div>
 
        <div class="form-group">
            <label for="details">Details</label>
            <input name="details" type="text" class="form-control" id="details" value="<?php echo $row['details']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="due_date">Action Date</label>
            <input name="due_date" type="text" class="form-control" id="due_date" value="<?php echo $row['due_date']; ?>" placeholder="y-m-d" required="">
        </div>
        
       
	  	<div class="form-group text-center">
		    <input name="updatenotice" value="Edit Notice" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>