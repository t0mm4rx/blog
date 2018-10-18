<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('fonctions.php');
include_once('blog.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'blog_home';
}

if ($page == "blog_home") {
} elseif ($page == "blog_post") {
} elseif ($page == "blog_categories") {
} elseif ($page == "cv") {
} elseif ($page == "contact") {
} else {
    $page = "blog_home";
}

$blog = new Blog();
var_dump($blog->get_last_posts()[0]->get_title());

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
