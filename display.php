<?php include "uploadDB.php";?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="display.css">
    <title>Display</title>
</head>
<body>
    <a href="home.php">&#8592</a>
    <?php
        $sql = "select * from images order by image_id desc";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            while($images = mysqli_fetch_assoc($res)){ ?>
                <div class="alb">
                    <img src="uploads/<?=$images['image_url']?>">
                </div>
    <?php } }?>
</body>    
</html>