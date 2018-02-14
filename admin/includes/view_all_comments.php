 <?php

if(isset($_POST['checkBoxArray'])){
    
   foreach($_POST['checkBoxArray'] as $postValueId){

       $bulk_options = $_POST['bulk_options'];
   
       switch($bulk_options){
           case 'published':
               
               $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
               
               $update_to_published_status =  mysqli_query($connection, $query);
               
               break;
       
       
      
           case 'draft':
               
               $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
               
               $update_to_draft_status =  mysqli_query($connection, $query);
               
               break;
               
               
               
       
       
       
           case 'delete':
               
               $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
               
               $update_to_delete_status =  mysqli_query($connection, $query);
               
               break;
               
               
            case 'clone':
               
               $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
               
               $select_post_query =  mysqli_query($connection, $query);
               
               while ($row = mysqli_fetch_array($select_post_query)){
                   
                   $post_title = $row['post_title'];
                   $post_category_id = $row['post_category_id'];
                   $post_date = $row['post_date'];
                   $post_author = $row['post_author'];
            //       $post_image = $row['post_image'];
                   $post_tags = $row['post_tags'];
                   $post_content = $row['post_content'];
                   $post_status = $row['post_status'];
               }
               
               $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_content, post_tags, post_status) ";
               
               $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}', now(), '{$post_content}', '{$post_tags}', '{$post_status}') ";
               $copy_query = mysqli_query($connection, $query);
               
               if(!$copy_query) {
                   
                   die("Query Failed" . mysqli_error($connection));
                   
               }
               
               break;
               
               
           }    
       
       
       
   }
    
}



?>  
                           
                                               

                           <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                   <th> --</th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                              <th>In Response to</th>-->
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                       
                        
                       
                        
                        <?php
                        
                        $query = "SELECT * FROM comments";
            $select_comments = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_comments)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_email = $row['comment_email'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                 
                echo "<tr>";
                 echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id  ?>'></td>" ;
                echo "<td>$comment_id</td>" ;     
                echo "<td>$comment_author</td>" ; 
                echo "<td>$comment_content</td>" ; 
                
//               echo "<td>να διαγραψωω </td>";
//                
//                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//                
//            $select_categories_id = mysqli_query($connection, $query);
//                
//                
//
//                    while($row = mysqli_fetch_assoc($select_categories_id)) {
//                        $cat_id = $row['cat_id'];
//                        $cat_title = $row['cat_title'];
//                             
//                
//                echo "<td> ss{$cat_title}</td>" ; 
//               
//                            
//                            }
                
                echo "<td>$comment_email</td>" ; 
                echo "<td>$comment_status</td>" ; 
                
                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                
                $select_post_id_query = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_post_id_query)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    
                    
                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                    
                }
                
                
                
                
                
                
                
                echo "<td>$comment_date</td>" ;
            
                echo "<td><a href='comments.php?approve=$comment_id'>Approve</td>" ; 
                
                echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</td>" ; 
                 
                echo "<td><a href='comments.php?delete=$comment_id'>Delete</td>" ; 
                
               echo "</tr>";
                
            }
                        ?>
                        
                         </table>
                         
                        
                <?php 

                
                if (isset($_GET['delete'])){
                    
                    $the_comment_id = $_GET['delete'];
                    
                    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
                    $delete_query = mysqli_query($connection,$query);
                    
                    header("Location : comments.php");
                    
                }


                if (isset($_GET['approve'])){
                    
                    $the_comment_id = $_GET['approve'];
                    
                    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
                    $approve_comment_query = mysqli_query($connection,$query);
                    header("Location:comments.php");
                        
                    
                }



                if (isset($_GET['unapprove'])){
                    
                    $the_comment_id = $_GET['unapproved'];
                    
                    $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = $the_comment_id";
                    $unapprove_comment_query = mysqli_query($connection,$query);
                    header("Location:comments.php");
                        
                    
                }
                    
            


                ?>
                  