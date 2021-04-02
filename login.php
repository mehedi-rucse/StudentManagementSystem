<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-4.6.0-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Log In</title>
    <style>
        .top-bar {
            background-color: #a4ebf3;
            position: relative;
            text-align: center;
            padding: 30px;
        }

        .middle-bar {
            background-color: white;
            position: relative;
            text-align: left;
            padding: 40px;
        }

        .rulogo {
            width: 10%;
            border-radius: 100%;
            padding: 10px;
        }

        h2 {
            color: #28527a;
        }

        h3 {
            padding-top: 20px;
            padding-bottom: 100px;
        }

        .btn {
            background: #3498db;
            background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
            background-image: -moz-linear-gradient(top, #3498db, #2980b9);
            background-image: -ms-linear-gradient(top, #3498db, #2980b9);
            background-image: -o-linear-gradient(top, #3498db, #2980b9);
            background-image: linear-gradient(to bottom, #3498db, #2980b9);
            -webkit-border-radius: 28;
            -moz-border-radius: 28;
            border-radius: 28px;
            font-family: Arial;
            color: #ffffff;
            font-size: 20px;
            padding: 10px 80px 10px 80px;
            text-decoration: none;
            position: relative;
            margin-top: 20px;
        }

        .btn:hover {
            background: #3cb0fd;
            background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
            background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
            text-decoration: none;
            position: relative;
        }
    </style>
</head>

<body>
    <div class="top-bar">

        <img class="rulogo" src="img/ru-logo.png" alt="University of Rajshahi Logo">
        <h2>University of Rajshahi</h2>
        

    </div>
    
    <div class="middle-bar">
        <h3>Sign into your account</h3>
        
        <form action="" method="POST">
        <label for="">Roll  </label>
        <input type="text" class="form-control" name="roll" placeholder="Enter your roll number" required autofocus>
        <br>
        <label for="">Password  </label>
        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
        <br>
        
        <input type="submit" name="submit" value="log in" class="btn">


        </form>
    </div>

        <?php
        session_start(); 
        require_once 'admin/db_con.php';

        if(isset($_POST['submit']))
        {
            
            $query ="select * from about_me  WHERE  roll_id ='$_POST[roll]'";
            
            $query_run = mysqli_query($db_con,$query);

            if($row = mysqli_fetch_assoc($query_run)){

                if($row['roll_id'] == $_POST['roll'])
                {

                    if($row['roll_id'] == $_POST['password']){
                        $_SESSION['roll'] = $row['roll_id'];
                        $_SESSION['password'] = $row['roll_id'];
                        header("Location: menu.php");
                    }
                    else
                    {
                        header("Location: tryAgain1.php");
                    }
                }

            }
            else{
                header("Location: tryAgain2.php");
            }       
        } 
        ?>
</body>
</html>