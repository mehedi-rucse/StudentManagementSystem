<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
 
  if (isset($_POST['addresultid'])) {
    $roll_id = $_POST['roll_id'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    
 
    $query = "INSERT INTO `result` (`result_id`, `roll_id`,`year`, `semester`) 
              VALUES (NULL,'$roll_id','$year','$semester');";
 
    if (mysqli_query($db_con,$query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Result Id Inserted!</p>';
        
    }else{
        $datainsert['inserterror']= '<p style="color: red;">Result Id Not Inserted, please input right informations!</p>';
    }
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Result Id<small class="text-warning"> Add New Result Id</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Result Id</li>
  </ol>
</nav>
 
<div class="row">
    
<div class="col-sm-6">
        <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Result Id Insert Alert</strong>
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
            <label for="roll_id">Student Roll</label>
            <input name="roll_id" type="text" class="form-control" id="roll_id" value="<?= isset($roll_id)? $roll_id: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input name="year" type="text" class="form-control" id="year" value="<?= isset($year)? $year: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input name="semester" type="text" class="form-control" id="semester" value="<?= isset($semester)? $semester: '' ; ?>" required="">
        </div>
        
        
        <div class="form-group text-center">
            <input name="addresultid" value="Add Result Id" type="submit" class="btn btn-danger">
        </div>
     </form>
</div>
</div>
