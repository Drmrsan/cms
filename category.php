<?php require "includes/db.php" ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php if (isset($_GET['category'])): ?>
                    <?php $post_category_id = $_GET['category']; ?>
                <?php endif ?>

                <?php $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id"; ?>
                <?php $posts = mysqli_query($connection, $query); ?>

                <?php while ($row = mysqli_fetch_assoc($posts)) : ?>
                   <?php
                        $post_id = $row['post_id']; 
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content']; 
                    ?>

                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?= $post_id; ?>"><?= $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?= $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post_date; ?> at 10:00 PM</p>
                    <hr>
                    <img class="img-responsive" src="images/<?= $post_image; ?>" alt="">
                    <hr>
                    <p><?= $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                <?php endwhile; ?>

            </div>

            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>