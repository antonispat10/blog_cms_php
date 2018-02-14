<?php

    if(isset($_POST['create_user'])){
        
         
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
        
        
        
        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
        
        
//        // move_uploaded_file($post_image_temp, "../images/$post_image");
//        
        $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password)";
        
        //SOSSSS  post_image '{$post_image}'
        
        $query .= "VALUES ('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";
        
        $create_user_query = mysqli_query($connection, $query);
        
        confirmQuery($create_user_query);
        
        echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
        

    
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    
  <div>
        <label for="post_content">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" id="" cols="10" rows="5">
    </div>
    

    <div>
        <label for="post_content">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="" cols="10" rows="5">
    </div>
    
    <br>
    
    
      <div class="form-group">
        
        
        <select name="user_role" id="" class="form-control">
          
            <option value="select_options">Select Options</option> 
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>

            
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
        <input type="text" class="form-control" name="username" id="" cols="10" rows="5"></textarea>
    </div>
    

    <div>
        <label for="post_content">Email</label>
        <input type="text" class="form-control" name="user_email" id="" cols="10" rows="5"></textarea>
    </div>
    
    
    <div>
        <label for="post_content">Password</label>
        <input type="text" class="form-control" name="user_password" id="" cols="10" rows="5"></textarea>
    </div>
    
  
    
    
    <div class="form-group">
        
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
        
    </div>
    
</form>
    
    
