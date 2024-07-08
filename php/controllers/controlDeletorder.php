<?php
include '../connection.php';
include '../models/ordermodel.php';

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   get_orderdelet($delete_id);
   header('location:../views/seller_orders.php');
}
?>