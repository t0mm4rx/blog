<div id="last_posts">
  <h2><i class="fab fa-hotjar"></i>  Derniers articles</h2>
  <div class="post_list">
  <?php foreach ($blog->get_last_posts() as $key => $post) { ?>
    <a href="<?php echo $post->get_url(); ?>" class="post_list_item">
      <img src="<?php echo $post->get_preview_image(); ?>" alt="" />
      <div><h4><?php echo $post->get_title(); ?></h4>
      <p><?php echo $post->get_preview(); ?></p></div>
    </a>
  <?php } ?>
</div>
