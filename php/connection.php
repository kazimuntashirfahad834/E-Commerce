<?php

$conn = mysqli_connect('localhost','root','','dokan') or die('connection failed');
function getconnection(){
    $con = mysqli_connect('localhost','root','','dokan') or die('connection failed');
    return $con;
}

?>