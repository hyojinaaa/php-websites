<?php 

  $this->layout('master', [
      'title'=>'Edit Post',
      'desc'=>'Edit your post'
    ]);

?>

<h1>Edit post: <?= $this->e($originalTitle) ?></h1>

<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
	
	<div>
		<label for="title">Title: </label>
		<input type="text" id="title" name="title" value="<?= $post['title'] ?>">
		<?= isset($titleError) ? $titleError : '' ?>
	</div>

	<div>
		<label for="desc">Description: </label>
		<textarea id="desc" name="description"><?= $post['desc'] ?></textarea>
		<?= isset($descError) ? $descError : '' ?>
	</div>

	<img src="img/uploads/stream/<?= $post['image'] ?>" alt="">

	<input type="file" name="image">

	<input type="submit" name="edit-post">

</form>