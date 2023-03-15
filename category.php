<?php
get_header();
epic_get_template('header-true.php');
?>

<main role="main">
	<div class="category">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<h2><?php single_cat_title(); ?></h2>

					<?php get_template_part('loop'); ?>

				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>