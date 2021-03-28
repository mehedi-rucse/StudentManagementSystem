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

      .dropdown {
        position: relative;
        display: inline-block;
        
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        width:100%;
      }

      .dropdown-content a {
        color: black;
        text-align: center;
        text-decoration: none;
        display: block;
      }

      .dropdown-content a:hover {background-color: #ddd;}

      .dropdown:hover .dropdown-content {display: block;}

      .dropdown:hover .dropbtn 
      {
        background-color: #0779e4;
        color: #fff;
      }
    </style>
    
    <title>Admin Dashboard</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><i class="fas fa-home fa-3x"></i></a>
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
              <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
              <div class="dropdown">
                <button class="dropbtn">Students</button>
                  <div class="dropdown-content">
                    <a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
                    <a href="index.php?page=all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Students</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Courses</button>
                  <div class="dropdown-content">
                    <a href="index.php?page=add-course" class="list-group-item list-group-item-action"><i class="fa fa-book"></i> Add Course</a>
                    <a href="index.php?page=all-course" class="list-group-item list-group-item-action"><i class="fa fa-book"></i> All Courses</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Department</button>
                  <div class="dropdown-content">
                    <a href="index.php?page=add-department" class="list-group-item list-group-item-action"><i class="fa fa-archway"></i> Add Department</a>
                    <a href="index.php?page=all-department" class="list-group-item list-group-item-action"><i class="fa fa-archway"></i> All Departments</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Hall</button>
                  <div class="dropdown-content">
                    <a href="index.php?page=add-hall" class="list-group-item list-group-item-action"><i class="fas fa-university"></i> Add Hall</a>
                    <a href="index.php?page=all-hall" class="list-group-item list-group-item-action"><i class="fas fa-university"></i> All Halls</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Result ID</button>
                  <div class="dropdown-content">
                    <a href="index.php?page=add-result" class="list-group-item list-group-item-action"><i class="fas fa-braille"></i> Add Result ID</a>
                    <a href="index.php?page=all-result" class="list-group-item list-group-item-action"><i class="fas fa-braille"></i> All Result IDs</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Marks</button>
                  <div class="dropdown-content">
                    <a href="index.php?page=add-mark" class="list-group-item list-group-item-action"><i class="fas fa-graduation-cap"></i> Add Mark</a>
                    <a href="index.php?page=all-mark" class="list-group-item list-group-item-action"><i class="fas fa-graduation-cap"></i> All Marks</a>
                </div>
              </div>
              
              <div class="dropdown">
                <button class="dropbtn">Notice</button>
                  <div class="dropdown-content">
                    <a href="index.php?page=add-notice" class="list-group-item list-group-item-action"><i class="fa fa-bell"></i> Add Notice</a>
                    <a href="index.php?page=all-notice" class="list-group-item list-group-item-action"><i class="fa fa-comments"></i> All Notices</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Payment</button>
                  <div class="dropdown-content">
                    <a href="index.php?page=add-payment" class="list-group-item list-group-item-action"><i class="fas fa-dollar-sign"></i> Add Payment</a>
                    <a href="index.php?page=all-payment" class="list-group-item list-group-item-action"><i class="fas fa-search-dollar"></i> All Payments</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="dropbtn">Users</button>
                  <div class="dropdown-content">
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