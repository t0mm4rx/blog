<div id="categories">
  <h2><i class="fas fa-list-ul"></i>  Catégories</h2>
  <!--<a href="/test/"># IA</a>
  <a href="/test/"># 42</a>
  <a href="/test/"># Développement Web</a>
  <a href="/test/"># Hackintosh</a>-->
  <?php
    foreach ($blog->get_tags() as $key => $tag) {
      echo '<a href="' . $GLOBALS['url'] . 'categories/' . $tag . '/"># ' . $tag . '</a>';
    }
  ?>
</div>
