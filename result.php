<?php 
    include'main/result_header.php'
?>
  </div>
<link rel="stylesheet" href="CSS/result.css">



  <div class="top-bar">
      <center>
        <h1>Result Board</h1>
        
        <?php 
            $query = "select name from about_me where  roll_id = '$_SESSION[roll]' ";
            $query_run = mysqli_query($db_con,$query);
            if($row = mysqli_fetch_assoc($query_run)){
                ?>
                <h2 class="wrong">
                    <?php echo $row['name']; ?>
                </h2>
                <?php 
            }
            ?>
            <h3>Results Overview</h3>
    </center>
  </div>
  <div class="result-bar">
	    	    
                    <?php 
                    
                      $result_query = "SELECT AVG(cgpa) as avg_cgpa FROM about_me,result,course_wise_result WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                about_me.about_me_id =result.about_me_id and result.year='1st' AND result.result_id = course_wise_result.result_id";
                      $improve_query ="SELECT COUNT(cgpa) as count_imp FROM about_me,result,course_wise_result WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                about_me.about_me_id =result.about_me_id and result.year='1st' AND result.result_id = course_wise_result.result_id AND (course_wise_result.cgpa = '0' OR (course_wise_result.cgpa < '3' AND course_wise_result.tried < '1'))";

                      $result_query_run = mysqli_query($db_con,$result_query);
                      $improve_query_run = mysqli_query($db_con,$improve_query);

                      echo "<table class='notices'>
                            <tr >
                                <th>Year</th>
                                <th>CGPA</th>
                                <th>Status</th>
                                <th>Improvement</th>
                                    
                            </tr>";
                            


                      while($result_row = mysqli_fetch_assoc($result_query_run) ){
                          echo"<tr>";
                            echo "<td>".'First'."</td>";  
		      		        if($result_row['avg_cgpa']){
                                  
                                echo "<td>".number_format($result_row['avg_cgpa'],3)."</td>";
                                if($result_row['avg_cgpa'] >= '2.25'){
                                    echo "<td class='right'>"."Passed"."</td>";
                                    if( $improve_row = mysqli_fetch_assoc($improve_query_run)){
                                        echo "<td>"."$improve_row[count_imp]"."</td>";
                                    }
                                    
					            }
                                else{
                                    echo "<td class='wrong'>"."Failed"."</td>";
                                    if( $improve_row = mysqli_fetch_assoc($improve_query_run)){
                                        echo "<td>"."$improve_row[count_imp]"."</td>";
                                    }
                                }
					        }
					        else{
					  	        echo "<td>".'Not Yet'."</td>";
                                echo "<td>".'Upcoming'."</td>";
                                echo "<td>".'Not Yet'."</td>";
					        }
                         echo"<tr>"; 
                      }

                      $result_query = "SELECT AVG(cgpa) as avg_cgpa FROM about_me,result,course_wise_result WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                about_me.about_me_id =result.about_me_id and result.year='2nd' AND result.result_id = course_wise_result.result_id";
                      $improve_query ="SELECT COUNT(cgpa) as count_imp FROM about_me,result,course_wise_result WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                about_me.about_me_id =result.about_me_id and result.year='2nd' AND result.result_id = course_wise_result.result_id AND (course_wise_result.cgpa = '0' OR (course_wise_result.cgpa < '3' AND course_wise_result.tried < '1'))";

                      $result_query_run = mysqli_query($db_con,$result_query);
                      $improve_query_run = mysqli_query($db_con,$improve_query);
                      while($result_row = mysqli_fetch_assoc($result_query_run)){
            	      	  echo"<tr>";
                            echo "<td>".'Second'."</td>";

		      		        if($result_row['avg_cgpa']){
                                echo "<td>".number_format($result_row['avg_cgpa'],3)."</td>";
                                if($result_row['avg_cgpa'] >= '2.25'){
                                    echo "<td class='right'>"."Passed"."</td>";
                                    if( $improve_row = mysqli_fetch_assoc($improve_query_run)){
                                        echo "<td>"."$improve_row[count_imp]"."</td>";
                                    }
					            }
                                else{
                                    echo "<td class='wrong'>"."Failed"."</td>";
                                    if( $improve_row = mysqli_fetch_assoc($improve_query_run)){
                                        echo "<td>"."$improve_row[count_imp]"."</td>";
                                    } 
                                }
					        }
					        else{
					  	        echo "<td>".'Not Yet'."</td>";
                                echo "<td>".'Upcoming'."</td>";
                                echo "<td>".'Not Yet'."</td>";
					        }
                           echo"<tr>"; 
                       }
                       $result_query = "SELECT AVG(cgpa) as avg_cgpa FROM about_me,result,course_wise_result WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                about_me.about_me_id =result.about_me_id and result.year='3rd' AND result.result_id = course_wise_result.result_id";
                      $improve_query ="SELECT COUNT(cgpa) as count_imp FROM about_me,result,course_wise_result WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                about_me.about_me_id =result.about_me_id and result.year='3rd' AND result.result_id = course_wise_result.result_id AND (course_wise_result.cgpa = '0' OR (course_wise_result.cgpa < '3' AND course_wise_result.tried < '1'))";

                      $result_query_run = mysqli_query($db_con,$result_query);
                      $improve_query_run = mysqli_query($db_con,$improve_query);
                      while($result_row = mysqli_fetch_assoc($result_query_run)){
            	      	  echo"<tr>";
                            echo "<td>".'Third'."</td>";

		      		        if($result_row['avg_cgpa']){
                                echo "<td>".number_format($result_row['avg_cgpa'],3)."</td>";
                                if($result_row['avg_cgpa'] >= '2.25'){
                                    echo "<td class='right'>"."Passed"."</td>";
                                    if( $improve_row = mysqli_fetch_assoc($improve_query_run)){
                                        echo "<td>"."$improve_row[count_imp]"."</td>";
                                    }
					            }
                                else{
                                    echo "<td class='wrong'>"."Failed"."</td>";
                                    if( $improve_row = mysqli_fetch_assoc($improve_query_run)){
                                        echo "<td>"."$improve_row[count_imp]"."</td>";
                                    } 
                                }
					        }
					        else{
					  	        echo "<td>".'Not Yet'."</td>";
                                echo "<td>".'Upcoming'."</td>";
                                echo "<td>".'Not Yet'."</td>";
					        }
                           echo"<tr>"; 
                       }
                       $result_query = "SELECT AVG(cgpa) as avg_cgpa FROM about_me,result,course_wise_result WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                about_me.about_me_id =result.about_me_id and result.year='4th' AND result.result_id = course_wise_result.result_id";
                      $improve_query ="SELECT COUNT(cgpa) as count_imp FROM about_me,result,course_wise_result WHERE about_me.roll_id = '$_SESSION[roll]' AND
                                                about_me.about_me_id =result.about_me_id and result.year='4th' AND result.result_id = course_wise_result.result_id AND (course_wise_result.cgpa = '0' OR (course_wise_result.cgpa < '3' AND course_wise_result.tried < '1'))";

                      $result_query_run = mysqli_query($db_con,$result_query);
                      $improve_query_run = mysqli_query($db_con,$improve_query);
                      while($result_row = mysqli_fetch_assoc($result_query_run)){
            	      	  echo"<tr>";
                            echo "<td>".'Fourth'."</td>";

		      		        if($result_row['avg_cgpa']){
                                echo "<td>".number_format($result_row['avg_cgpa'],3)."</td>";
                                if($result_row['avg_cgpa'] >= '2.25'){
                                    echo "<td class='right'>"."Passed"."</td>";
                                    if( $improve_row = mysqli_fetch_assoc($improve_query_run)){
                                        echo "<td>"."$improve_row[count_imp]"."</td>";
                                    }
					            }
                                else{
                                    echo "<td class='wrong'>"."Failed"."</td>";
                                    if( $improve_row = mysqli_fetch_assoc($improve_query_run)){
                                        echo "<td>"."$improve_row[count_imp]"."</td>";
                                    } 
                                }
					        }
					        else{
					  	        echo "<td>".'Not Yet'."</td>";
                                echo "<td>".'Upcoming'."</td>";
                                echo "<td>".'Not Yet'."</td>";
					        }
                           echo"<tr>"; 
                       }

                  ?>
    </div>

</body>
</html>
