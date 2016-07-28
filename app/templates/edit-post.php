<?php 

  $this->layout('master', [
      'title'=>'Edit Post',
      'desc'=>'Edit your post'
    ]);

?>

<body>

<?= $this->insert('nav') ?>

<h1>Edit post: <?= $this->e($originalTitle) ?></h1>

<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
	
	<div>
		<label for="title">Title: </label>
		<input type="text" id="title" name="title" value="<?= $post['title'] ?>">
		<?= isset($titleError) ? $titleError : '' ?>
	</div>

	<div>
		<label for="description">Description: </label>
		<textarea id="description" name="description"><?= $post['description'] ?></textarea>
		<?= isset($descError) ? $descError : '' ?>
	</div>

	<img src="img/uploads/stream/<?= $post['image'] ?>" alt="">

	<input type="file" name="image">

	<input type="submit" name="edit-post">
	<?= isset($updateMessage) ? $updateMessage : '' ?>

</form>