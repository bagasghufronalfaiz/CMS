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
                            <i class="fa fa-file"></i> Posts
                        </li>
                    </ol>
                </div>
                <div class="col-lg-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM posts";
                            $selet_all_post = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($selet_all_post)){
                                $post_id = $row['post_id'];
                                $post_category_id = $row['post_category_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_status = $row['post_status'];
                            ?>
                            <tr>
                                <td><?php echo $post_id; ?></td>
                                <td><?php echo $post_category_id; ?></td>
                                <td><?php echo $post_title; ?></td>
                                <td><?php echo $post_author; ?></td>
                                <td><?php echo $post_date; ?></td>
                                <td><img class="img-responsive" src="../images/<?php echo $post_image ?>" alt=""></td>
                                <td><?php echo $post_content; ?></td>
                                <td><?php echo $post_tags; ?></td>
                                <td><?php echo $post_comment_count; ?></td>
                                <td><?php echo $post_status; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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