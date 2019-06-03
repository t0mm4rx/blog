<h1>Le blog</h1>
<section id="top">
  <?php $p = $blog->get_pinned_post(); ?>
  <a href='<?php echo $p->get_url(); ?>'>
    <div class="pinned_post">
      <img src="<?php echo $p->get_image(); ?>" alt="<?php echo $p->get_title(); ?>"><div>
      <h2><?php echo $p->get_title(); ?></h2>
      <p><?php echo $p->get_full_preview(); ?></p>
    </div>
    </div>
  </a>
</section>
<section id="home">
  <div id="left">
    <?php include_once('includes/last_posts.php'); ?>
    <?php include_once('includes/sketches.php'); ?>
  </div>
  <div id="right">
    <?php include_once('includes/categories.php'); ?>
    <?php include_once('includes/tweets.php'); ?>
  </div>


</section>
