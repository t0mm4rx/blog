<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ($page == 'blog_post') { ?>
<meta name="description" content="<?php echo $post->get_full_preview(); ?>">
<meta name="keywords" content="<?php echo join(', ', $post->get_tags()); ?>">
<meta name="date" content="<?php echo $post->get_date(); ?>" scheme="DD/MM/YYYY">
<link rel="canonical" href="https://tommarx.fr/article/<?php echo $post->get_link(); ?>/" />
<?php } ?>
<?php if ($page == 'blog_home') { ?>
<meta name="description" content="Blog de Tom Marx, articles sur l'informatique, l'intelligence artificielle, le machine learning, les Hackintosh... Retrouvez mon CV.">
<link rel="canonical" href="https://tommarx.fr/" />
<?php } ?>
<?php if ($page == 'blog_categories') { ?>
<meta name="description" content="Tous les articles concernant '<?php echo $categorie; ?>' sur le blog de Tom Marx.">
<link rel="canonical" href="https://tommarx.fr/categories/<?php echo $categorie; ?>/" />
<?php } ?>
<?php if ($page == 'cv') { ?>
<meta name="description" content="CV de Tom Marx, développeur informatique à Lyon. Développement Web, appli mobiles, design... Retrouvez également mon expérience professionelle.">
<link rel="canonical" href="https://tommarx.fr/cv/" />
<?php } ?>
<?php if ($page == 'contact') { ?>
<meta name="description" content="Vous souhaitez me contacter ? Remplissez ce formulaire.">
<link rel="canonical" href="https://tommarx.fr/contact/" />
<?php } ?>
<link rel="icon" type="image/png" href="<?php echo $GLOBALS['url']; ?>favicon.png" />
<link href="https://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['url']; ?>css/style.css">

<link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="<?php echo $GLOBALS['url']; ?>css/header_desktop.css">
<link rel="stylesheet" type="text/css" media="screen and (max-width: 999px)" href="<?php echo $GLOBALS['url']; ?>css/header_mobile.css">
<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['url']; ?>css/footer.css">

<script src="<?php echo $GLOBALS['url']; ?>js/highlight.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['url']; ?>css/ocean.css">
<script>hljs.initHighlightingOnLoad();</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128181893-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128181893-1');
</script>
<?php if ($page == 'contact') { ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php } ?>
