<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='menu.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: menu.php?page='.$corepage[0]);
     }
    }
?>
<style> 
        body{
            background-color: #212529;
        }
        .contain {
            position: relative;
            text-align: center;
            color: #1e212d;
            
        }
        .cent {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
</style>

<div class="contain">
    <img   src="img/ru-picture.jpg" alt="Rajshahi University" style="width:100%;">
    <div class="cent"><h1>Student Management System</h1></div>
    
</div>