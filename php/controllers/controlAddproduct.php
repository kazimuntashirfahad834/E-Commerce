<?php

// include '../connection.php';
include '../models/sellermodel2.php';
session_start();

$seller_id = $_SESSION['seller_id'];

if(!isset($seller_id)){
   header('location:../views/login.php');
};

if(isset($_POST['add_product'])){

$name = mysqli_real_escape_string($conn, $_POST['name']);
$price = $_POST['price'];
$image = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = '../../uploaded_img/'.$image;

$select_product_name = get_productname($name);

if(mysqli_num_rows($select_product_name) > 0){
   $message[] = 'Product name already added';
}else{
   $add_product_query = add_product($name,$price,$image);

   if($add_product_query){
      if($image_size > 2000000){
         $message[] = 'Image size is too large';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);
         $message[] = 'Product added successfully!';
      }
   }else{
      $message[] = 'Product could not be added!';
   }
}
}
?>

<?php
if(isset($message))
{
   $msg= implode(",",$message);//
   setcookie("message", $msg, time() + (60), "/");
   header('location:../views/seller_product.php');
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