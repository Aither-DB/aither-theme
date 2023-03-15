<?php
/*
Template Name: Advisors
*/
?>

<?php
get_header();
epic_get_template('header-true.php');
?>

<main role="main" class="division">
	<div class="blue_bar advisors_page fixed_bar">
		<div class="bar_fixed_menu">
			<img src="<?php echo get_template_directory_uri() ?>/img/loupe.svg" class="loupe_icon icon">
			<img src="<?php echo get_template_directory_uri() ?>/img/close.svg" class="close_icon icon">
		</div>
		<div class="blue_bar_wrap">
			<div class="blue_bar_anim">
				<h1 class="title_26 white title_anim">
					<span class="children_anim"><?php the_field( 'title_sidebar' ); ?></span>
				</h1>

				<?php 
					$taxonomies = get_object_taxonomies( 'advisors_posts' );

					if($taxonomies):
				?>
					<div class="filter_wrap">
						<?php foreach ($taxonomies as $key => $value_tax): 
								$singleTax = $value_tax;
						?>

								<div class="single_tax">
									<div class="blue_title">
										<div class="bar_title_anim"><span class="children_anim"><?php echo $singleTax; ?></span></div>
										<div class="bar_line_anim">
											<div class="line_wrap children_anim">
												<div class="line"></div>
											</div>
										</div>
									</div>
									<?php 
										$terms = get_terms( $singleTax , array(
										    'hide_empty' => true,
										));

										if($terms):
									?>

										<ul class="terms_wrap">
											<?php foreach ($terms as $key => $value_term): 
												$termCount = $value_term->count;
											?>
												<li class="single_term bar_items_anim<?php if($singleTax=='roles'){echo' term_role';} ?>" data-group="<?php if($singleTax=='roles'){echo 'role_'.$value_term->term_id;}else{echo $value_term->term_id;} ?>">
													<div class="anim_to_left">
														<div class="single_term_wrap children_anim">
															<span class="plus"></span>
															<span class="name_item"><?php echo $value_term->name; ?></span>
															<span class="nr_item hidden">
																<?php 
																	echo '('.$termCount.')';
																?>
															</span>
														</div>
													</div>
												</li>
											<?php endforeach; ?>
										</ul>

									<?php endif; ?>
								</div>

						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="main_content">
		<div class="advisors_page blue_head_sec">

			<section class="banner">
				<div class="container">
					<div class="section_content">
						<div class="text_wrap">
							<div class="banner_title_bcg title_anim"><?php the_field( 'title_text_background' ); ?></div>
							<h1 class="banner_title title_anim"><?php the_field( 'title' ); ?></h1>
						</div>
						<?php if(get_field( 'desc_banner' )): ?>
							<div class="desc_banner qoute_anim">
								<?php the_field( 'desc_banner' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<section class="posts_cont bar_top_pos">
				<img class="dots_bg simple hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_advisor.png" />

				<div class="container">

					<?php 
						$args =array(
						   	'post_type' 		=> 'advisors_posts',
						   	'posts_per_page'	=> -1,
						   	'orderby'        => 'date',
	   						'order'          => 'ASC'
						); 

						$posts = get_posts($args);

						if($posts):
					?>
						<div id="grid" class="posts_wrap">
							<?php foreach ($posts as $key => $value_post): 

									$imgArrayPost = get_field( 'thumbnail_adv', $value_post->ID );
									$imgUrlPost = $imgArrayPost['sizes']['thumbnail'];
									$termsId = array();

									$taxonomies_post = get_object_taxonomies( $value_post->post_type );

									if($taxonomies_post){
										foreach ($taxonomies_post as $key => $value_post_tax) {

											$post_terms = get_the_terms( $value_post, $value_post_tax );
											if($post_terms){
												foreach ($post_terms as $key => $value_post_term) {
													if($value_post_term->taxonomy=="roles"){
														$term_id_string = '"role_'.$value_post_term->term_id.'"';
													}else {
														$term_id_string = '"'.$value_post_term->term_id.'"';
													}

													array_push($termsId, $term_id_string);
												}
											}
										}
									}

									//data-groups="[<?php echo implode(", ", $termsId); ]"	
							?>

								<div class="single_post_wrap" data-groups='[<?php echo implode(", ", $termsId); ?>]'>
									<a href="<?php echo get_the_permalink($value_post); ?>" class="single_post items_anim_1">
										<div class="img_wrap">
											<div class="thub_img lazyBg" data-src="<?php echo $imgUrlPost; ?>"></div>
										</div>
										<div class="text_wrap">
											<div class="name">
												<?php echo get_the_title($value_post); ?>
											</div>
											<div class="role_wrap">
												<?php the_field( 'position_adv', $value_post->ID ); ?>
											</div>
											<div class="location">
												<?php the_field( 'location_adv', $value_post->ID ); ?>
											</div>
										</div>
									</a>
								</div>

							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>

			<?php epic_get_template('page-temp/parts/nswylf.php'); ?>

		</div>
	</div>
</main>

<?php get_footer(); ?>