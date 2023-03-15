<?php
get_header();
epic_get_template('header-true.php');
?>

<main role="main">
	<div class="search_result">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1><?php echo sprintf( __( '%s Search Results for ', 'epic_translate' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
					<?php get_template_part('loop'); ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
