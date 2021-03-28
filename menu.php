<?php 
include 'main/header.php';
?>    
    </div>

    <div class="left-sidebar">
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input type="submit" name="profile" value="Profile"class="button">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="result" value="Result"class="button">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="notice" value="Notice"class="button">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="payment" value="Payment"class="button">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="logout" value="Logout"class="logout-button">
                    </td>
                </tr>
            </table>
        </form>

    
    </div>

    <div>
        <?php 
             if(isset($_POST['profile'])){
                header("Location: profile.php");
             }
             else if(isset($_POST['result'])){
                header("Location: result.php");
             }
             else if(isset($_POST['notice'])){
                header("Location: notice.php");
             }
             else if(isset($_POST['payment'])){
                header("Location: payment.php");
             }
             else if(isset($_POST['logout'])){
                 
                session_destroy();
                header("Location: index.php");
             }
        ?>
    </div>
    
   

</body>
</html>