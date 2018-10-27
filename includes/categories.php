<div id="categories">
  <h2><i class="fas fa-list-ul"></i>  Catégories</h2>
  <?php
    foreach ($blog->get_tags() as $key => $tag) {
      echo '<a href="' . $GLOBALS['url'] . 'categories/' . $tag . '/"># ' . $tag . '</a>';
    }
  ?>
</div>
