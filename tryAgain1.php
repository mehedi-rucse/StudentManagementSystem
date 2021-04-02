<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-4.6.0-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>404!</title>
    <style>
        .top-bar {
            background-color: #a4ebf3;
            position: relative;
            text-align: center;
            padding: 40px;
        }
        
        
        .end-bar {
            background-color: white;
            position: relative;
            text-align: center;
            padding: 50px;
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
            <h1>Wrong Password!</h1>
            <br>
        </div>
        <div class="end-bar">
            <form action="" method="POST">
                <input type="submit" name="submit" value="Try Again" class="btn">
            </form>
        </div>
        <?php

                if(isset($_POST['submit']))
                {
                    header("Location: login.php");
                }
        ?>
    
    
</body>
</html>