<?php

include '../connection.php';
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
   <title>Orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../../css/admin_style.css">

</head>
<body>
   
<?php include 'seller_header.php'; ?>

<section class="orders">

   <h1 class="title">Placed orders</h1>

   <div class="box-container">
      <?php
      $select_orders = get_select_orders();
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> User id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
         <p> Placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Phone number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> E-mail : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> Total products : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> Total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> Payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <form action="../controllers/controlUpdateOrder.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_payment">
               <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
               <option value="pending">Pending</option>
               <option value="completed">Completed</option>
            </select>
            <input type="submit" value="Update" name="update_order" class="option-btn">
            <a href="../controllers/controlDeletorder.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Delete this order?');" class="delete-btn">Delete</a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">No orders placed yet!</p>';
      }
      ?>
   </div>

</section>

<?php include 'seller_footer.php'; ?>

<!-- custom admin js file link  -->
<script src="../../js/admin_script.js"></script>

</body>
</html>