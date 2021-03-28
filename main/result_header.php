<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/profile.css">
<title>Result</title>
 <?php

        session_start();
        
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"project_dbms");
  ?>
</head>
<body>

    <div class="topnav" id="myTopnav">
    	<a href="menu.php">Home</a>
        <a href="result.php">Result</a>
        <a href="full_result.php">Courses</a>

        <div class="dropdown"><button class="dropbtn">First Year<i class="fa fa-caret-down"></i></button>
        	<div class="dropdown-content">
        	  	<a href="1y1s.php">1st Semester</a>
        	  	<a href="1y2s.php">2nd Semester</a>
        	</div>  
        </div> 
        <div class="dropdown"><button class="dropbtn">Second Year<i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a href="2y1s.php">1st Semester</a>
                <a href="2y2s.php">2nd Semester</a>
            </div>
        </div> 
        <div class="dropdown"><button class="dropbtn">Third Year<i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a href="3y1s.php">1st Semester</a>
                <a href="3y2s.php">2nd Semester</a>
           </div>
        </div> 
        <div class="dropdown"><button class="dropbtn">Fourth Year<i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a href="4y1s.php">1st Semester</a>
                <a href="4y2s.php">2nd Semester</a>
            </div>
            
        </div>
        
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

</div>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            }else {
                x.className = "topnav";
            }
        }
    </script> 
  <div class="result-bar">