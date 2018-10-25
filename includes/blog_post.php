<section id="post">
<div id="content">
<div id="cover_wrapper"><img src="<?php echo $post->get_image(); ?>" alt="" id="cover"></div>
<h1><?php echo $post->get_title(); ?></h1>
<span id="date">Le <?php echo $post->get_date(); ?> par Tom Marx</span>
  <?php include_once($post->get_content()); ?>

  <div id="disqus_thread"></div>
  <script>
  var disqus_config = function () {
  this.page.url = '<?php echo $post->get_url(); ?>';
  this.page.identifier = '<?php echo $post->get_link(); ?>';
  };
  (function() { // DON'T EDIT BELOW THIS LINE
  var d = document, s = d.createElement('script');
  s.src = 'https://tom-marx.disqus.com/embed.js';
  s.setAttribute('data-timestamp', +new Date());
  (d.head || d.body).appendChild(s);
  })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>

<div id="sidebar">
  <?php include_once('includes/categories.php'); ?>
  <?php include_once('includes/last_posts.php'); ?>
</div>
</section>
