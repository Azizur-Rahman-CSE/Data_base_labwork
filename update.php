
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
        
        <div >
            <div class="row">
                <div class="col-md-10">
                    <div >
                        <div >
                            <h4> Flower Information </h4>
                        </div>
                        <div >
                          <?php
                         $con = mysqli_connect('localhost','root','','flower');
                        $id=$_GET['id'];
                        $sql="SELECT * FROM flower_table  WHERE id='$id' ";
                        $result=mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0)
                        {
                            foreach ($result as $row)
                            {
                                ?>

                               <form action="code.php" method="POST"enctype="multipart/form-data">
                                <div class="row">
                                <div 
                                    class="col-md-.5">
                                </div>
                                <div class="col-md-3">
                                    <input type="hidden" name="t_id" value="<?php echo $row['id']; ?>">

                                    <!--.............. Flower Name ................-->
                                    <div class="form-group">
                                        <label for="">F Name</label>
                                        <input type="text" name="f_name" value="<?php echo $row['f_name']; ?>" required class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-3">
                                   
                                    <!--.............. Flower Scientific Name ................-->
                                    <div class="form-group">
                                        <label for="">F Scientific Name</label>
                                        <input type="text" name="f_scientific_name" value="<?php echo $row['f_scientific_name']; ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   
                                    <!--.............. Flower vacation Name ................-->
                                    <div class="form-group">
                                        <label for="">F Vacation </label>
                                        <input type="text" name="f_vacation" value="<?php echo $row['f_vacation']; ?>" required class="form-control">
                                    </div>
                                </div>
                    </div>
                    <div class="row">
                                <div 
                                    class="col-md-.5">
                                </div>
                               <div class="col-md-3">
                                   
                                   <!--.............. Flower color ................-->
                                   <div class="form-group">
                                       <label for="">Types of Color</label>
                                       <input type="text" name="f_color" value="<?php echo $row['f_color']; ?>" required class="form-control" >
                                   </div>
                               </div>
                                                        <!--.............. Flower Picture ................-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">f Picture</label>
                                                        <input type="file" name="f_picture"      class="form-control" >
                                                        <input type="hidden" name="f_picture_old"  value="<?php echo $row['f_picture']; ?>">
                                                    </div>
                                         </div>
                    </div>
                                    
                                    <img src="<?php echo "Images/".$row['f_picture'];?>"width="100px">
                                    <!--.............. Submit Data ................-->

                                    <div class="form-group">
                                        <div 
                                            class="col-md-3">
                                        </div>
                                        <button type="submit" name="update" required class="btn btn-success ">Update </button>
                                        <a href="index.php" class="btn btn-info ">Back</a>
                                    </div>
                            </form>
                               <?php

                            }
                          }
                          else 
                          {
                            echo "No Record Available";
                          }
                          ?>
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
