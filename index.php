<?php
$page = $_GET['page'];
if ($page == "blog_home") {

} else if ($page == "blog_post") {

} else if ($page == "cv") {

} else if ($page == "contact") {

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
    ?>

  </body>
</html>
