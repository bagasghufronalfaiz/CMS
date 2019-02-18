<h3>Edit Category</h3>
<form action="" method="post">
    <div class="form-group">
        <?php
        if(isset($_POST['edit'])){
            $cat_id = $_POST['cat_id'];
            $query_edit_category = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_edit = mysqli_query($conn, $query_edit_category);
            while($row = mysqli_fetch_assoc($select_categories_edit)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
        ?>
        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" name="cat_title" class="form-control">
        <?php
                
            }
        }
        ?>
        <?php
        if(isset($_POST['update_category'])){
            $the_cat_title = $_POST['cat_title'];
            $query_update_category = "UPDATE categories SET cat_title = $the_cat_title  WHERE cat_id=$cat_id";
            $update_category = mysqli_query($conn, $query_update_category);
        }
        ?>
        
    </div>
    <div class="form-group">
        <input type="submit" name="update_category" class="btn btn-primary" value="Update Category">
    </div>
</form>