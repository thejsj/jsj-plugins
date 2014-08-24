<!DOCTYPE html><?php global $this_object; ?>
<html>
<head>

    <!-- Meta Information -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php echo(is_search()) ? '<meta name="robots" content="noindex, nofollow" />' : ''; ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    
    <!-- HTML Meta Tags -->
    <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
    <meta name="author" content="Jorge Silva-jetter, jorge.silva@thejsj.com">
    <meta name="copyright" content="<?php echo ' Copyright' . bloginfo('name') . '. All Rights Reserved.';?>">
    <!-- <meta name="google-site-verification" content=""/> -->
    <meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=10.0,initial-scale=1.0" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/static/ico/favicon.ico">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/static/ico/favicon.ico">
    <link href="<?php bloginfo('template_url'); ?>/static/ico/apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="<?php bloginfo('template_url'); ?>/static/ico/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72" />
    <link href="<?php bloginfo('template_url'); ?>/static/ico/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114" />
    <link href="<?php bloginfo('template_url'); ?>/static/ico/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144" />

    <!-- Add Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="<?php echo $this_object->get_main_image_src(); ?>">

    <!-- Javascript -->
    <script type="text/javascript" src="//use.typekit.net/mth8oxl.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <!-- CSS : Concatanted styles generated with SCSS -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

    <!-- WP Head -->
    <?php wp_head(); ?>

    <!-- Facebook : Images -->
    <?php $this_object->get_facebook_image_tags(); ?>

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-13276167-5', 'thejsj.com');
        ga('send', 'pageview');
    </script>
</head>
<body <?php body_class(); ?>> 
   <!-- Header and Nav -->
    <header class="top-header">
        <div class="row">
            <div class="large-6 columns">
                <h1 class="logo-image">
                    <a href="<?php echo bloginfo('url'); ?>">
                        <?php echo bloginfo('name'); ?>
                    </a>
                </h1>
            </div>
            <nav class="large-6 columns main-nav"><!-- Because the WordPress walker apprently really sucks... -->
            <?php wp_nav_menu( array( 
                'menu_class' => 'inline-list',
                'theme_location' => 'primary',
                'items_wrap'      => '<ul id="%1$s" class="home-link %2$s">%3$s</ul>',
            ) ); ?>
            </nav>
        </div>
    </header>
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
    } ?>
    <!-- End Header and Nav -->
