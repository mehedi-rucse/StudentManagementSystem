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
        position: relative;
        margin: auto;

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
</style>


<div>
    <br>
    <br>
	<h1 style="text-align: center;">Notices</h1>
    <br>
    <br>

     <?php 
        $notice_query = "SELECT * FROM about_me,student_notice WHERE roll_id = '$_SESSION[roll]' AND
        about_me.department_code = student_notice.department_code ";

        $notice_query_run = mysqli_query($db_con,$notice_query);

        echo "<table class='notices'>
            <tr>
                <th>Year</th>
                <th>Semester</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action Date</th>        
            </tr>";

            while($notice_row = mysqli_fetch_assoc($notice_query_run))
            {
		      		
                echo"<tr>";
                    echo "<td>".$notice_row['notice_year']."</td>";
                    echo "<td>".$notice_row['notice_semester']."</td>";
                    echo "<td>".$notice_row['title']."</td>";
                    echo "<td>".$notice_row['details']."</td>";
                    echo "<td>".$notice_row['due_date']."</td>";
                echo"<tr>";
            }
        echo "</table>";
        ?>
		<br>
</div>
