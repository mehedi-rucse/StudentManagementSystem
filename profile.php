<?php 
include 'main/header.php';
?>
        <h3> <br> Profile</h3>
    </div>
    
    <div class="jumbotron">

        <?php 

            $query = "select * from about_me where roll_id = '$_SESSION[roll]' ";

                 $query_run = mysqli_query($connection,$query);
                 while($row = mysqli_fetch_assoc($query_run)){
                     ?>
                     <table class="pro_table">
                        <tr>
                             <td>
                                 <img  src="admin/images/<?= isset($row['photo'])?$row['photo']:'';?>" width="250px">
                             </td>
                        </tr>
                         <tr>
                             <td>
                                 <b>Name :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['name'] ?>"disabled>
                             </td>
                             <td>
                                 <b>Registration Number :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['roll_id'] ?>"disabled>
                             </td>
                         </tr>

                         <tr>
                             <td>
                                 <b>Father's Name :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['name_father'] ?>"disabled>
                             </td>
                             <td>
                                 <b>Department Name :</b>
                             </td>
                             <td>
                                 <?php
                                    $department_query = "select department_name FROM about_me,department_info where about_me.department_code = department_info.department_code and roll_id = '$_SESSION[roll]' ";
                                    $department_query_run = mysqli_query($connection,$department_query);
                                    if($dept_row = mysqli_fetch_assoc($department_query_run)){
                                        ?>

                                         <input type="text" size="30" value="<?php echo $dept_row['department_name'] ?>"disabled>
                        
                                        <?php 
                                    }
                                ?>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <b>Mother's Name :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['name_mother'] ?>"disabled>
                             </td>
                            <td>
                                 <b>Hall Name :</b>
                             </td>
                             <td>

                                
                                 <?php
                                    $hall_query = "select hall_name FROM about_me,hall_info where about_me.hall_code = hall_info.hall_code and roll_id = '$_SESSION[roll]' ";
                                    $hall_query_run = mysqli_query($connection,$hall_query);
                                    if($hall_row = mysqli_fetch_assoc($hall_query_run)){
                                        ?>
                                         <input type="text area" size="30" size="30" value="<?php echo $hall_row['hall_name'] ?>"disabled>
                        
                                        <?php 
                                    }
                                ?>
                            </td>

                         </tr>
                         <tr>
                             <td>
                                 <b>Mobile No :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['number'] ?>"disabled>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <b>Blood Group:</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['blood_group'] ?>"disabled>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <b>Session :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['session'] ?>"disabled>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <b>Gender :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['gender'] ?>"disabled>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <b>Emergency Contact :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['emergency_number'] ?>"disabled>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <b>Relationship :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['emergency_number_holder'] ?>"disabled>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <b>Date of Birth :</b>
                             </td>
                             <td>
                                 <input type="text" size="30" value="<?php echo $row['date_of_birth'] ?>"disabled>
                             </td>     
                            </tr>
                        </table>
                    <?php 
                }

            ?>
    </div>

   <div class="bottom-bar">
        <a class="button" href="menu.php">Home</a>
    </div>
</body>
</html>