<?php ob_start(); ?>
<?php include "includes/admin_header.php" ?>

<?php 
    
    if(isset($_SESSION['username'])){
        
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        
        $select_user_profile_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_array($select_user_profile_query)) {
    
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];
            
            
        }
        
        
    }
    
?>
   
   <?php

    
    if(isset($_GET['edit_user'])){
    
  $the_user_id = $_GET['edit_user'];
    
    }

   


    if(isset($_POST['edit_user'])){
        
         echo "1";
                    $user_firstname = $_POST['user_firstname'];
                    $user_lastname = $_POST['user_lastname'];
                    $user_role = $_POST['user_role'];
                    
                  //  $post_image = $_POST['image']['name'];
       // $post_image_temp = $_FILES['image']['tmp_name'];
        
        
                    $username = $_POST['username'];
                    $user_email = $_POST['user_email'];
                    $user_password = $_POST['user_password'];
                    $post_date = date('d-m-y');
//        $post_comment_count = 4;
        
        
//        // move_uploaded_file($post_image_temp, "../images/$post_image");
//        
         $query = "UPDATE users SET " ;
        $query .="user_firstname = '{$user_firstname}',";
        $query .="user_lastname = '{$user_lastname}',";
        $query .="user_role = '{$user_role}', ";
        $query .="username = '{$username}',";
        $query .="user_email = '{$user_email}',";
        $query .="user_password = '{$user_password}'";
        // $query .="post_image = '{$post_image}'";
        
        $query .="WHERE username = '{$username}'" ;
        
        $edit_user_query = mysqli_query($connection,$query);
        
        confirmQuery($edit_user_query);
    
    }
    
     



    ?>
   

    <div id="wrapper">



<?php include "includes/admin_navigation.php" ?>

<!--       Navigation -->
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                           <form action="" method="post" enctype="multipart/form-data">
    
  <div>
        <label for="post_content">Firstname</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname" id="" cols="10" rows="5">
    </div>
    
    
    

    <div>
        <label for="post_content">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>" id="" cols="10" rows="5">
    </div>
    
    <br>
    
    
      <div class="form-group">
        
        
        <select name="user_role" id="" class="form-control">
          
            <option value=""><?php echo $user_role ?></option> 
            
            
            <?php
            
            if($user_role == 'admin'){
                
              echo  "<option value='subscriber'>Subscriber</option>";
                
            } else {
                
                echo "<option value='admin'>Admin</option>";
            }
            
            ?>
            
            
            
            

            
        </select>
    </div>
    
<!--
    <div class="form-group>
        <label for="post-image">Post Image</label>
        <input type="file" name="image">
    </div>
-->
    
    <div>
        <label for="post_content">Username</label>
        <input type="text" class="form-control" value="<?php echo $username; ?>" name="username" id="" cols="10" rows="5">
    </div>
    
    

    <div>
        <label for="post_content">Email</label>
        <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email" id="" cols="10" rows="5">
    </div>
    
    
    <div>
        <label for="post_content">Password</label>
        <input type="password" class="form-control"  name="user_password" value="<?php echo $user_password; ?>" id="" cols="10" rows="5">
    </div>
    
  
    
    
    <div class="form-group">
        
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
        
    </div>
    
</form>
                                 
                        
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>
