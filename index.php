<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

       <!--  Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Flower Information</title>
       
    </head>

    <body>
    
    <div class="container  mt-5">
        <div class="row ">
            <div >
                <div >
                    <div>
                         
                    <h4>
                        Flower Information
                    </h4>
                    <a class="btn btn-success" href="create.php">Add New Flower</a>
                    </div>
                    <div class="card-body">
                    <?php 
                    $con = mysqli_connect('localhost','root','','flower');
                    $sql = "SELECT * FROM flower_table ";
                    $result=mysqli_query($con,$sql);
                    ?>
                        <table class="table ">
                            <thead>
                            <tr class="text-pascalcase">
                                
                                <th>Name</th>
                                <th>Scientific Name</th>
                                <th>Vacation</th>
                               
                                <th>Color</th>
                                <th>Picture_Name</th>
                                
                                <th>Picture</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(mysqli_num_rows($result)>0)
                                {
                                        foreach ($result as $row) 
                                        {
                                            ?>
                                            <tr>
                                               
                                                <td><?php echo $row['f_name']; ?></td>
                                                <td><?php echo $row['f_scientific_name']; ?></td>
                                                <td><?php echo $row['f_vacation']; ?></td>                                                
                                                <td><?php echo $row['f_color']; ?></td>
                                                <td><?php echo $row['f_picture']; ?></td>
                                                
                                                

                                                <td>
                                                    <img src=<?php echo  "Images/".$row['f_picture']; ?> width="50px"height="60px" alt="Image">
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item " href="update.php? id=<?php echo $row['id']; ?>">Update</a></li>
                                                         
                                                            
                                                            
                                                             <form action="delete.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                                <input type="hidden" name="delete_t_picture" value="<?php echo $row['f_picture']; ?>">
                                                                <button type ="submit" name="delete" class="btn btn-danger">Delete </button>
                                                                
                                                            </form>
                                                                       
                                                        </ul>
                                                        </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                }
                                else
                                {
                                    ?>
                                    <th >
                                        <td style="text-align:center; color:red">
                                           !.......No  Record Available.......!
                                        </td>
                                    </th>

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js">     </script>


    </body>
</html>
