<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
 
  if (isset($_POST['addresult'])) {
    $result_id = $_POST['result_id'];
    $course_id = $_POST['course_id'];
    $cgpa = $_POST['cgpa'];
    $tried = $_POST['tried'];
    
    
 
    $query = "INSERT INTO `course_wise_result` ( `course_result_id`,`result_id`,`course_id`, `cgpa`, `tried`) 
              VALUES (NULL,'$result_id','$course_id','$cgpa','$tried');";
 
    if (mysqli_query($db_con,$query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Result Inserted!</p>';
        
    }else{
        $datainsert['inserterror']= '<p style="color: red;">Result Not Inserted, please input right informations!</p>';
    }
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Result<small class="text-warning"> Add New Result!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Result</li>
  </ol>
</nav>
 
<div class="row">
    
<div class="col-sm-6">
        <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Result Insert Alert</strong>
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
            <input name="result_id" type="text" class="form-control" id="result_id" value="<?= isset($result_id)? $result_id: '' ; ?>" placeholder="Enter result id" required="">
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input name="course_id" type="text" value="<?= isset($course_id)? $course_id: '' ; ?>" placeholder="Enter course id" class="form-control"  id="course_id"  required="">
        </div>
        <div class="form-group">
            <label for="cgpa">CGPA</label>
            <input name="cgpa" type="text" class="form-control" id="cgpa" value="<?= isset($cgpa)? $cgpa: '' ; ?>"placeholder="Enter cgpa" required="">
        </div>
        <div class="form-group">
            <label for="tried">Tried</label>
            <input name="tried" type="text" class="form-control" id="tried" value="<?= isset($tried)? $tried: '' ; ?>" placeholder="0-2" required="">
        </div>
      
        
        <div class="form-group text-center">
            <input name="addresult" value="Add Mark" type="submit" class="btn btn-danger">
        </div>
     </form>
</div>
</div>
