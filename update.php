<?php
    //echo $id = ;
?>

<html>
<head>
    <title>Update Images</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
    <?php
          $conn = mysqli_connect('localhost', 'root','');
          mysqli_select_db($conn, 'photo_album');
          $id = $_GET['id'];
          $query = "select * from images where image_id = '$id'";
          $query_run = mysqli_query($conn, $query);

          if(mysqli_num_rows($query_run) > 0){
              foreach($query_run as $row){
                  ?>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="upload_image"<?php echo $row['image_id'];?>>
                        <input type="submit" name="submit" value="Update">
                    </form>
                   <?php
                }
            }else{
              echo "No image available!";
            }

    ?>
</body>    
</html>