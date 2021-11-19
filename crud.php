<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD IMAGE</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white">CREATE, VIEW, UPDATE, DELETE IMAGES</h4>
                    </div>
                    <div class="card-body">
                        <?php
                            $conn = mysqli_connect('localhost', 'root','');
                            mysqli_select_db($conn, 'photo_album');
                            $query = "select * from images ";
                            $query_run = mysqli_query($conn, $query);

                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IMAGE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $row){
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['image_id']?></td>
                                                    <td>
                                                        <img src="<?php echo "uploads/".$row['image_url']?>" width="100px" height="100px" alt="image">
                                                    </td>
                                                    <td>
                                                        <a href="update.php?id=<?php echo $row['image_id']?>" class="btn btn-info">UPDATE</a>
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-danger">DELETE</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td>No Record Available</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>