<section id="post">
<div id="content">
<img src="<?php echo $post->get_image(); ?>" alt="" id="cover">
<h1><?php echo $post->get_title(); ?></h1>
<span id="date">Le <?php echo $post->get_date(); ?> par Tom Marx</span>
  <?php include_once($post->get_content()); ?>
</div>

<div id="sidebar">
  <?php include_once('includes/categories.php'); ?>
  <?php include_once('includes/last_posts.php'); ?>
</div>
</section>
