<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-4.6.0-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>404!</title>
    <link rel="stylesheet" href="CSS/signin.css">
    

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