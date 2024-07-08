<?php

// include '../connection.php';
include '../models/sellermodel2.php';
session_start();

$seller_id = $_SESSION['seller_id'];

if(!isset($seller_id)){
   header('location:../views/login.php');
};
if(isset($_GET['delete']))
{
    $delete_id = $_GET['delete'];
    $delete_image_query = delete_product($delete_id);
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('../../uploaded_img/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
    // header('location:../seller_product.php');
    $message[] = 'Product deleted successfully';
 }

?>
<?php
if(isset($message))
{
   $msg= implode(",",$message);
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