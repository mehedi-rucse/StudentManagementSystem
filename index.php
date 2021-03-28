<?php require_once 'admin/db_con.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Welcome!!</title>
  </head>
  <body>
    <div class="container"><br>
      <a class="btn btn-primary float-right" href="admin/login.php">Admin Login</a>
          <h1 class="text-center">Welcome to Student Management System!</h1><br>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form method="POST">
            <table class="text-center infotable">
              <tr>
                <th colspan="2">
                  <p class="text-center">Student Information</p>
                </th>
              </tr>

              <tr>
                <td>
                  <p><label for="roll">Roll No</label></p>
                </td>
                <td>
                  <input class="form-control" type="text"  id="roll" placeholder="Roll Num.." name="roll">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['showinfo'])) {
          $roll = $_POST['roll'];
          if (!empty($roll)) {
            $query = mysqli_query($db_con,"SELECT * FROM `about_me` WHERE `roll_id`='$roll'");
            if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['roll_id']==$roll) {
                
                $name = $row['name'];
                $roll = $row['roll_id'];
                $name_father = $row['name_father'];
                $name_mother = $row['name_mother'];
                $number = $row['number'];
                $blood_group =$row['blood_group'];
                $session = $row['session'];
                $gender = $row['gender'];
                $emergency_number = $row['emergency_number'];
                $emergency_number_holder = $row['emergency_number_holder'];
                $photo= $row['photo']; 
                $date_of_birth = $row['date_of_birth'];
              ?>
        <div class="row">
          <div class="col-sm-7 offset-sm-3">
            <table class="table table-bordered">
              <tr>
                <td rowspan="6"><h3>Student Info</h3><img class="img-thumbnail" src="admin/images/<?= isset($photo)?$photo:'';?>" width="250px"><h3><?= isset($name)?$name:'';?></h3> </td>
              </tr>
              <tr>
                <td>Roll</td>
                <td><?= isset($roll)?$roll:'';?></td>
              </tr>
              <tr>
                <td>Father's Name</td>
                <td><?= isset($name_father)?$name_father:'';?></td>
              </tr>
              <tr>
                <td>Mother's Name</td>
                <td><?= isset($name_mother)?$name_mother:'';?></td>
              </tr>
              <tr>
                <td>Phone</td>
                <td><?= isset($number)?$number:'';?></td>
              </tr>
              <tr>
                <td>Date of Birth</td>
                <td><?= isset($date_of_birth)?$date_of_birth:'';?></td>
              </tr>
              
              
            </table>
          </div>
        </div>  
      <?php 
          }else{
                echo '<p style="color:red;">Please Input Valid Roll</p>';
              }
            }else{
              echo '<p style="color:red;">Your Input Doesn\'t Match!</p>';
            }
            }else{?>
              <script type="text/javascript">alert("Data Not Found!");</script>
            <?php }
          }; ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>