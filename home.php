
<html>
<head>
    <title>Upload Images</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
    <?php if(isset($_GET['error'])): ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif?>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="upload_image">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>    
</html>