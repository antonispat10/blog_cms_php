 <?php ob_start(); ?>
    <?php include "includes/admin_header.php"; ?>
    

    <div id="wrapper">



<?php include "includes/admin_navigation.php"; ?>

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
                        
                    <div class="col-xs-6">
                        <form action="" method="post">
                        
                         <div class="form-group">
                            <label for="cat-title">Add Category</label>
                             <input type="text" class="form-control" name="cat_title">
                         </div>
                            <div class="form-group">
                             <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                         </div>
                         
                        
                        </form>
                        
                        
                         <?php insert_categories();   ?>
                        
                        </div>
                        
                        
                        <div class="col-xs-6">
                        
                       
                        
                        
                        
                        
                        <?php   updateCategories();  ?>
                        
                        
                        </div>
                        
                        <div class="col-xs-6">
                        
                   
                       
                        
                        <table class="table table-bordered hovered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php 
                                
//                            find all Categories
                                
               findAllCategories();  

                        ?>
                              
                              
                              <?php deleteCategories()   ?>
                             
                             
                              
                              
                              
                               
                        
                               
                               
                                
                            </tbody>
                        </table>
                        
                        
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>
