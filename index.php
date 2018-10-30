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
    <?php if ($page == 'blog_home') { ?>
    <title>Tom Marx - blog d'informatique</title>
    <?php } ?>
    <?php if ($page == 'blog_categories') { ?>
    <title>Catégorie '<?php echo $categorie; ?>' - blog de Tom Marx</title>
    <?php } ?>
    <?php if ($page == 'blog_post') { ?>
    <title><?php echo $post->get_title(); ?> - blog de Tom Marx</title>
    <?php } ?>
    <?php if ($page == 'cv') { ?>
    <title>CV de Tom Marx, développeur de Lyon</title>
    <?php } ?>
    <?php if ($page == 'contact') { ?>
    <title>Contactez-moi - blog de Tom Marx</title>
    <?php } ?>
  </head>
  <body>
    <?php
    include_once('includes/header.php');
    include_once('includes/' . $page . '.php');
    include_once('includes/footer.php');
    ?>

  </body>
  <script>for(var canvas=document.getElementById("anim"),ctx=canvas.getContext("2d"),speed=.3,w=80,timestamp=null,lastMouseX=null,lastMouseY=null,deltaV=0,points=[],i=0;i<12;i++)points.push({x:Math.random()*w,y:Math.random()*w,vx:Math.random()-.5,vy:Math.random()-.5});function draw(){ctx.fillStyle="#CCC",ctx.fillStyle="#FFF",ctx.fillRect(0,0,100,100),ctx.fillStyle="rgb(23, 109, 164)",ctx.fillStyle="rgba(23, 109, 164, .4)";for(var t=0;t<4;t++){ctx.beginPath(),ctx.moveTo(points[0].x,points[0].y);for(var n=t;n<t+5;n++)ctx.lineTo(points[n].x,points[n].y);ctx.fill()}}function update(){for(var t=0;t<points.length;t++)points[t].vx+=.1*(Math.random()-.5),points[t].vy+=.1*(Math.random()-.5),points[t].x<w&&0<points[t].x&&(points[t].x+=points[t].vx*speed+deltaV/300*points[t].vx),points[t].y<w&&0<points[t].y&&(points[t].y+=points[t].vy*speed+deltaV/300*points[t].vy),points[t].y>w&&(points[t].y=w-1,points[t].vy=-points[t].vy),points[t].y<0&&(points[t].y=1,points[t].vy=-points[t].vy),points[t].x>w&&(points[t].x=w-1,points[t].vx=-points[t].vx),points[t].x<0&&(points[t].x=1,points[t].vx=-points[t].vx);.1<deltaV?deltaV-=10:deltaV=0,draw()}setInterval(update,1e3/24),document.body.addEventListener("mousemove",function(t){if(null===timestamp)return timestamp=Date.now(),lastMouseX=t.screenX,void(lastMouseY=t.screenY);var n=Date.now(),o=n-timestamp,s=t.screenX-lastMouseX,e=t.screenY-lastMouseY,a=Math.round(s/o*100),i=Math.round(e/o*100);deltaV<100&&(deltaV+=Math.sqrt(Math.pow(a,2),Math.pow(i,2))),deltaV=Math.min(100,deltaV),timestamp=n,lastMouseX=t.screenX,lastMouseY=t.screenY});</script>
</html>
