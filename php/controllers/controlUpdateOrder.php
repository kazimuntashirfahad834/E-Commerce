<?php
include '../connection.php';
include '../models/ordermodel.php';

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   get_orderupdate($update_payment,$order_update_id);
   $message[] = 'Payment status has been updated!';
    header('location:../views/seller_orders.php');
}



?>