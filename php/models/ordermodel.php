<?php

include_once '../connection.php';

mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');

function get_orderupdate($update_payment,$order_update_id)
{
    $conn = getconnection();
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');

}


function get_orderdelet($delete_id)
{
    $conn = getconnection();
    mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');

}

?>