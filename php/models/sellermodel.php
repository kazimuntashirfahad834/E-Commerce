<?php
include_once '../connection.php';
function get_selectpending()
{
    $conn = getconnection();
    $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
    return $select_pending;
}

function get_selectcompleted()
{
    $conn = getconnection();
    $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
    return $select_completed;
}    

function get_selectorder()
{
    $conn = getconnection();
    $select_order = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
    return $select_order;
}    

function get_selectproduct()
{
    $conn = getconnection();
    $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
    return $select_product;
}

function get_selectmessage()
{
    $conn = getconnection();
    $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
    return $select_message;
}

function get_updateproduct($update_id)
{
    $conn = getconnection();
    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
    return $select_products; 
}


function get_select_orders()
{
    $conn = getconnection();
    $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
    return $select_orders; 
}
?>
