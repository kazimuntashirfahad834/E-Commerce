<?php
// include '../connection.php';
include '../models/sellermodel2.php';

session_start();

$seller_id = $_SESSION['seller_id'];

if(!isset($seller_id)){
   header('location:../login.php');
};

if(isset($_POST['update_product'])){

$update_p_id = $_POST['update_p_id'];
$update_name = $_POST['update_name'];
$update_price = $_POST['update_price'];

update_product($update_name,$update_price,$update_p_id);

$update_image = $_FILES['update_image']['name'];
$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
$update_image_size = $_FILES['update_image']['size'];
$update_folder = '../../uploaded_img/'.$update_image;
$update_old_image = $_POST['update_old_image'];

if(!empty($update_image)){
   if($update_image_size > 2000000){
      $message[] = 'Image file size is too large';
   }else{
      update_productimage($update_image,$update_p_id);
      move_uploaded_file($update_image_tmp_name, $update_folder);
      unlink('../../uploaded_img/'.$update_old_image);
   }
}

// header('location:../seller_product.php');
$message[] = 'Product Updated successfully';
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
