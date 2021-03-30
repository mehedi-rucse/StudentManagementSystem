<?php require_once 'db_con.php';
session_start();
if (!isset($_SESSION['user_login'])) {
  header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <script src="../js/script.js"></script>
    <style>
        .dropbtn {
        width:100%;
        height: 45px;
        border-style: ridge; 
        line-height: 35px;
        padding: 0 12px;
        display: inline-block;
        border-radius: 4px;
        cursor: pointer;
        transition: all .1s;
        box-sizing: border-box;
        text-align: center;
        background-color: #fff;
        border: 1px solid #e9f2f9;
        font-size: 16px;
        position: relative;
      }
      .dropbtn:hover  
      {
        background-color: #0779e4;
        color: #fff;
      }
      .dropbtn-content a{
        text-align: center;
        background-color: #1b262c;
        color: #fff;
      }

      .dropbtn-content :hover {background-color: #00bcd4;color: #fff;}
      .list-group .menu-content {display: block;}



    </style>
    <title>Admin Dashboard</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><i class="fas fa-home fa-3x"></i></a>
  <img src="../img/ru-logo.png" style="width: 60px;height: 60px;" alt="Rajshahi University">
  <h2 style="color: #eeebdd;">University of Rajshahi</h3>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
    <?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
    <ul class="nav navbar-nav ">
      <li class="nav-item"><a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user"></i> Welcome <?php echo $showrow['name']; ?>!</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php?page=add-student"><i class="fa fa-user-plus"></i> Add Student</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
  </div>
</nav>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <div id="menu-content" class="menu-content collapse out">
                    <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <button  data-toggle="collapse" data-target="#student" class="dropbtn collapsed">Student</button>
                    <div class="dropbtn-content collapse" id="student">
                        <a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
                        <a href="index.php?page=all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Students</a>
                    </div>

                    <button  data-toggle="collapse" data-target="#course" class="dropbtn collapsed">Course</button>
                    <div class="dropbtn-content collapse" id="course">
                        <a href="index.php?page=add-course" class="list-group-item list-group-item-action"><i class="fa fa-book"></i> Add Course</a>
                        <a href="index.php?page=all-course" class="list-group-item list-group-item-action"><i class="fa fa-book"></i> All Courses</a>
                    </div>

                    <button  data-toggle="collapse" data-target="#department" class="dropbtn collapsed">Department</button>
                    <div class="dropbtn-content collapse" id="department">
                        <a href="index.php?page=add-department" class="list-group-item list-group-item-action"><i class="fa fa-archway"></i> Add Department</a>
                        <a href="index.php?page=all-department" class="list-group-item list-group-item-action"><i class="fa fa-archway"></i> All Departments</a>
                    </div>

                    <button  data-toggle="collapse" data-target="#hall" class="dropbtn collapsed">Hall</button>
                    <div class="dropbtn-content collapse" id="hall">
                        <a href="index.php?page=add-hall" class="list-group-item list-group-item-action"><i class="fas fa-university"></i> Add Hall</a>
                        <a href="index.php?page=all-hall" class="list-group-item list-group-item-action"><i class="fas fa-university"></i> All Halls</a>
                    </div>

                    <button  data-toggle="collapse" data-target="#result" class="dropbtn collapsed">Result ID</button>
                    <div class="dropbtn-content collapse" id="result">
                        <a href="index.php?page=add-result" class="list-group-item list-group-item-action"><i class="fas fa-braille"></i> Add Result ID</a>
                        <a href="index.php?page=all-result" class="list-group-item list-group-item-action"><i class="fas fa-braille"></i> All Result IDs</a>
                    </div>

                    <button  data-toggle="collapse" data-target="#mark" class="dropbtn collapsed">Marks</button>
                    <div class="dropbtn-content collapse" id="mark">
                        <a href="index.php?page=add-mark" class="list-group-item list-group-item-action"><i class="fas fa-graduation-cap"></i> Add Mark</a>
                        <a href="index.php?page=all-mark" class="list-group-item list-group-item-action"><i class="fas fa-graduation-cap"></i> All Marks</a>
                    </div>

                    <button  data-toggle="collapse" data-target="#notice" class="dropbtn collapsed">Notice</button>
                    <div class="dropbtn-content collapse" id="notice">  
                        <a href="index.php?page=add-notice" class="list-group-item list-group-item-action"><i class="fa fa-bell"></i> Add Notice</a>
                        <a href="index.php?page=all-notice" class="list-group-item list-group-item-action"><i class="fa fa-comments"></i> All Notices</a>
                    </div>

                    <button  data-toggle="collapse" data-target="#payment" class="dropbtn collapsed">Payment</button>
                    <div class="dropbtn-content collapse" id="payment">
                        <a href="index.php?page=add-payment" class="list-group-item list-group-item-action"><i class="fas fa-dollar-sign"></i> Add Payment</a>
                        <a href="index.php?page=all-payment" class="list-group-item list-group-item-action"><i class="fas fa-search-dollar"></i> All Payments</a>
                    </div>

                    <button  data-toggle="collapse" data-target="#user" class="dropbtn collapsed">User</button>
                    <div class="dropbtn-content collapse" id="user">
                        <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users</a>
                        <a href="index.php?page=user-profile" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> User Profile</a>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-9">
             <div class="content">
                 <?php 
                   if (isset($_GET['page'])) {
                    $page = $_GET['page'].'.php';
                    }else{
                      $page = 'dashboard.php';
                    }
                    if (file_exists($page)) {
                      require_once $page;
                    }else{
                      require_once '404.php';
                    }
                  ?>
             </div>
          </div>
        </div>  
    </div>
    <div class="clearfix"></div>
    <footer>
      <div class="container">
      <p>Copyright &copy; Mehedi Hasan <?php echo date('Y') ?></p>
      </div>
    </footer>
    <script type="text/javascript">
      jQuery('.toast').toast('show');
    </script>
    

  </body>
</html>


        
