<?php
if(isset($_POST['submit']) && isset($_FILES['upload_image'])){
    include "uploadDB.php";
    echo "<pre>";
    print_r($_FILES['upload_image']);
    echo "</pre>";

    $image_name = $_FILES['upload_image']['name'];
    $image_size = $_FILES['upload_image']['size'];
    $tmp_name = $_FILES['upload_image']['tmp_name'];
    $error = $_FILES['upload_image']['error'];

    if($error === 0){
        if($image_size > 250000){
            $em = "Sorry, the file is too large!";
            header("location:home.php?error=$em");
        }else{
            $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_ex_lc = strtolower($image_ex);
            $allowed_exs = array("jpg","jpeg","png");

            if(in_array($image_ex_lc, $allowed_exs)){
                $new_image_name = uniqid("IMG-", true).'.'.$image_ex_lc;
                $image_upload_path = 'uploads/'.$new_image_name;
                move_uploaded_file($tmp_name, $image_upload_path);
                //insert into DB
                $sql = "insert into images(image_url) values('$new_image_name')";
                mysqli_query($conn, $sql);
                header("location: display.php");
            }else{
                $em = "You can't upload files of this type!";
                header("location:home.php?error=$em"); 
            }
        }
    }else{
        $em = "Unknown error occured!";
        header("location:home.php?error=$em");
    }    
}else{
    header("location:home.php");
}
?>
