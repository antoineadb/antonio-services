<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
  <div class="header-inner">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
      <div class="brand-mark">Antonio</div>
      <div class="brand-tagline">Un coup de main<br>pour vous simplifier la vie</div>
    </a>
    <?php
      if (has_nav_menu('primary')) {
          wp_nav_menu(array('theme_location'=>'primary','container'=>'nav','container_class'=>'main-nav'));
      } else {
          antonio_services_menu_fallback();
      }
    ?>
    <a class="button" href="<?php echo esc_url(home_url('/#contact')); ?>">Me contacter</a>
  </div>
</header>
