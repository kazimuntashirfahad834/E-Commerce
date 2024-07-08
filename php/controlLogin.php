<?php

include 'connection.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_fname'] = $row['fname'];
         $_SESSION['admin_lname'] = $row['lname'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_pnumber'] = $row['pnumber'];
         $_SESSION['admin_address'] = $row['address'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_fname'] = $row['fname'];
         $_SESSION['user_lname'] = $row['lname'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_pnumber'] = $row['pnumber'];
         $_SESSION['user_address'] = $row['address'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }elseif($row['user_type'] == 'seller'){

        $_SESSION['seller_fname'] = $row['fname'];
         $_SESSION['seller_lname'] = $row['lname'];
         $_SESSION['seller_email'] = $row['email'];
         $_SESSION['seller_pnumber'] = $row['pnumber'];
         $_SESSION['seller_address'] = $row['address'];
         $_SESSION['seller_id'] = $row['id'];
         header('location:seller_page.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>