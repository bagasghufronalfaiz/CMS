<?php include "includes/admin_header.php"; ?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories</h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Categories
                        </li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    <?php
                    if(isset($_POST['submit'])){
                        $cat_title = $_POST['cat_title'];
                        $query = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";
                        
                        if($cat_title =="" || empty($cat_title)){
                            ?><h4><?php echo "This field cannot be empty" ?></h4><?php
                        } else {
                            $add_category_query = mysqli_query($conn, $query);
                        }
                    }
                    ?>
                    <h3>Add New Category</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="cat_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Add New">
                        </div>
                    </form>    
                </div>
                <div class="col-lg-6">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT * FROM categories";
                            $select_all_admin_categories_query = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($select_all_admin_categories_query)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            ?>
                            <tr>
                                <td><?php echo $cat_id; ?></td>
                                <td><?php echo $cat_title; ?></td>
                                <td>  
                                    <form method="post" action="">
                                    <input type="submit" name="delete" class="btn btn-primary" value="Delete">
                                    </form>
                                    
                                </td>
                                <td>  
                                    <form method="post" action="">
                                    <input type="hidden" value="<?php echo $cat_id; ?>" name="edit_cat_id">
                                    <input type="submit" name="edit" class="btn btn-primary" value="Edit">
                                    </form>
                                    
                                </td>
                            <?php
                            }                    
                            if(isset($_POST['delete'])){
                            $query_delete_category = "DELETE FROM categories WHERE cat_id=$cat_id";
                            $delete_category = mysqli_query($conn, $query_delete_category);
                            header("Location: categories.php");
                            }
                            ?>
                                
                            </tr>                            
                            
                        </tbody>
                    </table>
                </div> 
                <div class="col-lg-12">
                <h3>Edit Category</h3>
<form action="" method="post">
    <div class="form-group">
        <?php
        if(isset($_POST['edit'])){
            $edit_cat_id = $_POST['edit_cat_id'];            
            $query_edit_category = "SELECT * FROM categories WHERE cat_id = $edit_cat_id";
            $select_categories_edit = mysqli_query($conn, $query_edit_category);
            while($row = mysqli_fetch_assoc($select_categories_edit)){
                $edit_cat_id = $row['cat_id'];
                $edit_cat_title = $row['cat_title'];
        ?>
        <input value="<?php echo $edit_cat_id; ?>" type="hidden" name="cat_id">
        <input value="<?php if(isset($cat_title)){echo $edit_cat_title;} ?>" type="text" name="cat_title" class="form-control">
        <?php
                
            }
        }
        ?>
        
        
    </div>
    <div class="form-group">
        <input type="submit" name="update_category" class="btn btn-primary" value="Update Category">
        <?php
        if(isset($_POST['update_category'])){
            $the_cat_title = $_POST['cat_title'];
            $the_cat_id = $_POST['cat_id'];
            $query_update_category = "UPDATE categories SET cat_title = '{$the_cat_title}'  WHERE cat_id = {$the_cat_id} ";
            $update_category = mysqli_query($conn, $query_update_category);
            if(!$update_category){
                die("Query Failed" . mysqli_error($conn));
            }
        }
        ?>
    </div>
</form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin_footer.php"; ?>