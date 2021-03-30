<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <title>Student Database</title>
    <link rel="stylesheet" href="CSS/profile.css">
    <?php
        session_start();
        require_once 'admin/db_con.php';
    ?>

</head>
<body>
    
    <div class="jumbotron">
        <h1>Welcome!</h1>
        <?php 
            $query = "select name from about_me where roll_id = '$_SESSION[roll]' ";
            $query_run = mysqli_query($db_con,$query);
            if($row = mysqli_fetch_assoc($query_run)){
                ?>
                <h2>
                    <?php echo $row['name']; ?>
                </h2>
                <?php 
            }
            ?>