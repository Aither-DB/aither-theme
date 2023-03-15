<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <!-- tab icon -->

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/favicon.ico" />
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <?php wp_head(); ?>
	
		
</head>
<body <?php body_class(); ?>>

    <div class="wrapper">