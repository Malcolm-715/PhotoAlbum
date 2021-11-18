<?php
session_start();

$conn = mysqli_connect('localhost', 'root','');
mysqli_select_db($conn, 'photo_album');
$name = $_POST['user'];
$password = $_POST['password'];

$s = "select * from register where name = '$name' && password = '$password'";

$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    header('location:home.php');
}else{
    header('location:login.php');
}
?>