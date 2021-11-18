<?php
session_start();
header('location:login.php');

$conn = mysqli_connect('localhost', 'root','');
mysqli_select_db($conn, 'photo_album');
$name = $_POST['user'];
$password = $_POST['password'];

$s = "select * from register where name = '$name'";

$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    echo "Username already taken!";
}else{
    $reg = "insert into register(name, password) values ('$name','$password')";
    mysqli_query($conn, $reg);
    echo "Successfully registered!";
}
?>