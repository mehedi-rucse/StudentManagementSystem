<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
 
  if (isset($_POST['adddepartment'])) {
    $department_code = $_POST['department_code'];
    $department_name = $_POST['department_name'];
    $department_building = $_POST['department_building'];
    
    
    
 
    $query = "INSERT INTO `department_info` (`department_info_id`, `department_code`, `department_name`, `department_building`) 
              VALUES (NULL,'$department_code','$department_name','$department_building');";
 
    if (mysqli_query($db_con,$query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Department Inserted!</p>';
        
    }else{
        $datainsert['inserterror']= '<p style="color: red;">Department Not Inserted, please input right informations!</p>';
    }
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Department<small class="text-warning"> Add New Department!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Department</li>
  </ol>
</nav>
 
<div class="row">
    
<div class="col-sm-6">
        <?php if (isset($datainsert)) {?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
      <div class="toast-header">
        <strong class="mr-auto">Department Insert Alert</strong>
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
            <label for="department_name">Department Name</label>
            <input name="department_name" type="text" class="form-control" id="department_name" value="<?= isset($department_name)? $department_name: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="department_code">Department Code</label>
            <input name="department_code" type="text" class="form-control" id="department_code" value="<?= isset($department_code)? $department_code: '' ; ?>" required="">
        </div>
        <div class="form-group">
            <label for="department_building">Department Building</label>
            <input name="department_building" type="text" class="form-control" id="department_building" value="<?= isset($department_building)? $department_building: '' ; ?>" required="">
        </div>
        
        <div class="form-group text-center">
            <input name="adddepartment" value="Add Department" type="submit" class="btn btn-danger">
        </div>
     </form>
</div>
</div>
