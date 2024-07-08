<?php

include_once '../connection.php';

function get_productname($name)
{
    $conn = getconnection();
    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');
    return $select_product_name;
}

function add_product($name,$price,$image)
{
    $conn = getconnection();
    $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');
    return $add_product_query;
}


function update_product($update_name,$update_price,$update_p_id)
{
    $conn = getconnection();
    $update_product_query =mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

}


function update_productimage($update_image,$update_p_id)
{
    $conn = getconnection();
    $update_product_query =mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
 
}


function delete_product($delete_id)
{
    $conn = getconnection();
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
    return $delete_image_query;
}

?>