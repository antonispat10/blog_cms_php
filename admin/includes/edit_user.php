<?php


if(isset($_GET['edit_user'])){
    
  $the_user_id = $_GET['edit_user'];
    
    

     $query = "SELECT * FROM users WHERE user_id = $the_user_id";
            $select_users_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_users_query)) {
                    $user_id = $row['user_id'];
                  echo   $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];
              }

?>
           
   <?php





    if(isset($_POST['edit_user'])){
        
         
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
        
        
        if(!empty($user_password)){
            $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
            
            $get_user_query = mysqli_query ($connection, $query);
            
            confirmQuery($get_user_query);  
            
            $row = mysqli_fetch_array($get_user_query);
            
            $db_user_password = $row['user_password'];
            
            if($db_user_password!= $user_password) {
                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
            }
            
            
            $query = "UPDATE users SET " ;
        $query .="user_firstname = '{$user_firstname}',";
        $query .="user_lastname = '{$user_lastname}',";
        $query .="user_role = '{$user_role}', ";
        $query .="username = '{$username}',";
        $query .="user_email = '{$user_email}',";
        $query .="user_password = '{$hashed_password}'";
        // $query .="post_image = '{$post_image}'";
        
        $query .="WHERE user_id = {$the_user_id}" ;
        
        $edit_user_query = mysqli_query($connection,$query);
        
        confirmQuery($edit_user_query);
            
            echo "User Updated" . " <a href='users.php'>View Users</a>";
            
        }
        
         
    
    }
    
     } else {
    
    header("Location: index.php");
    
}

?>

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
          
            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option> 
            
            
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
        
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
        
    </div>
    
</form>
    
    
