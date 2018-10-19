<section id="top">
  <?php $p = $blog->get_pinned_post(); ?>
  <a href='<?php echo $p->get_url(); ?>'>
    <div class="pinned_post">
      <img src="<?php echo $p->get_image(); ?>" alt=""><div>
      <h2><?php echo $p->get_title(); ?></h2>
      <p><?php echo $p->get_full_preview(); ?></p>
    </div>
    </div>
  </a>
</section>
<section id="home">
  <div id="right">
    <?php include_once('includes/categories.php'); ?>
  </div>
  <div id="left">
    <?php include_once('includes/last_posts.php'); ?>
  </div>

</section>
