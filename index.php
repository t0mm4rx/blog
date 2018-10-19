<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('fonctions.php');
include_once('blog.php');

$blog = new Blog();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'blog_home';
}

if ($page == "blog_home") {
} elseif ($page == "blog_post") {
  if (isset($_GET['post'])) {
    if ($blog->check_link($_GET['post'])) {
      $post = $blog->get_post_by_link($_GET['post']);
      if ($post === false) {
        redirect_home();
      }
    } else {
      redirect_home();
    }
  } else {
    redirect_home();
  }
} elseif ($page == "blog_categories") {
  if (isset($_GET['categorie'])) {
    if ($blog->check_tag($_GET['categorie'])) {
        $categorie = $_GET['categorie'];
    } else {
        redirect_home();
    }
  } else {
    redirect_home();
  }
} elseif ($page == "cv") {
} elseif ($page == "contact") {
} else {
    $page = "blog_home";
}

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php include_once('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="<?php echo $GLOBALS['url']; ?>css/<?php echo $GLOBALS['page']; ?>_desktop.css">
    <link rel="stylesheet" type="text/css" media="screen and (max-width: 999px)" href="<?php echo $GLOBALS['url']; ?>css/<?php echo $GLOBALS['page']; ?>_mobile.css">
    <title>Tom Marx - blog d'informatique</title>
  </head>
  <body>
    <?php
    include_once('includes/header.php');
    include_once('includes/' . $page . '.php');
    include_once('includes/footer.php');
    ?>

  </body>
</html>
