<?php
/*
Template Post Type: advisors_posts
Template Name: Advisors profile
*/
?>

<?php
get_header();
epic_get_template('header-true.php');
?>

<main role="main" class="division">
	<div class="blue_bar advisors_index">
		<div class="contact_wrap hidden-xs">
			<div class="blue_title">
				<div class="bar_title_anim"><span class="children_anim"><span>Contact </span><?php the_field( 'first_name_adv' ); ?></span></div>
				<div class="bar_line_anim">
					<div class="line_wrap children_anim">
						<div class="line"></div>
					</div>
				</div>
			</div>

			<ul class="cont_list">
				<?php 
					$twitName = get_field( 'twitter_adv' );
					$twitLink = get_field( 'twitter_link_adv' );
					if($twitName || $twitLink):
				?>
						<li class="single_cont bar_items_anim">
							<div class="anim_to_left">
								<a href="<?php echo $twitLink['url']; ?>" target="_blank" class="children_anim">
									<i class="fa fa-twitter"></i>
									<span><?php echo $twitName; ?></span>
								</a>
							</div>
						</li>
				<?php 
					endif;
					$linkName = get_field( 'linkedin_adv' );
					$linkLink = get_field( 'linkedin_link_adv' );
					if($linkName || $linkLink):
				?>

						<li class="single_cont bar_items_anim">
							<div class="anim_to_left">
								<a href="<?php echo $linkLink['url']; ?>" target="_blank" class="children_anim">
									<img src="<?php echo get_template_directory_uri() . '/img/linkedin.svg'; ?>" class="icon_bar">
									<span><?php echo $linkName; ?></span>
								</a>
							</div>
						</li>

				<?php 
					endif; 
					$mail = get_field( 'email_address_adv' );
					if($mail):
				?>
						<li class="single_cont bar_items_anim">
							<div class="anim_to_left">
								<a href="mailto:<?php echo $mail; ?>" target="_blank" class="children_anim">
									<i class="fa fa-envelope"></i>
									<span><?php echo $mail; ?></span>
								</a>
							</div>
						</li>
				<?php 
					endif; 
					$phone = get_field( 'phone_adv' );
					if($phone):
				?>
						<li class="single_cont bar_items_anim">
							<div class="anim_to_left">
								<div class="phone_nr children_anim">
									<i class="fa fa-phone"></i>
									<span class="phone_txt"><?php echo $phone; ?></span>
								</div>
								<a href="tel:<?php echo $phone; ?>" target="_blank" class="phone_nr_mobile children_anim">
									<i class="fa fa-phone"></i>
									<span class="phone_txt"><?php echo $phone; ?></span>
								</a>
							</div>
						</li>
				<?php endif; ?>
			</ul>
		</div>

		<?php 
			$thisInsights = get_field( 'insights_post' );

			if($thisInsights):
		?>
			<div class="rel_ins_cont bg_mobile_anim">
				<div class="blue_bg blue_head_sec white_all visible-xs"></div>

				<div class="blue_title">
					<div class="bar_title_anim title_mobile_anim"><span class="children_anim"> Insights</span></div>
					<div class="bar_line_anim line_mobile_anim">
						<div class="line_wrap children_anim">
							<div class="line"></div>
						</div>
					</div>
				</div>

				<div class="swiper-container">
					<div class="rel_ins_wrap swiper-wrapper">
						<?php foreach ($thisInsights as $key => $value_ins): ?>

							<a href="<?php echo get_the_permalink($value_ins); ?>" class="single_rel_ins swiper-slide slides_bar_anim">
								<div class="anim_to_left">
									<div class="date_wrap children_anim">
										<?php echo get_the_time('j F Y', $value_ins); ?>
									</div>
									<div class="title_wrap children_anim">
										<?php echo mb_ucfirst(get_the_title($value_ins),49); ?>
									</div>

									<?php $imgThumb = get_field('thumbnail', $value_ins) ? get_field('thumbnail', $value_ins)['sizes']['medium'] : get_field('thumbnail', $value_ins); ?>

									<div class="img_thumb lazyBg children_anim" data-src="<?php echo $imgThumb; ?>"></div>
									<div class="desc hidden-xs children_anim"><?php echo mb_ucfirst(get_field( 'short_description', $value_ins ), 68); ?></div>
									<div class="desc visible-xs children_anim"><?php echo mb_ucfirst(get_field( 'short_description', $value_ins ), 54); ?></div>
								</div>
							</a>

						<?php endforeach; ?>
					</div>
				</div>

				<a href="<?php echo get_the_permalink(get_field( 'insights_page_id', 'options' )); ?>" class="view_all">
					<span class="line_btn_wrap bar_line_anim">
						<span class="children_anim">
							<span class="line"></span>
						</span>
					</span>
					<div class="desc_btn bar_title_anim">
						<div class="children_anim">
							<span>View All</span>
							<span class="arrow"></span>
						</div>
					</div>
				</a>

			</div>

		<?php 
			endif; 
			$peopleRel = get_field( 'pep_als_view' );

			if($peopleRel):
		?>

			<div class="pep_rel_cont bg_mobile_anim">
				<div class="blue_bg blue_head_sec white_all visible-xs"></div>
				<div class="blue_title">
					<div class="bar_title_anim title_mobile_anim"><span class="children_anim">People Also Viewed</span></div>
					<div class="bar_line_anim line_mobile_anim">
						<div class="line_wrap children_anim">
							<div class="line"></div>
						</div>
					</div>
				</div>

				<div class="swiper-container">
					<div class="pep_rel_wrap swiper-wrapper">
						<?php foreach ($peopleRel as $key => $value_pep):
							$imgArrayPost = get_field( 'thumbnail_adv', $value_pep->ID );
							$imgUrlPost = $imgArrayPost['sizes']['thumbnail'];
						?>

							<a href="<?php echo get_the_permalink($value_pep); ?>" class="single_rel_pep slides_bar_anim swiper-slide">
								<div class="anim_to_left">
									<div class="thum_img children_anim_adv lazyBg" data-src="<?php echo $imgUrlPost; ?>"></div>
									<div class="name children_anim">
										<?php echo get_the_title($value_pep); ?>
									</div>
									<div class="role_wrap children_anim">
										<?php the_field( 'position_adv', $value_pep->ID ); ?>
									</div>
								</div>
							</a>

						<?php endforeach; ?>
					</div>
				</div>

				<a href="<?php echo get_the_permalink(get_field( 'advisors_page_id', 'options' )); ?>" class="view_all">
					<span class="line_btn_wrap bar_line_anim">
						<span class="children_anim">
							<span class="line"></span>
						</span>
					</span>
					<div class="desc_btn bar_title_anim">
						<div class="children_anim">
							<span>View All</span>
							<span class="arrow"></span>
						</div>
					</div>
				</a>

			</div>

		<?php endif; ?>
	</div>

	<div class="main_content">
		<div class="advisors_index blue_head_sec">

			<section class="banner">
				<div class="container">
					<div class="section_content">
						<div class="text_wrap">
							<div class="banner_title_bcg title_anim"><?php the_field( 'first_name_adv' ); ?></div>
							<h1 class="banner_title title_anim">
								<span><?php the_field( 'first_name_adv' ); ?></span>
								<span><?php the_field( 'last_name_adv' ); ?></span>
							</h1>
							<div class="role_wrap position_anim">
								<?php the_field( 'position_adv' ); ?>
							</div>
							<div class="loc_wrap position_anim">
								<?php the_field( 'location_adv' ); ?>
							</div>
						</div>

						<?php if(get_field( 'quote_adv' )): ?>
							<div class="qoute_banner hidden-xs">
								<div class="qoute_anim"><?php the_field( 'quote_adv' ); ?></div>
								<div class="line line_q_anim"></div>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="banner_img_wrap picture_anim">
					<?php 
						$imgArrayBanner = get_field( 'profile_image_adv' );
						$imgUrlBanner = $imgArrayBanner['sizes']['large'];
						$imgUrlBannerM = $imgArrayBanner['sizes']['medium'];
					?>
					<div class="banner_img lazyBg" data-src="<?php echo $imgUrlBanner; ?>" data-src-xs="<?php echo $imgUrlBannerM; ?>"></div>
				</div>

			</section>
			<?php
				$sepc_title = get_field( 'spec_title_adv' );
				$spec_arr = get_field( 'spec_icons_rel' );

				if($spec_arr || $sepc_title):
			?>
				<section class="spec_section">
					<div class="container">
						<?php 
							if($sepc_title): 
						?>
							<h1 class="title_26 title_anim">
								<?php echo $sepc_title; ?>
							</h1>
						<?php 
							endif;
							if($spec_arr): 
						?>
							<div class="spec_wrap">
								<?php foreach ($spec_arr as $key => $value_spec): ?>

									<div class="single_spec_wrap bar_items_anim">
										<div class="single_spec">
											<img src="<?php echo get_field( 'icon_spec', $value_spec ); ?>" class="single_spec_icon">
										</div>

										<h3 class="title_14"><?php echo get_field('title_spec', $value_spec) ?></h3>
									</div>

								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>	
				</section>

			<?php 
				endif; 

				$down_file = get_field( 'file_upload_adv' );

				if($down_file):
			?>

				<section class="file_sec visible-xs">
					<div class="container">
						<a href="<?php echo $down_file['url']; ?>" class="file_wrap bar_items_anim" target="_blank">
							<img src="<?php echo get_template_directory_uri() ?>/img/down_file.svg" class="file_icon svg_inject">
							<div class="file_desc">
								<div class="file_name">
									<?php echo $down_file['title']; ?>
									<span class="arrow"></span>
								</div>
								<div class="file_size">
									<?php echo size_format(filesize( get_attached_file( $down_file['id'] ) ));?>
								</div>
							</div>
						</a>
					</div>
				</section>

			<?php endif; ?>

			<section class="blue_bar advisors_mob bg_mobile_anim visible-xs">
				<div class="blue_bg blue_head_sec white_all"></div>
				<div class="container">
					<div class="contact_wrap">
						<div class="blue_title">
							<div class="title_name title_mobile_anim"><span>Contact </span><?php the_field( 'first_name_adv' ); ?></div>
							<div class="line_mobile_anim">
								<div class="line_wrap">
									<div class="line"></div>
								</div>
							</div>
						</div>

						<ul class="cont_list">
							<?php 
								$twitName = get_field( 'twitter_adv' );
								$twitLink = get_field( 'twitter_link_adv' );
								if($twitName || $twitLink):
							?>
									<li class="single_cont items_mobile_anim">
										<a href="<?php echo $twitLink['url']; ?>" target="_blank">
											<i class="fa fa-twitter"></i>
											<span><?php echo $twitName; ?></span>
										</a>
									</li>
							<?php 
								endif;
								$linkName = get_field( 'linkedin_adv' );
								$linkLink = get_field( 'linkedin_link_adv' );
								if($linkName || $linkLink):
							?>

									<li class="single_cont items_mobile_anim">
										<a href="<?php echo $linkLink['url']; ?>" target="_blank">
											<img src="<?php echo get_template_directory_uri() . '/img/linkedin.svg'; ?>" class="icon_bar">
											<span><?php echo $linkName; ?></span>
										</a>
									</li>

							<?php 
								endif; 
								$mail = get_field( 'email_address_adv' );
								if($mail):
							?>
									<li class="single_cont items_mobile_anim">
										<a href="mailto:<?php echo $mail; ?>" target="_blank">
											<i class="fa fa-envelope"></i>
											<span><?php echo $mail; ?></span>
										</a>
									</li>
							<?php 
								endif; 
								$phone = get_field( 'phone_adv' );
								if($phone):
							?>
									<li class="single_cont items_mobile_anim">
										<a href="tel:<?php echo $phone; ?>" target="_blank">
											<i class="fa fa-phone"></i>
											<span class="phone_txt"><?php echo $phone; ?></span>
										</a>
									</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</section>

			<section class="advdesc_sect">
				<img class="dots_bg hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/advisor_profile_dots.png" />
				<div class="container">

					<div class="advdesc_wrap">
						<?php  
							$title_desc = get_field( 'heading_adv' );
							$wysiwyg = get_field( 'desc_adv' );

							if($title_desc || $wysiwyg):
						?>

							<div class="left_wrap">
								<?php if($title_desc): ?>
									<h1 class="title_26 title_anim"> <?php echo $title_desc; ?> </h1>
								<?php 
									endif; 
									if($wysiwyg):
								?>
									<div class="desc_adv wysiwyg qoute_anim">
										<?php echo $wysiwyg; ?>
									</div>
								<?php endif; ?>
							</div>

						<?php 
							endif; 

							$title_key = get_field( 'key_qua_head' );
							$key_rep = get_field( 'key_qua_items' );

							if($title_key || $key_rep || $down_file):
						?>

							<div class="right_wrap">
								<?php if($title_key): ?>
									<h1 class="title_26 title_anim"> <?php echo $title_key; ?> </h1>
								<?php 
									endif;
								?>

								<div class="key_items">
									<?php 
										if($key_rep):
											foreach ($key_rep as $key => $value_key):
										?>

											<div class="single_key bar_items_anim">
												<img src="<?php echo get_template_directory_uri() ?>/img/key_icon.svg" class="key_icon svg_inject">
												<div class="key_desc">
													<div class="cr_name"><?php echo $value_key['course_name_adv']; ?></div>
													<div class="cr_loc"><?php echo $value_key['location_adv']; ?></div>
												</div>
											</div>

									<?php 
											endforeach;
										endif;

										if($down_file):
									?>

										<a href="<?php echo $down_file['url']; ?>" class="file_wrap bar_items_anim hidden-xs" target="_blank">
											<img src="<?php echo get_template_directory_uri() ?>/img/big_file.svg" class="file_icon">
											<div class="file_desc">
												<div class="file_name">
													<?php echo $down_file['title']; ?>
													<span class="arrow"></span>
												</div>
												<div class="file_size">
													<?php echo size_format(filesize( get_attached_file( $down_file['id'] ) ));?>
												</div>
											</div>
										</a>

									<?php endif; ?>
								</div>
							</div>

						<?php endif; ?>
					</div>

				</div>
				<img class="dots_bg_2 hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/advisor_profile_dots.png" />
			</section>
			<?php 
				if($mail || $phone):
			?>

				<section class="contact_sec hidden-xs">
					<div class="container">

						<h1 class="title_26 title_anim">
							<span>Contact </span>
							<span><?php the_field( 'first_name_adv' ); ?></span>
						</h1>

						<ul class="bot_cont_list">
							<?php
								if($mail):
							?>
									<li class="single_cont bar_items_anim">
										<a href="mailto:<?php echo $mail; ?>" target="_blank">
											<i class="fa fa-envelope"></i>
											<span><?php echo $mail; ?></span>
										</a>
									</li>
							<?php 
								endif; 
								$phone = get_field( 'phone_adv' );
								if($phone):
							?>
									<li class="single_cont bar_items_anim">
										<div class="phone_nr">
											<i class="fa fa-phone"></i>
											<span class="phone_txt"><?php echo $phone; ?></span>
										</div>
										<a class="phone_nr_mobile" href="tel:<?php echo $phone; ?>" target="_blank">
											<i class="fa fa-phone"></i>
											<span class="phone_txt"><?php echo $phone; ?></span>
										</a>
									</li>
							<?php endif; ?>
						</ul>

					</div>
				</section>

			<?php endif; ?>
		</div>
	</div>

</main>

<?php get_footer(); ?>