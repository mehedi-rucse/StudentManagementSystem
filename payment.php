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
    .notices {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
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
</style>


<div>
    <br><br><h1 style="text-align: center;">Payment</h1><br><br>

                    <?php 
                      $notice_query = "SELECT * FROM about_me INNER JOIN student_notice ON about_me.department_code = student_notice.department_code 
                                       LEFT JOIN  payment ON about_me.about_me_id = payment.about_me_id AND payment.student_notice_id = student_notice.student_notice_id 
                                       WHERE about_me.roll_id = '$_SESSION[roll]'  AND student_notice.type_of_notice ='Payment'";

                      $notice_query_run = mysqli_query($db_con,$notice_query);

                         echo "<table class='notices'>
                            <tr >
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Due Date</th>        
                            </tr>";



                      while($notice_row = mysqli_fetch_assoc($notice_query_run))
                      {
		      		
                            echo"<tr>";
                                echo "<td>".$notice_row['notice_year']."</td>";
                                echo "<td>".$notice_row['notice_semester']."</td>";
                                echo "<td>".$notice_row['title']."</td>";
                                echo "<td>".$notice_row['details']."</td>";

                                if($notice_row['payment_id'] === NULL){

                                    //saving current time in a variable
                                    $currentTime=date("Y-m-d",time());
                                    //saving payment due time in a variable
                                    $dueTime = $notice_row['due_date'];
                                    //adding 10 days with due time
                                    $overdueTime = date('Y-m-d', strtotime($dueTime. ' + 10 days'));
                                    
                                    //for failed
                                    if ($currentTime > $overdueTime ) {
                                        
                                        echo "<td class='wrong'>"."FAILED"."</td>";
                                    }
                                    //for overdue payment
                                    else if ($currentTime > $dueTime && $currentTime <= $overdueTime ) {

                                        echo "<td class='yellow'>"."OVERDUE"."</td>";
                                         echo "<h5><marquee width='100%' direction='left'scrollamount='16'  >" .$notice_row['details']."<strong> Last Date </strong>(with fine) : ".$overdueTime."</marquee></h5>";
                                    }
                                    //for due payment
                                    else if ($currentTime <= $dueTime) {

                                        echo "<td class='pink'>"."DUE"."</td>";
                                       
                                    }
                                    
                                }
                                else{
                                    echo "<td class='right'>"."Paid"."</td>";
                                }

                                echo "<td>".$notice_row['due_date']."</td>";

                            echo"<tr>";
                            
                      }
                      echo "</table>";                  
                  ?>
</div>
