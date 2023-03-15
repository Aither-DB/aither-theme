<?php
/*
Template Name: Contact
*/
?>

<?php
get_header();
epic_get_template('header-true.php');
?>

<main role="main" class="division">
	<div class="blue_bar contact_page hidden-xs">
		<div class="blue_bar_wrap">
			<div class="blue_title">
				<div class="bar_title_anim"><span class="children_anim"><?php the_field( 'anchor_heading' ); ?></span></div>
				<div class="bar_line_anim">
					<div class="line_wrap children_anim">
						<div class="line"></div>
					</div>
				</div>
			</div>

			<?php 
				$anchor_ac = get_field( 'anchor_title_ac' );
				$anchor_of = get_field( 'anchor_office' );
				$anchor_cr = get_field( 'anchor_careers' );
				$anchor_contact = get_field( 'anchor_ge' );
			?>

			<ul class="anchor_wrap">
				<?php if($anchor_ac): ?>
					<li class="sinlge_anchor bar_items_anim">
						<div class="anim_to_left">
							<a href="#advisors_1" class="children_anim advisors_1">
								<?php echo $anchor_ac; ?>
							</a>
						</div>
					</li>
				<?php 
					endif; 
					if($anchor_of):
				?>
					<li class="sinlge_anchor bar_items_anim">
						<div class="anim_to_left">
							<a href="#offices_1" class="children_anim offices_1">
								<?php echo $anchor_of; ?>
							</a>
						</div>
					</li>
				<?php 
					endif; 
					if($anchor_cr):
				?>
					<li class="sinlge_anchor bar_items_anim">
						<div class="anim_to_left">
							<a href="#careers_1" class="children_anim careers_1">
								<?php echo $anchor_cr; ?>
							</a>
						</div>
					</li>
				<?php 
					endif; 
					if($anchor_contact):
				?>
					<li class="sinlge_anchor bar_items_anim">
						<div class="anim_to_left">
							<a href="#ge_1" class="children_anim ge_1">
								<?php echo $anchor_contact; ?>
							</a>
						</div>
					</li>
				<?php 
					endif; 
				?>
			</ul>
		</div>
	</div>

	<div class="main_content">
		<div class="contact_page">
			<section class="banner blue_head_sec">
				<div class="container">
					<div class="section_content">
						<div class="text_wrap">
							<div class="banner_title_bcg title_anim">
								<?php the_field( 'title_banner_bgc' ); ?>	
							</div>
							<h1 class="banner_title title_anim">
								<?php the_field( 'title_banner' ); ?>
							</h1>
						</div>
					</div>
				</div>
			</section>

			<section class="blue_bar anchors bg_mobile_anim visible-xs">
				<div class="blue_bg blue_head_sec white_all"></div>
				<div class="container">
					<div class="blue_title">
						<div class="title_mobile_anim"><?php the_field( 'anchor_heading' ); ?></div>
						<div class="line_mobile_anim">
							<div class="line_wrap children_anim">
								<div class="line"></div>
							</div>
						</div>
					</div>

					<ul class="anchor_wrap">
						<?php if($anchor_ac): ?>
							<li class="sinlge_anchor items_mobile_anim">
								<a href="#advisors_1">
									<?php echo $anchor_ac; ?>
								</a>
							</li>
						<?php 
							endif; 
							if($anchor_of):
						?>
							<li class="sinlge_anchor items_mobile_anim">
								<a href="#offices_1">
									<?php echo $anchor_of; ?>
								</a>
							</li>
						<?php 
							endif; 
							if($anchor_cr):
						?>
							<li class="sinlge_anchor items_mobile_anim">
								<a href="#careers_1">
									<?php echo $anchor_cr; ?>
								</a>
							</li>
						<?php 
							endif; 
							if($anchor_contact):
						?>
							<li class="sinlge_anchor items_mobile_anim">
								<a href="#ge_1">
									<?php echo $anchor_contact; ?>
								</a>
							</li>
						<?php 
							endif; 
						?>
					</ul>
				</div>
			</section>

			<section class="adv_cont blue_head_sec" id="advisors_1">
				<div class="container">
					<div class="adv_wrap">
						<div class="adv_top">
							<?php if(get_field( 'ac_title' )): ?>
								<h1 class="title_26 title_anim">
									<?php the_field( 'ac_title' ); ?>
								</h1>
							<?php
								endif;

								if(get_field( 'ac_p_text' )): 
							?>
								<div class="par_txt desc fade_anim_1">
									<?php the_field( 'ac_p_text' ); ?>
								</div>
							<?php 
								endif; 

								$advisors = get_field( 'advisors_ac' );

								if($advisors):
							?>

								<div class="advs_items_cont swiper-container fade_anim_1">
									<div class="advs_items_wrap swiper-wrapper">
										<?php 
											foreach ($advisors as $key => $value_adv): 
												$imgArrayAdv = get_field( 'thumbnail_adv', $value_adv->ID );
												$imgUrlAdv = $imgArrayAdv['sizes']['thumbnail'];
										?>

											<a href="<?php echo get_the_permalink($value_adv) ?>" class="single_adv swiper-slide">
												<div class="img_wrap">
													<div class="thub_img lazyBg" data-src="<?php echo $imgUrlAdv; ?>"></div>
												</div>
												<div class="text_wrap">
													<div class="name">
														<?php echo get_the_title($value_adv); ?>
													</div>
													<div class="role_wrap">
														<?php the_field( 'position_adv', $value_adv->ID ); ?>
													</div>
												</div>
											</a>

										<?php endforeach; ?>
									</div>
								</div>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

			<section class="adv_bot blue_head_sec">

				<div class="container">
					<div class="adv_bot_wrap">
						<?php if(get_field( 'ac_heading_text' )): ?>
							<h1 class="title_26 title_anim">
								<?php the_field( 'ac_heading_text' ); ?>
							</h1>
						<?php 
							endif; 

							if(get_field( 'ac_p_text_ad' )):
						?>

							<div class="desc fade_anim_1">
								<?php the_field( 'ac_p_text_ad' ); ?>
							</div>

						<?php endif; ?>
					</div>
				</div>

				<a href="<?php the_field( 'link_to_advisors_ac' ); ?>" class="adv_link">
					<div class="bar_title_anim"><span class="children_anim"><?php the_field( 'link_to_advisors_title_ac' ); ?></span></div>
					<div class="bar_line_anim">
						<div class="line_wrap children_anim">
							<div class="line"></div>
						</div>
					</div>
					<div class="line2 hidden-xs bar_line_anim_2"></div>
				</a>
			</section>

			<?php
				$offices_items = get_field( 'offices_rep' );

				if($offices_items):
			?>

				<section class="offices_cont blue_head_sec" id="offices_1">
					<h1 class="title_46 visible-xs title_anim">
						Offices
					</h1>

					<div class="side_bar">
						<div class="blue_title hidden-xs">
							<div class="bar_title_anim"><span class="children_anim">Locations</span></div>
							<div class="bar_line_anim">
								<div class="line_wrap children_anim">
									<div class="line"></div>
								</div>
							</div>
							<div class="line2 bar_line_anim_2"></div>
						</div>

						<div class="pag_office bar_items_anim">
							<div class="pag_office_cont">
								<div class="pag_office_wrap" data-nr="<?php echo count($offices_items); ?>">
									<?php foreach ($offices_items as $key => $value_pag): ?>

										<div class="single_pag" data-index="<?php echo $key ?>">
											<span class="children_anim"><?php echo $value_pag['office_name']; ?></span>
										</div>

									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>

					<div class="container">
						<h1 class="title_46 hidden-xs title_anim">
							Offices
						</h1>

						<div class="slider_office fade_anim_1">
							<div class="slider_office_cont">
								<div class="slider_office_wrap">
									<?php foreach ($offices_items as $key => $value_office): ?>

										<div class="single_office" data-index="<?php echo $key ?>">

											<div class="info_office">
												<div class="location">
													<img src="<?php echo get_template_directory_uri() . '/img/location.svg'; ?>" class="icon">

													<div class="text_wrap">
														<?php echo $value_office['office_address']; ?>
													</div>
												</div>

												<?php 
													$office_pep = $value_office['office_contacts'];

													if($office_pep):
														foreach ($office_pep as $key_pep => $value_off_cont): 
												?>

															<div class="single_pep">
																<img src="<?php echo get_template_directory_uri() . '/img/pep_icon.svg'; ?>" class="icon">
																<div class="text_wrap">
																	<div><?php echo $value_off_cont['contact_name_office']; ?></div>
																	<div><?php echo $value_off_cont['position_cont_office']; ?></div>
																	<a href="tel:<?php echo $value_off_cont['phone_cont_office']; ?>">
																		<?php echo $value_off_cont['phone_cont_office']; ?>
																	</a>
																	<a href="mailto:<?php echo $value_off_cont['email_cont_office']; ?>">
																		<?php echo $value_off_cont['email_cont_office']; ?>
																	</a>
																</div>
															</div>

												<?php 
														endforeach;
													endif; 
												?>
											</div>

											<?php 
												$map = $value_office['map_location_office'];

												if($map):
											?>
													<div class="map_office">
														<div class="map" id="map_<?php echo $key; ?>" data-lat="<?php echo $map['lat'] ?>" data-lng="<?php echo $map['lng'] ?>" data-marker="">
														</div>
													</div>
											<?php endif; ?>

										</div>

									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</section>

			<?php endif; ?>

			<section class="careers_cont blue_head_sec" id="careers_1">
				<div class="side_bar hidden-xs">
					<div class="blue_title">
						<div class="bar_title_anim"><span class="children_anim"><?php the_field( 'sidebar_title_care' ); ?></span></div>
						<div class="bar_line_anim">
							<div class="line_wrap children_anim">
								<div class="line"></div>
							</div>
						</div>
					</div>
					<div class="bar_items_anim">
						<div class="wysiwyg children_anim">
							<?php the_field( 'sidebar_desc_car' ); ?>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="careers_wrap">
						<div class="header_wrap">
							<?php if(get_field( 'title_careers' )): ?>
								<h1 class="title_46 title_anim">
									<?php the_field( 'title_careers' ); ?>
								</h1>
							<?php 
								endif;

								if(get_field( 'desc_careers' )):
							?>

								<div class="desc fade_anim_1">
									<?php the_field( 'desc_careers' ); ?>
								</div>

							<?php endif; ?>
						</div>

						<?php 
							$jobs = get_field( 'jobs_careers' );

							if($jobs):
						?>
							<div class="jobs_cont swiper-container fade_anim_2">
								<div class="jobs_wrap swiper-wrapper">
									<?php foreach ($jobs as $key => $value_job):?>
										<a href="<?php echo $value_job['ext_link_job']; ?>" class="single_job swiper-slide" target="_blank">
											<div class="location">
												<?php echo $value_job['location_job']; ?>
											</div>
											<h2 class="title_26">
												<?php echo $value_job['title_job']; ?>
											</h2>
											<div class="desc">
												<?php echo $value_job['desc_job']; ?>
												<div class="apply_btn">
													Apply
												</div>
											</div>
										</a>
									<?php endforeach; ?>
								</div>

								<div class="pag_wrap visible-xs">
									<div class="swiper-pagination"></div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<section class="ge_cont blue_head_sec" id="ge_1">
				<div class="container">
					<div class="ge_wrap">

						<div class="left_wrap">
							<?php if(get_field( 'title_ge' )): ?>
								<h1 class="title_46 title_anim">
									<?php the_field( 'title_ge' ); ?>
								</h1>
							<?php 
								endif; 

								if(get_field( 'paragraph_ge' )):
							?>
								<div class="desc fade_anim_1">
									<?php the_field( 'paragraph_ge' ); ?>
								</div>
							<?php endif; ?>
						</div>

						<div class="right_wrap fade_anim_2">
							<div class="ty_message_cont">
								<div class="ty_message_wrap">
									<div class="ty_message">
										<?php if(get_field( 'conf_msg_title' )): ?>
											<h2 class="title_26">
												<?php the_field( 'conf_msg_title' );?>
											</h2>
										<?php 
											endif; 
											if(get_field( 'conf_msg_desc' )):
										?>
											<div class="wysiwyg">
												<?php the_field( 'conf_msg_desc' ); ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="form_wrap">
								<?php 
									$contact_form = do_shortcode('[contact-form-7 id="5" title="Contact"]');
									$form = str_replace(array('<p>','</p>'),'',$contact_form);
									echo $form;
								?>
							</div>
						</div>

					</div>
				</div>
			</section>
		</div>
	</div>
</main>

<?php get_footer(); ?>