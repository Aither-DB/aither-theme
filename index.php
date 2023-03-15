<?php
get_header();
epic_get_template('header-true.php');

$thisPageId = get_field( 'insights_page_id', 'options' );

?>

<main role="main" class="division">

	<div class="blue_bar index fixed_bar">
		<div class="bar_fixed_menu">
			<img src="<?php echo get_template_directory_uri() ?>/img/loupe.svg" class="loupe_icon icon">
			<img src="<?php echo get_template_directory_uri() ?>/img/close.svg" class="close_icon icon">
		</div>

		<div class="blue_bar_wrap">
			<div class="blue_bar_anim element_child_anim">
				<div class="bar_items_anim">
					<div class="searcher_wrap children_anim">
						<label>
							<div class="placeholder">
								Search
							</div>
							<input type="text" id="search_post_ins" name="search_post_ins">
						</label>
						<div class="clear_input">
							Clear Filters
						</div>
					</div>
				</div>

				<?php 
					$args_ath =array(
					   	'post_type' 		=> 'advisors_posts',
					   	'posts_per_page'	=> -1,
					   	'orderby'       	=> 'title',
						'order'          	=> 'ASC'
					); 

					$authors = get_posts($args_ath);

					if($authors):
				?>
					<div class="authors_cont">

						<div class="blue_title">
							<div class="bar_title_anim"><span class="children_anim">Author</span></div>
							<div class="bar_line_anim">
								<div class="line_wrap children_anim">
									<div class="line"></div>
								</div>
							</div>
						</div>
						<div class="bar_items_anim">
							<div class="authors_select select_fake children_anim">
								<div class="cur_author select_cur">
									Select author
								</div>
								<div class="list_author_wrap">
									<ul class="list_author terms_wrap select_list filter_select_js">
										<li class="single_auth single_select" data-group="all_advisors">
											All Advisors
										</li>
										<?php foreach ($authors as $key => $value_author): ?>
											<li class="single_auth" data-group="<?php echo $value_author->ID; ?>">
												<?php echo get_the_title($value_author); ?>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php 
					endif; 

					$taxonomies = array(
			            array(
			               'taxonomy' => 'post_services',
			               'title'    => 'Services',
			            ),
			            array(
			               'taxonomy' => 'post_sectors',
			               'title'    => 'Sectors',
			            ),
			            array(
			               'taxonomy' => 'post_tag',
			               'title'    => 'Tags',
			            )
			        );

					if($taxonomies):
				?>
					<div class="filer_wrap">
						<?php foreach ($taxonomies as $key => $singleTax): ?>
							<div class="single_tax">
								<div class="blue_title">
									<div class="bar_title_anim"><span class="children_anim"><?php echo $singleTax['title']; ?></span></div>
									<div class="bar_line_anim">
										<div class="line_wrap children_anim">
											<div class="line"></div>
										</div>
									</div>
								</div>
								<?php 
									$terms = get_terms( $singleTax['taxonomy'] , array(
									    'hide_empty' => true,
									));

									if($terms):
								?>

									<ul class="terms_wrap filter_btn_js">
										<?php foreach ($terms as $key => $value_term): 
											$termCount = $value_term->count;
										?>
											<li class="single_term bar_items_anim " data-group="<?php echo $value_term->term_id; ?>">
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
				<?php 
					endif; 

					//date filter
					$posts_dates = array();
					$list_of_date = array();

					if (have_posts()) : 
						while (have_posts()) : the_post(); 
				
							$year = get_the_time('Y');
							array_push($posts_dates, $year);

						endwhile;

						$list_of_date = array_count_values($posts_dates);
						ksort($list_of_date);

					endif;

					if($list_of_date):
				?>

					<div class="filer_wrap">
						
						<div class="single_tax">
							<div class="blue_title">
								<div class="bar_title_anim"><span class="children_anim">Published Date</span></div>
								<div class="bar_line_anim">
									<div class="line_wrap children_anim">
										<div class="line"></div>
									</div>
								</div>
							</div>
							
							<ul class="terms_wrap filter_btn_js">
								<?php 
									foreach ($list_of_date as $key => $valu_date): 
								?>
									<li class="single_term data_term bar_items_anim" data-group="<?php echo 'data_'.$key; ?>">
										<div class="anim_to_left">
											<div class="single_term_wrap children_anim">
												<span class="plus"></span>
												<span class="name_item"><?php echo $key; ?></span>
												<span class="nr_item hidden">
													<?php 
														echo '('.$valu_date.')';
													?>
												</span>
											</div>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						
					</div>

				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="main_content">
		<div class="index">

			<section class="banner blue_head_sec">
				<div class="container">
					<div class="section_content">
						<div class="text_wrap">
							<div class="banner_title_bcg title_anim"><?php the_field( 'title_text_background' , $thisPageId ); ?></div>
							<h1 class="banner_title title_anim"><?php the_field( 'title', $thisPageId ); ?></h1>
						</div>
					</div>
				</div>
			</section>

			<section class="news_list">
				<img class="dots_bg hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_insights.png" />
				
					<div class="section_content">
						<?php 
							$featured_news = get_field('featured_news', $thisPageId);
							$featured_news = $featured_news[0]; 

							if($featured_news):
						?>
							<div class="featured_news blue_head_sec white_all qoute_anim">
								<div class="container">
									<div class="text_wrap">
										<h2 class="title"><?php echo $featured_news->post_title; ?></h2>
										<div class="desc"><?php echo mb_ucfirst(get_field('short_description',$featured_news->ID),210); ?></div>
										<a class="cta" href="<?php echo get_permalink($featured_news->ID); ?>">Read the report</a>
									</div>
								</div>
							</div>
							
						<?php endif; ?>

						<div class="news_cont_outer bar_top_pos blue_head_sec">
							<div class="container">
								<div id="grid" class="news_wrap_outer">
									<?php get_template_part('loop'); ?>
								</div>
							</div>
						</div>
					</div>
				
			</section>
			
		</div>
	</div>
</main>

<?php get_footer(); ?>