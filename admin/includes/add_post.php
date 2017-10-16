<?php  

if (isset($_POST['create_post'])) {
	
	$post_title         = $_POST['post_title'];
	$post_author        = $_POST['post_author'];
	$post_category_id   = $_POST['post_category_id'];
	$post_status        = $_POST['post_status'];
	$post_image         = $_FILES['post_image']['name'];
	$post_image_temp    = $_FILES['post_image']['tmp_name'];
	$post_tags          = $_POST['post_tags'];
	$post_content       = $_POST['post_content'];
	$post_date          = date('d-m-y');
	$post_comment_count = 4;


	move_uploaded_file($post_image_temp, "images/$post_image");

	$query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
	$query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";

	$add_post = mysqli_query($connection, $query);

	if(!$add_post){
		die("Query failed. " . mysqli_error($connection));
	}
}

?>


<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Post title</label>
		<input type="text" class="form-control" name="post_title">
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
		<input type="text" class="form-control" name="post_author">
	</div>
	<div class="form-group">
		<label for="">Post status</label>
		<input type="text" class="form-control" name="post_status">
	</div>
	<div class="form-group">
		<label for="">Post image</label>
		<input type="file" name="post_image">
	</div>
	<div class="form-group">
		<label for="">Post tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>
	<div class="form-group">
		<label for="">Post date</label>
		<input type="text" class="form-control" name="post_date">
	</div>
	<div class="form-group">
		<label for="">Post content</label>
		<textarea class="form-control" name="post_content"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="form-control btn btn-success" name="create_post" value="Add post">
	</div>
</form>