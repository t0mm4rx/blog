<header>
  <i id="icon_menu" class="fas fa-bars" onclick="document.getElementById('nav').setAttribute('open', 'true')"></i>
  <a href="<?php echo $GLOBALS['url']; ?>"><h2>Tom Marx</h2></a>
  <div class="nav" id="nav" open="false">
    <i id="icon_close" class="fas fa-times" onclick="document.getElementById('nav').setAttribute('open', 'false')"></i>
    <a href="<?php echo $GLOBALS['url']; ?>" class="underline">Blog</a>
    <a href="<?php echo $GLOBALS['url']; ?>cv/" class="underline">Mon CV</a>
    <a href="<?php echo $GLOBALS['url']; ?>contact/" class="underline">Contact</a>
  </div>
</header>
