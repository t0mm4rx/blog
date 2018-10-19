<section>
  <div id="left">
    <h1><?php echo $categorie; ?></h1>
    <div id="post_list">
      <?php foreach ($blog->get_posts_by_tag($categorie) as $key => $p) { ?>
      <a href="<?php echo $p->get_url(); ?>">
        <div class="post">
        <img src="<?php echo $p->get_image(); ?>" alt=""/>
        <h2><?php echo $p->get_title(); ?></h2>
        <p><?php echo $p->get_full_preview(); ?></p></div>
      </a>
      <?php } ?>
  </div>
</div>

  <div id="right">
    <?php include_once('includes/categories.php'); ?>
    <?php include_once('includes/last_posts.php'); ?>
  </div>
</section>
