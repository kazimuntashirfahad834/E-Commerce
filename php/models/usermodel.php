<?php
include '../connection.php';
function login($email, $password)
{
    $con = getconnection();
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, md5($password));
    echo $email.'' .$password;
    $select_users= mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');
    return $select_users;
}

function checkusers($email, $password)
{
    $con = getconnection();
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, md5($password));
    echo $email.'' .$password;
    $select_users= mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');
    return $select_users;
}

function register($fname, $lname, $email, $pnumber, $address, $password, $cpassword,$user_type)
{   $conn = getconnection();
    $fname = mysqli_real_escape_string($conn,$fname);
    $lname = mysqli_real_escape_string($conn,$lname);
    $email = mysqli_real_escape_string($conn,$email);
    $pnumber = mysqli_real_escape_string($conn,$pnumber);
    $address = mysqli_real_escape_string($conn,$address);
    $password = mysqli_real_escape_string($conn,md5($password));
    $user_type = $_POST['user_type'];
    mysqli_query($conn,"INSERT INTO users(fname,lname,email,pnumber,address,password,user_type) VALUES('$fname','$lname','$email','$pnumber','$address','$password','$user_type')") or die('query failed');}
?>