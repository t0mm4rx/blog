<section id="post">
<div id="content">
  <h1><?php echo $post->get_title(); ?></h1>
  <p id="date">Le <?php echo $post->get_date(); ?> par Tom Marx</p>
<div id="cover_wrapper">
  <img src="<?php echo $post->get_image(); ?>" alt="<?php echo $post->get_title(); ?>" id="cover">
  <div id="summary">
    <ul id="summary_list">
      <!--<li><a>Introduction</a></li>
      <li><a>À quoi sert un réseau de neurones ?</a></li>
      <li><a>Comment fonctionne un neurone ?</a></li>
      <li><a>L'apprentissage du neurone</a></li>
      <li><a>Conclusion</a></li>-->
    </ul>
    <p>
      <i class="far fa-clock"></i> Temps de lecture : environ <b><?php echo $post->get_time_to_read(); ?> minutes</b>
    </p>
  </div>
</div>
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

<script>
  var summary = document.getElementById('summary_list');
  var parties = document.querySelectorAll('#content H3');
  for (var i = 0; i < parties.length; i++) {
    var li = document.createElement('li');
    var a = document.createElement('a');
    a.innerText = parties[i].innerText;
    a.onclick = function () {
      var text = this.innerText;
      for (var x = 0; x < document.querySelectorAll('#content H3').length; x++) {
        if (document.querySelectorAll('#content H3')[x].innerText == text) {
          window.scroll({
            top: document.querySelectorAll('#content H3')[x].getBoundingClientRect().top - 100,
            left: 0,
            behavior: 'smooth'
          });
        }
      }
    };
    li.append(a);
    summary.append(li);
  }
</script>
