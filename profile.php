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
       
    

        <?php 

            $query = "select * from about_me where roll_id = '$_SESSION[roll]' ";

                 $query_run = mysqli_query($db_con,$query);
                 while($row = mysqli_fetch_assoc($query_run)){
                     ?>
                     <table class="table  table-striped table-hover table-bordered">
                        <tr>
                             <td>
                                <center><img  src="admin/images/<?= isset($row['photo'])?$row['photo']:'';?>" width="250px"></center> 
                             </td>
                             
                        </tr>
                         <tr>
                             <td>
                                 <b>Name</b>
                             </td>
                             <td>
                                 <?php echo $row['name'] ?>
                             </td>
                             
                             <td>
                                 <b>Father's Name</b>
                             </td>
                             <td>
                                 <?php echo $row['name_father'] ?>
                             </td>
                             <td>
                                 <b>Mother's Name</b>
                             </td>
                             <td>
                                 <?php echo $row['name_mother'] ?>
                             </td>
                         </tr>

                         <tr>
                             <td>
                                 <b>Registration Number</b>
                             </td>
                             <td>
                                 <?php echo $row['roll_id'] ?>
                             </td>
                             
                             <td>
                                 <b>Department Name</b>
                             </td>
                             <td>
                                 <?php
                                    $department_query = "select department_name FROM about_me,department_info where about_me.department_code = department_info.department_code and roll_id = '$_SESSION[roll]' ";
                                    $department_query_run = mysqli_query($db_con,$department_query);
                                    if($dept_row = mysqli_fetch_assoc($department_query_run)){
                                        ?>

                                         <?php echo $dept_row['department_name'] ?>
                        
                                        <?php 
                                    }
                                ?>
                             </td>
                             <td>
                                 <b>Session</b>
                             </td>
                             <td>
                                 <?php echo $row['session'] ?>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <b>Mobile No</b>
                             </td>
                             <td>
                                 <?php echo $row['number'] ?>
                             </td>
                             <td>
                                 <b>Blood Group:</b>
                             </td>
                             <td>
                                 <?php echo $row['blood_group'] ?>
                             </td>
                             <td>
                                 <b>Gender</b>
                             </td>
                             <td>
                                 <?php echo $row['gender'] ?>
                             </td>
                         </tr>
            
                         <tr> 
                            <td>
                                 <b>Hall Name</b>
                             </td>
                             <td>

                                
                                 <?php
                                    $hall_query = "select hall_name FROM about_me,hall_info where about_me.hall_code = hall_info.hall_code and roll_id = '$_SESSION[roll]' ";
                                    $hall_query_run = mysqli_query($db_con,$hall_query);
                                    if($hall_row = mysqli_fetch_assoc($hall_query_run)){
                                        ?>
                                         <?php echo $hall_row['hall_name'] ?>
                        
                                        <?php 
                                    }
                                 ?>
                            </td>
                             <td>
                                 <b>Emergency Contact</b>
                             </td>
                             <td>
                                 <?php echo $row['emergency_number'] ?>
                             </td>
                             <td>
                                 <b>Relation</b>
                             </td>
                             <td>
                                 <?php echo $row['emergency_number_holder'] ?>
                             </td>
                         </tr>
                         <tr>
                             
                         </tr>
                         <tr>
                             <td>
                                 <b>Date of Birth</b>
                             </td>
                             <td>
                                 <?php echo $row['date_of_birth'] ?>
                             </td>     
                            </tr>
                        </table>
                    <?php 
                }

            ?>
