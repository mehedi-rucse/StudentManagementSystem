<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-4.6.0-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/signin.css">
    <title>Log In</title>
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
        
        if(isset($_POST['submit']))
        {
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,"project_dbms");
            $query ="select * from about_me  WHERE  roll_id ='$_POST[roll]'";
            
            $query_run = mysqli_query($connection,$query);

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