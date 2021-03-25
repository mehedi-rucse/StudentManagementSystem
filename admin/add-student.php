<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
 
  if (isset($_POST['addstudent'])) {
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
    $photo = explode('.', $_FILES['photo']['name']);
  	$photo = end($photo); 
  	$photo = $roll.date('Y-m-d-m-s').'.'.$photo;
    $date_of_birth = $_POST['date_of_birth'];
    
 
    $query = "INSERT INTO `about_me` ( `id`,`roll`, `name`, `name_father`, `name_mother`, `number`, `blood_group`, `session`, `gender`, `emergency_number`, `emergency_number_holder`,`photo`, `date_of_birth`) 
              VALUES (NULL,'$roll','$name','$name_father','$name_mother', '$number','$blood_group','$session','$gender','$emergency_number','$emergency_number_holder', '$photo','$date_of_birth');";
 
    if (mysqli_query($db_con,$query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Student Inserted!</p>';
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
    }else{
        $datainsert['inserterror']= '<p style="color: red;">Student Not Inserted, please input right informations!</p>';
    }
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Student<small class="text-warning"> Add New Student!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Student</li>
  </ol>
</nav>
 
<div class="row">
    
<div class="col-sm-6">
        <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Student Insert Alert</strong>
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
            <label for="name">Student Name</label>
            <input name="name" type="text" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="roll">Student Roll</label>
            <input name="roll" type="text" value="<?= isset($roll)? $roll: '' ; ?>" class="form-control"  id="roll" required="">
        </div>
        <div class="form-group">
            <label for="name_father">Father Name</label>
            <input name="name_father" type="text" class="form-control" id="name_father" value="<?= isset($name_father)? $name_father: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="name_mother">Mother Name</label>
            <input name="name_mother" type="text" class="form-control" id="name_mother" value="<?= isset($name_mother)? $name_mother: '' ; ?>" required="">
        </div>
      
        <div class="form-group">
            <label for="number">Contact NO</label>
            <input name="number" type="text" class="form-control" id="number" pattern="01[5|6|7|8|9][0-9]{8}" value="<?= isset($number)? $number: '' ; ?>" placeholder="01........." required="">
        </div>
 
        <div class="form-group">
            <label for="blood_group">Blood Group</label>
            <input name="blood_group" type="text" class="form-control" id="blood_group" value="<?= isset($blood_group)? $blood_group: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="session">Session</label>
            <input name="session" type="text" class="form-control" id="session" value="<?= isset($session)? $session: '' ; ?>" placeholder="year" required="">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input name="gender" type="text" class="form-control" id="gender" value="<?= isset($gender)? $gender: '' ; ?>" placeholder="Male/Female/Other" required="">
        </div>
 
 
        <div class="form-group">
            <label for="emergency_number">Emergency Contact NO</label>
            <input name="emergency_number" type="text" class="form-control" id="emergency_number" pattern="01[5|6|7|8|9][0-9]{8}" value="<?= isset($emergency_number)? $emergency_number: '' ; ?>" placeholder="01........." required="">
        </div>
        <div class="form-group">
            <label for="emergency_number_holder">Emergency Contact Relation </label>
            <input name="emergency_number_holder" type="text" class="form-control" id="emergency_number_holder"  value="<?= isset($emergency_number_holder)? $emergency_number_holder: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="photo">Student Photo</label>
            <input name="photo" type="file" class="form-control" id="photo" required="">
        </div>
        
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input name="date_of_birth" type="text" class="form-control" id="date_of_birth"  value="<?= isset($date_of_birth)? $date_of_birth: '' ; ?>" placeholder="y/m/d" required="">
        </div>
 
        <div class="form-group text-center">
            <input name="addstudent" value="Add Student" type="submit" class="btn btn-danger">
        </div>
     </form>
</div>
</div>
