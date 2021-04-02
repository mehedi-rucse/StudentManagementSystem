<?php require_once 'admin/db_con.php';
session_start();
if (!isset($_SESSION['roll'])) {
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/fontawesome.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        .container-fluid{
            padding: 0 ;
        }
        body{
            background-color: #9fd8df;
        }
        .dropdown-content a:hover {
          background-color: #ddd;
          color: black;
        }
        .dropdown-content a {
        float: none;
        color: #838383;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        background-color: #343a40;
        }
        
    </style>
    <style>
    .notices {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }
    
    .notices td,
    .notices th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    
    .notices tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    .notices tr:hover {
        background-color: #ddd;
    }
    
    .notices th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #00917c;
        color: white;
    }
    h5{
        background-color: #fb743e;
        color: #fff;
    }
    .right {
        color: rgb(26, 235, 26);
        font-size: large;
        font-weight: bold;
        text-align: center;
    }
    
    .wrong {
        color: red;
        text-align: center;
        font-weight: bold;
    }
    
    .yellow {
        color: #f0a500;
        text-align: center;
        font-weight: bold;
    }
    
    .pink {
        color: #e36bae;
        text-align: center;
        font-weight: bold;
    }
    
    .table-header {
        color: #ffffff;
        background-color: #3cb0fd;
    }
    .year-sem {
        text-align: center;
    }
</style>
    
    
    
    <title>Student Dashboard</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="menu.php"><i class="fas fa-home fa-3x"></i></a>
  <img src="img/ru-logo.png" style="width: 60px;height: 60px;" alt="Rajshahi University">
  <h2 style="color: #eeebdd;">University of Rajshahi</h3>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
    <?php $showuser = $_SESSION['roll']; $haha = mysqli_query($db_con,"SELECT * FROM `about_me` WHERE about_me.roll_id =  '$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
    <ul class="nav navbar-nav ">
      <li class="nav-item"><a class="nav-link" href="result.php"><i class="fa fa-user"></i> Welcome <?php echo $showrow['name']; ?>!</a></li>
      <li class="nav-item"><a class="nav-link" href="full_result.php?page=full_result"><i class="fa fa-book"></i> Courses</a></li>
      <li class="dropdown"><a class="nav-link " data-toggle="dropdown" href="#">First Year <i class="fas fa-caret-down"></i></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-content"><a  href="1y1s.php?page=1y1s">1st Semester </a></li>
          <li class="dropdown-content"><a  href="1y2s.php?page=S1y2s">2nd Semester </a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="nav-link " data-toggle="dropdown" href="#">Second Year <i class="fas fa-caret-down"></i></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-content"><a  href="2y1s.php?page=1y1s">1st Semester </a></li>
          <li class="dropdown-content"><a  href="2y2s.php?page=1y2s">2nd Semester </a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="nav-link " data-toggle="dropdown" href="#">Third Year <i class="fas fa-caret-down"></i></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-content"><a  href="3y1s.php?page=1y1s">1st Semester </a></li>
          <li class="dropdown-content"><a  href="3y2s.php?page=1y2s">2nd Semester </a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="nav-link " data-toggle="dropdown" href="#">Fourth Year <i class="fas fa-caret-down"></i></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-content"><a  href="4y1s.php?page=1y1s">1st Semester </a></li>
          <li class="dropdown-content"><a  href="4y2s.php?page=1y2s">2nd Semester </a></li>
        </ul>
      </li>
      <li class="nav-item"><a style="color: red;" class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
  </div>
</nav>



<div class="container-fluid">
     <div class="content">
          <?php 
            if (isset($_GET['page'])) {
             $page = $_GET['page'].'.php';
             }else{
               $page = 'result.php';
             }
             if (file_exists($page)) {
               require_once $page;
             }else{
               require_once 'admin/404.php';
             }
           ?>
     </div>
</div>

<footer>
  <div class="container">
    <p>Copyright &copy; Mehedi Hasan <?php echo date('Y') ?></p>
  </div>
</footer>
<script type="text/javascript">
  jQuery('.toast').toast('show');
</script>
      

