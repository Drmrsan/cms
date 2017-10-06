<?php  

if (isset($_POST['create_post'])) {
	
	$post_title = $_POST['post_title'];
	$post_author = $_POST['post_author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];
	$post_image = $_FILES['post_image']['name'];
	$post_image_temp = $_FILES['post_image']['tmp_name'];
	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y');
	$post_comment_count = 4;


	move_uploaded_file($post_image_temp, "images/$post_image");
}

?>


<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Post title</label>
		<input type="text" class="form-control" name="post_title">
	</div>
	<div class="form-group">
		<label for="">Post category ID</label>
		<input type="text" class="form-control" name="post_category_id">
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