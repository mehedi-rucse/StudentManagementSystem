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
    $oldPhoto = base64_decode($_GET['photo']);

  if (isset($_POST['updatestudent'])) {
  	$name = $_POST['name'];
    $roll = $_POST['roll'];
    $name_father = $_POST['name_father'];
    $name_mother = $_POST['name_mother'];
    $number = $_POST['number'];
    $blood_group =$_POST['blood_group'];
    $session = $_POST['session'];
    $gender = $_POST['gender'];
    $emergency_number = $_POST['emergency_number'];
    $emergency_number_holder = $_POST['emergency_number_holder'];
    $date_of_birth = $_POST['date_of_birth'];
  	
  	
  	if (!empty($_FILES['photo']['name'])) {
  		 $photo = $_FILES['photo']['name'];
	  	 $photo = explode('.', $photo);
		 $photo = end($photo);
		 $photo = $roll.date('Y-m-d-m-s').'.'.$photo; 
		
  	}else{
  		$photo = $oldPhoto;
  	}
  	

  	$query = "UPDATE `about_me` SET`roll`='$roll', `name`='$name', `name_father`='$name_father', `name_mother`='$name_mother', `number`='$number', `blood_group`='$blood_group', `session`='$session', `gender`='$gender', `emergency_number`='$emergency_number', `emergency_number_holder`='$emergency_number_holder',`photo`='$photo', `date_of_birth`='$date_of_birth' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
		if (!empty($_FILES['photo']['name'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
			unlink('images/'.$oldPhoto);
		}	
  		header('Location: index.php?page=all-student&edit=success');
  	}else{
  		header('Location: index.php?page=all-student&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Student Informations!<small class="text-warning"> Edit Student!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">All Student </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Student</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT  `id`,`roll`, `name`, `name_father`, `name_mother`, `number`, `blood_group`, `session`, `gender`, `emergency_number`, `emergency_number_holder`,`photo`, `date_of_birth` FROM `about_me` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Student Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Student Roll</label>
		    <input name="roll" type="text" class="form-control" id="roll" value="<?php echo $row['roll']; ?>" required="">
	  	</div>
		<div class="form-group">
            <label for="name_father">Father Name</label>
            <input name="name_father" type="text" class="form-control" id="name_father" value="<?php echo $row['name_father']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="name_mother">Mother Name</label>
            <input name="name_mother" type="text" class="form-control" id="name_mother" value="<?php echo $row['name_mother']; ?>" required="">
        </div>
	  	
	  	<div class="form-group">
		    <label for="number">Contact No</label>
		    <input name="number" type="text" class="form-control" id="number" value="<?php echo $row['number']; ?>" pattern="01[5|6|7|8|9][0-9]{8}" placeholder="01........." required="">
	  	</div>

		<div class="form-group">
            <label for="blood_group">Blood Group</label>
            <input name="blood_group" type="text" class="form-control" id="blood_group" value="<?php echo $row['blood_group']; ?>"  required="">
        </div>
        <div class="form-group">
            <label for="session">Session</label>
            <input name="session" type="text" class="form-control" id="session" value="<?php echo $row['session']; ?>"  placeholder="year" required="">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input name="gender" type="text" class="form-control" id="gender" value="<?php echo $row['gender']; ?>"  placeholder="Male/Female/Other" required="">
        </div>
 
        <div class="form-group">
            <label for="emergency_number">Emergency Contact NO</label>
            <input name="emergency_number" type="text" class="form-control" id="emergency_number" pattern="01[5|6|7|8|9][0-9]{8}" value="<?php echo $row['emergency_number']; ?>" placeholder="01........." required="">
        </div>
        <div class="form-group">
            <label for="emergency_number_holder">Emergency Contact Relation </label>
            <input name="emergency_number_holder" type="text" class="form-control" id="emergency_number_holder"  value="<?php echo $row['emergency_number_holder']; ?>" required="">
        </div>
	  	
	  	<div class="form-group">
		    <label for="photo">Student Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo">
	  	</div>
		<div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input name="date_of_birth" type="text" class="form-control" id="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" placeholder="y/m/d" required="">
        </div>

	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Add Student" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>