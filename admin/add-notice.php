<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
 
  if (isset($_POST['addnotice'])) {
    $department_code = $_POST['department_code'];
    $notice_year = $_POST['notice_year'];
    $notice_semester = $_POST['notice_semester'];
    $type_of_notice = $_POST['type_of_notice'];
    $title = $_POST['title'];
    $details =$_POST['details'];
    $due_date = $_POST['due_date'];
    
 
    $query = "INSERT INTO `student_notice` (`student_notice_id`, `department_code`, `notice_year`, `notice_semester`, `type_of_notice`, `title`, `details`, `due_date`) 
              VALUES (NULL,'$department_code','$notice_year','$notice_semester','$type_of_notice','$title','$details','$due_date');";
 
    if (mysqli_query($db_con,$query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">notice Inserted!</p>';
        
    }else{
        $datainsert['inserterror']= '<p style="color: red;">Notice Not Inserted, please input right informations!</p>';
    }
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Notice<small class="text-warning"> Add New Notice!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Notice</li>
  </ol>
</nav>
 
<div class="row">
    
<div class="col-sm-6">
        <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Notice Insert Alert</strong>
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
            <input name="department_code" type="text" class="form-control" id="department_code" value="<?= isset($department_code)? $department_code: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="notice_year">Year</label>
            <select class="form-control" name="notice_year">
                     <option value="1st"> 1st </option>
                     <option value="2nd"> 2nd </option>
                     <option value="3rd"> 3rd </option>
                     <option value="4th"> 4th </option>       
            </select>
        </div>
        <div class="form-group">
            <label for="notice_semester">Semester</label>
            <select class="form-control" name="notice_semester">
                     <option value="1st"> 1st </option>
                     <option value="2nd"> 2nd </option>      
            </select>
        </div>
        <div class="form-group">
            <label for="type_of_notice">Type</label>
            <select class="form-control" name="type_of_notice">
                     <option value="Exam"> Exam </option>
                     <option value="Payment"> Payment </option>
                     <option value="Result"> Result </option>
                     <option value="Vacation">Vacation </option>
                     <option value="Other's"> Others </option>      
            </select>
        </div>
      
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title"  value="<?= isset($title)? $title: '' ; ?>"  required="">
        </div>
 
        <div class="form-group">
            <label for="details">Details</label>
            <input name="details" type="text" class="form-control" id="details" value="<?= isset($details)? $details: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="due_date">Action Date</label>
            <input name="due_date" type="text" class="form-control" id="due_date" value="<?= isset($due_date)? $due_date: '' ; ?>" placeholder="y-m-d" required="">
        </div>
        
        <div class="form-group text-center">
            <input name="addnotice" value="Add Notice" type="submit" class="btn btn-danger">
        </div>
     </form>
</div>
</div>
