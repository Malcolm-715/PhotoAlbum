<?php
$conn = mysqli_connect('localhost', 'root','');
mysqli_select_db($conn, 'photo_album');

if(!$conn){
    echo "Connection failed!";
    exit();
}
?>