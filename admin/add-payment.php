<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
 
  if (isset($_POST['addpayment'])) {
    $about_me_id = $_POST['about_me_id'];
    $student_notice_id = $_POST['student_notice_id'];
   
    
 
    $query = "INSERT INTO `payment` (`payment_id`, `about_me_id`,`student_notice_id`) 
              VALUES (NULL,'$about_me_id','$student_notice_id');";
 
    if (mysqli_query($db_con,$query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Payment Inserted!</p>';
        
    }else{
        $datainsert['inserterror']= '<p style="color: red;">Payment Not Inserted, please input right informations!</p>';
    }
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Payment<small class="text-warning"> Add New Payment!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Payment</li>
  </ol>
</nav>
 
<div class="row">
    
<div class="col-sm-6">
        <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Payment Insert Alert</strong>
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
            <input name="about_me_id" type="text" class="form-control" id="about_me_id" value="<?= isset($about_me_id)? $about_me_id: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="student_notice_id">Notice Id</label>
            <input name="student_notice_id" type="text" class="form-control" id="student_notice_id" value="<?= isset($student_notice_id)? $student_notice_id: '' ; ?>" required="">
        </div>
        
        
        
        <div class="form-group text-center">
            <input name="addpayment" value="Add Payment" type="submit" class="btn btn-danger">
        </div>
     </form>
</div>
</div>
