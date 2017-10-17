<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php 
            $query = "SELECT * FROM comments";
            $comments = mysqli_query($connection, $query);
        ?>

        <?php while($row = mysqli_fetch_assoc($comments)) : ?>
            <?php 
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_content = $row['comment_content'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
            ?>  
        
        <tr>
            <td><?= $comment_id; ?></td>
            <td><?= $comment_author; ?></td>
            <td><?= $comment_content; ?></td>

           <?php 
                // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                // $categories = mysqli_query($connection, $query);
                
                // while($row = mysqli_fetch_assoc($categories)) {
                //       $cat_id = $row['cat_id'];
                //       $cat_title = $row['cat_title'];
                //       echo "<td>{$cat_title}</td>";
                // }
            ?>
            
            
            <td><?= $comment_email; ?></td>
            <td><?= $comment_status; ?></td>
            <td>Some title</td>
            <td><?= $comment_date; ?></td>
            <td><a href="posts.php?source=edit_post&pid=<?= $post_id; ?>">Approve</a></td>            
            <td><a href="posts.php?delete=<?= $post_id; ?>">Unapprove</a></td>        
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