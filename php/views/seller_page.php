<?php

// include 'connection.php';
include '../models/sellermodel.php';
session_start();

$seller_id = $_SESSION['seller_id'];

if(!isset($seller_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Seller Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../../css/admin_style.css">

</head>
<body>
   
<?php include 'seller_header.php'; ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">Dashboard</h1>

   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pending = get_selectpending();
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3>$<?php echo $total_pendings; ?>/-</h3>
         <p>Total pendings</p>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $select_completed = get_selectcompleted();
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3>$<?php echo $total_completed; ?>/-</h3>
         <p>Completed payments</p>
      </div>

      <div class="box">
         <?php 
            $select_orders =  get_selectorder();
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Order placed</p>
      </div>

      <div class="box">
         <?php 
            $select_products = get_selectproduct();
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>Products added</p>
      </div>

      

      <div class="box">
         <?php 
            $select_messages = get_selectmessage();
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>New messages</p>
      </div>

   </div>

</section>

<!-- seller dashboard section ends -->



<?php include 'seller_footer.php'; ?>

<!-- custom admin js file link  -->
<script src="../../js/admin_script.js"></script>

</body>
</html>