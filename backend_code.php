<?php
session_start();  

$con =mysqli_connect('localhost','root','','flower');

// Insert Perform
if(isset($_POST['submit']))
{
    $name              =$_POST['f_name'];
    $scientificname    =$_POST['f_scientific_name'];
    
  
    
    $vacation               =$_POST['f_vacation'];
    $color                 =$_POST['f_color'];

    $image             =$_FILES['f_picture']['name'];
 

    $allowed_extension =array('jpg','png','jpeg');
    $filename=$_FILES['f_picture']['name'];
    $file_extension=pathinfo($filename,PATHINFO_EXTENSION);
    if(!in_array( $file_extension,$allowed_extension))
    {
      $_SESSION['status']="You are not allowed this image format";
      header('location:create.php');
    }
    else 
    {

        if(file_exists("Images/".$_FILES['f_picture']['name']))
        {
          $filename=$_FILES['f_picture']['name'];
          $_SESSION['status']="Image Has Already Exists ....!!".$filename;
          header('location:create.php');
        }
        else
        {
              $query ="INSERT INTO flower_table (f_name,f_scientific_name,f_vacation,f_color,f_picture)
              values('$name','$scientificname','$vacation','$color','$image')";
              $result=mysqli_query($con,$query);
              if($result)
              {
                move_uploaded_file($_FILES['f_picture']['tmp_name'],"Images/". $_FILES['f_picture']['name']);
                $_SESSION['status']="Image Inserted Successfully.";
               header('location:index.php');
              }
              else 
              {
                $_SESSION['status']="Image  Not Inserted...!";
                header('location:create.php');
              }
        }
   }
}



//Update Perform 

if(isset($_POST['update']))
{
          $t_id        =$_POST['t_id'];


          $name              =$_POST['f_name'];
          $scientificname    =$_POST['f_scientific_name'];
          
        
          
          $vacation               =$_POST['f_vacation'];
          $color                 =$_POST['f_color'];
          $new_image         =$_FILES['f_picture']['name'];
         

          $old_image         =$_POST['f_picture_old'];

          if($new_image !='')
          {
            $update_filename=$new_image;
          }
          else 
          {
            $update_filename=$old_image;
          }

          if($_FILES['f_picture']['name']!='')
          {
                if(file_exists("Images/".$_FILES['f_picture']['name']))
              {
                    $filename=$_FILES['f_picture']['name'];
                    $_SESSION['status']="Image Has Already Exists ....!!".$filename;
                    header('location:index.php');
              }
              else
                {
                    
                        $query="UPDATE flower_table SET f_name='$name',f_scientific_name='$scientificname',f_vacation='$vacation',f_color='$color', f_picture='$update_filename' where id='$t_id' ";
                        $result=mysqli_query($con,$query);
                           
                }
          }
        else
        {
            
            $query="UPDATE flower_table SET f_name='$name',f_scientific_name='$scientificname',f_vacation='$vacation',f_color='$color', f_picture='$update_filename' where id='$t_id' ";
            $result=mysqli_query($con,$query);
                if($result)
                {
                    if($_FILES['f_picture']['name']!='')
                    {
                      move_uploaded_file($_FILES['f_picture']['tmp_name'],"Images/".$_FILES['f_picture']['name']);
                      unlink("Images/".$old_image);
                    }
                    $_SESSION['status']="Data Updated Successfully...";
                    header('location:index.php');
                }
                else 
                {
                  $_SESSION['status']= "Data Not Updated...!";
                  header('location:index.php');
                } 
              }

}


  
 ?>
