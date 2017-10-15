<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>

        <?php 
            $query = "SELECT * FROM posts";
            $posts = mysqli_query($connection, $query);
        ?>

        <?php while($row = mysqli_fetch_assoc($posts)) : ?>
            <?php 
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comments = $row['post_comment_count'];
                $post_date = $row['post_date'];
            ?>  
        
        <tr>
            <td><?= $post_id; ?></td>
            <td><?= $post_author; ?></td>
            <td><?= $post_title; ?></td>

            <?php 
                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                $categories = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($categories)) {
                      $cat_id = $row['cat_id'];
                      $cat_title = $row['cat_title'];
                      echo "<td>{$cat_title}</td>";
                }
            ?>
            
            
            <td><?= $post_status; ?></td>
            <td><img src="images/<?= $post_image; ?>" alt="image" width="100"></td>
            <td><?= $post_tags; ?></td>
            <td><?= $post_comments; ?></td>
            <td><?= $post_date; ?></td>
            <td><a href="posts.php?source=edit_post&pid=<?= $post_id; ?>">Edit</a></td>            
            <td><a href="posts.php?delete=<?= $post_id; ?>">Delete</a></td>
        </tr>

        <?php endwhile; ?>
    </tbody>

    <?php if (isset($_GET['delete'])): ?>
        <?php 
            $delete_post_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";
            $delete_post = mysqli_query($connection, $query);
        ?>
    <?php endif ?>


</table>