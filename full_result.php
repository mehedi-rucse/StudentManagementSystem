<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='result-menu.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: result-menu.php?page='.$corepage[0]);
     }
    }
?>

    


    <br>
    <br>
   <center><h2>Result of all Courses</h2></center> 
    <br>
    <br>

        <?php 

            $query = "SELECT * FROM about_me,result,course_wise_result,course_information WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                 about_me.about_me_id =result.about_me_id  AND result.result_id = course_wise_result.result_id AND 
                                                 course_wise_result.course_id = course_information.course_id";

                $query_run = mysqli_query($db_con,$query);

                echo "<table class='notices'>
                <tr >
                    <th>Course Code</th>
                    <th>Title</th>
                    <th>Credits</th>
                    <th>Acquired Credits</th>
                    <th>CGPA</th>
                    <th>Grade</th>
                    <th>Improve Status</th>
                </tr>";

                 while($row = mysqli_fetch_assoc($query_run)){
                     
                         echo"<tr>";
                                echo "<td>".$row['course_code']."</td>";
                                echo "<td>".$row['course_title']."</td>";
                                echo "<td>".$row['credits']."</td>";

                                //this is the acquired credit condition
                                if($row['cgpa']!='0'){
                                
                                    echo "<td>".$row['credits']."</td>";
                                       
                                }
                                else{
                                        
                                    echo "<td>"."0"."</td>";
                                         
                                }

                                echo "<td>".$row['cgpa']."</td>";
                                //this is the grade scale part's conditions

                                if($row['cgpa'] == '4.00'){
                                    echo "<td>"."<strong>A+</strong>"."</td>";
                                }
                                else if($row['cgpa'] == '3.75'){
                                    echo "<td>"."<strong>A</strong>"."</td>";
                                }
                                else if($row['cgpa'] == '3.50'){
                                    echo "<td>"."<strong>A-</strong>"."</td>";
                                }
                                else if($row['cgpa'] == '3.25'){
                                    echo "<td>"."<strong>B+</strong>"."</td>";
                                }
                                else if($row['cgpa'] == '3.00'){
                                    echo "<td>"."<strong>B</strong>"."</td>";
                                }
                                else if($row['cgpa'] == '2.75'){
                                    echo "<td>"."<strong>B-</strong>"."</td>";
                                }
                                else if($row['cgpa'] == '2.50'){
                                    echo "<td>"."<strong>C+</strong>"."</td>";
                                }
                                else if($row['cgpa'] == '2.25'){
                                    echo "<td>"."<strong>C</strong>"."</td>";
                                }
                                else if($row['cgpa'] == '2.00'){
                                    echo "<td>"."<strong>D</strong>"."</td>";
                                }
                                else{
                                    echo "<td  class='wrong'>"."<strong>F</strong>"."</td>";
                                }


                                //this condition is for the improve status part
                                if(($row['cgpa']<='2.75' and $row['tried'] <'1') or $row['cgpa'] =='0'){
                                
                                    echo "<td class='right'>"."&#10004"."</td>";
                                       
                                }
                                else{
                                        
                                    echo "<td class='wrong'>"."&#10006"."</td>";
                                         
                                }   
                            echo"<tr>";     
                }
                echo "</table>";

            ?>
    </div>
   
</body>
</html>