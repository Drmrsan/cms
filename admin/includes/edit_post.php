<?php 
	
	if (isset($_GET['pid'])) {
		$pid = $_GET['pid'];
	}

    $query = "SELECT * FROM posts WHERE post_id = $pid";
    $select_post_by_id = mysqli_query($connection, $query);
?>

<?php while($row = mysqli_fetch_assoc($select_post_by_id)) : ?>
    <?php 
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    ?>
<?php endwhile; ?>

<?php 

if (isset($_POST['update_post'])) {
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_date = $_POST['post_date'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "images/$post_image");


    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', post_author = '{$post_author}', post_category_id = '{$post_category_id}', ";
    $query .= "post_image = '{$post_image}', post_content = '{$post_content}', post_tags = '{$post_tags}', ";
    $query .= "post_status = '{$post_status}', post_date = now() ";
    $query .= "WHERE post_id = {$pid}";


	$update_post = mysqli_query($connection, $query);

	if (empty($post_image)) {
		$query = "SELECT * FROM posts WHERE post_id = $pid ";
		$select_image_from_edit = mysqli_query($connection, $query);

		while ($row = mysqli_fetch_assoc($select_image_from_edit)) {
			$post_image = $row['post_image'];
		}
	}

	if(!$update_post){
		die("Query failed. " . mysqli_error($connection));
	}
}

 ?>


<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Post title</label>
		<input type="text" class="form-control" value="<?= $post_title; ?>" name="post_title" >
	</div>
	<div class="form-group">
		<select name="post_category_id" id="">
			<?php 
				$query = "SELECT * FROM categories";
                $categories= mysqli_query($connection, $query);
            ?>
            
            
	        <?php while($row = mysqli_fetch_assoc($categories)) : ?>
	            <?php $cat_id = $row['cat_id'];
	                  $cat_title = $row['cat_title'];
				?>
				<option value="<?= $cat_id; ?>"><?= $cat_title; ?></option>
			<?php endwhile; ?>
		</select>

	</div>
	<div class="form-group">
		<label for="">Post author</label>
		<input type="text" class="form-control" value="<?= $post_author; ?>" name="post_author">
	</div>
	<div class="form-group">
		<label for="">Post status</label>
		<input type="text" class="form-control" value="<?= $post_status; ?>" name="post_status">
	</div>
	<div class="form-group">
		<img src="images/<?= $post_image; ?>" alt="image" width="100">
		<input type="file" name="post_image">
	</div>
	<div class="form-group">
		<label for="">Post tags</label>
		<input type="text" class="form-control" value="<?= $post_tags; ?>" name="post_tags">
	</div>
	<div class="form-group">
		<label for="">Post date</label>
		<input type="text" class="form-control" name="post_date">
	</div>
	<div class="form-group">
		<label for="">Post content</label>
		<textarea class="form-control" name="post_content" rows="10">
			<?= $post_content; ?>
		</textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="form-control btn btn-success" name="update_post" value="Edit post">
	</div>
</form>