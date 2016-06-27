<?php 

  $this->layout('master', [
      'title'=>'Post Page',
      'desc'=>'View an individual post'
    ]);

?>
<body>

<h2> <?= $post['title'] ?> </h2>