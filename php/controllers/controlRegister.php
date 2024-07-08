<?php

// include '../connection.php';
include '../models/usermodel.php';

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    $select_users = checkusers($email, $password);

    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'user already exist!';
    }
    else{
        if($password!=$cpassword){
            $message[] = 'Confirm password does not matched!*';
        }
        else{
            register($fname, $lname, $email, $pnumber, $address, $password, $cpassword,$user_type);
            $message[] = 'Registered successfully';
        }
    }


}

?>
<?php
if(isset($message))
{
   $msg= implode(",",$message);//
   setcookie("message", $msg, time() + (60), "/");
   header('location:../views/register.php');
   // foreach($message as $message){
   //    echo '
   //    <div class="message">
   //       <span>'.$message.'</span>
   //       <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
   //    </div>
   //    ';
   // }
}
?>