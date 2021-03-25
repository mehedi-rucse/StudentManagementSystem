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
    

  if (isset($_POST['updatecourse'])) {
    $course_code = $_POST['course_code'];
    $credits = $_POST['credits'];
    $course_title = $_POST['course_title'];
    $marks = $_POST['marks'];
  	

  	$query = "UPDATE `course_information` SET`course_code`='$course_code', `credits`='$credits', `course_title`='$course_title', `marks`='$marks' WHERE `course_id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Course Updated!</p>';
  		header('Location: index.php?page=all-course&edit=success');
  	}else{
  		header('Location: index.php?page=all-course&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Course Informations!<small class="text-warning"> Edit Course!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-course">All Courses </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Course</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT  `course_id`, `course_code`, `credits`, `course_title`, `marks` FROM `course_information` WHERE `course_id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		
        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input name="course_code" type="text" class="form-control" id="course_code" value="<?php echo $row['course_code']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="credits">Credits</label>
            <input name="credits" type="text" value="<?php echo $row['credits']; ?>" class="form-control"  id="credits" required="">
        </div>
        <div class="form-group">
            <label for="course_title">Course Title</label>
            <input name="course_title" type="text" class="form-control" id="course_title" value="<?php echo $row['course_title']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="marks">Marks</label>
            <input name="marks" type="text" class="form-control" id="marks" value="<?php echo $row['marks']; ?>" required="">
        </div>

	  	<div class="form-group text-center">
		    <input name="updatecourse" value="Edit Course" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>