<?php
// Load PHP Application

load_theme_textdomain('epic_translate', get_template_directory() . '/languages');


require_once('wp_bootstrap_navwalker.php');
require_once('classes/Mailchimp/vendor/autoload.php');
require_once('includes/newsletter.php');
require_once('includes/register_scripts.php');
require_once('includes/register_styles.php');
require_once('includes/register_areas.php');
require_once('includes/custom_functions.php');
require_once('includes/post_types.php');
//require_once('includes/delete_page_log.php');
?>