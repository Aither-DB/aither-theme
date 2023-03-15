<?php
/*
Template Name: Sectors / Services template
*/

get_header();
epic_get_template('header-true.php');

global $post;

	$post_id = $post->ID;

wp_reset_postdata();

 
$btn_tf = get_field( 'soe_btn' );

?>

<main role="main" class="division">
	<div class="blue_bar sec_ser_temp<?php if($btn_tf){echo ' simple';} ?>">
		<div class="blue_bar_wrap">

			<div class="blue_title title_bar hidden-xs">
				<div class="bar_title_anim">
					<span class="children_anim">
						<?php 
							if(get_field( 'page_title' )){
								the_field( 'page_title' ); 
							}else {
								echo get_the_title($post_id);
							}
						?>
					</span>
				</div>
				<div class="bar_line_anim line_mobile_anim">
					<div class="line_wrap children_anim">
						<div class="line"></div>
					</div>
				</div>
			</div>

			<?php  
				$links_ltos = get_field( 'links_ot_secs' );

				if($links_ltos):
			?>

			 	<ul class="ltos_wrap hidden-xs">
			 		<?php foreach ($links_ltos as $key => $value_ltos):
			 			$id_ltos = $value_ltos['link_oth_sector']; 
			 		?>

			 			<li class="single_ltos bar_items_anim">
			 				<div class="anim_to_left">
				 				<a href="<?php echo get_the_permalink($id_ltos) ?>" class="children_anim">
				 					<?php 
										if(get_field( 'page_title', $id_ltos )){
											the_field( 'page_title', $id_ltos ); 
										}else {
											echo get_the_title($id_ltos);
										}
									?>
				 				</a>
				 			</div>
			 			</li>

			 		<?php endforeach; ?>
			 	</ul>

			 <?php 
				endif; 

				$peopleRel = get_field( 'lead_advisors' );

				if($peopleRel):
			?>

				<div class="pep_rel_cont hidden-xs">
					<div class="blue_title">
						<div class="bar_title_anim"><span class="children_anim">Lead Advisors</span></div>
						<div class="bar_line_anim">
							<div class="line_wrap children_anim">
								<div class="line"></div>
							</div>
						</div>
					</div>

					
					<div class="pep_rel_wrap">
						<?php foreach ($peopleRel as $key => $value_pep):
							$imgArrayPost = get_field( 'thumbnail_adv', $value_pep->ID );
							$imgUrlPost = $imgArrayPost['sizes']['thumbnail'];
						?>

							<a href="<?php echo get_the_permalink($value_pep); ?>" class="single_rel_pep bar_items_anim">
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

			<?php 
				endif; 

				$thisInsights = get_field( 'key_insights' );

				if($thisInsights):
			?>
				<div class="rel_ins_cont bg_mobile_anim">
					<div class="blue_bg blue_head_sec white_all visible-xs"></div>
					<div class="blue_title">
						<div class="bar_title_anim title_mobile_anim"><span class="children_anim">Key Insights</span></div>
						<div class="bar_line_anim line_mobile_anim">
							<div class="line_wrap children_anim">
								<div class="line"></div>
							</div>
						</div>
					</div>

					<div class="rel_ins_slider swiper-container">
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

										<div class="img_thumb children_anim lazyBg" data-src="<?php echo $imgThumb; ?>"></div>
										<div class="desc children_anim hidden-sm hidden-xs"><?php echo mb_ucfirst(get_field( 'short_description', $value_ins ), 68); ?></div>
										<div class="desc children_anim visible-sm visible-xs"><?php echo mb_ucfirst(get_field( 'short_description', $value_ins ), 54); ?></div>
									</div>
									<div class="line children_anim hidden-sm hidden-xs"></div>
								</a>

							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php 
				endif; 

				$discuss_ext = get_field( 'external_links' );
				$discuss_int = get_field( 'internal_links' );

				if($discuss_ext || $discuss_int):
			?>

				<div class="dic_wrap hidden-xs">
					<div class="blue_title">
						<div class="bar_title_anim title_mobile_anim"><span class="children_anim">Discuss</span></div>
						<div class="bar_line_anim line_mobile_anim">
							<div class="line_wrap children_anim">
								<div class="line"></div>
							</div>
						</div>
					</div>

					<ul class="dic_sec">
						<?php 
							if($discuss_ext):
								foreach ($discuss_ext as $key => $value_ext): 
									$link_ext_obj = $value_ext['ext_link'];
									$link_ext_url = $link_ext_obj['url'];
									$link_ext_title = $link_ext_obj['title'];
									$link_ext_target = $link_ext_obj['target'] ? $link_ext_obj['target'] : '_self';
						?>

										<li class="single_dic bar_items_anim">
											<div class="anim_to_left">
												<a href="<?php echo $link_ext_url; ?>" target="<?php echo $link_ext_target; ?>" class="children_anim">
													<?php echo $link_ext_title; ?>
												</a>
											</div>
										</li>

						<?php 
								endforeach;
							endif;

							if($discuss_int):
								foreach ($discuss_int as $key => $value_int):
									$id_int = $value_int['int_link'];
									$link_ext_url = get_the_permalink($id_int);
									$link_ext_title = get_the_title($id_int);
						?>
										<li class="single_dic bar_items_anim">
											<div class="anim_to_left">
												<a href="<?php echo $link_ext_url; ?>" class="children_anim">
													<?php echo $link_ext_title; ?>
												</a>
											</div>
										</li>
						<?php 
								endforeach;
							endif;
						?>
					</ul>
				</div>

			<?php endif; ?>

		</div>
	</div>

	<div class="main_content">
		<div class="sec_ser_temp">
			<?php 
				$bg_desktop = get_field( 'bg_img' );
				$bg_tablet = get_field( 'bg_img_tablet' );
				$bg_mobile = get_field( 'bg_img_mobile' );

				$bg_desktop_url = $bg_desktop['sizes']['large'];
				$bg_tablet_url = $bg_tablet['sizes']['medium_large'];
				$bg_mobile_url = $bg_mobile['sizes']['medium'];
			?>

			<section class="banner_template blue_head_sec white_all lazyBg nhb" data-src="<?php echo $bg_desktop_url; ?>" data-src-sm="<?php echo $bg_tablet_url; ?>" data-src-xs="<?php echo $bg_mobile_url; ?>">
				<div class="container">
					<h1 class="page_title title_anim">
						<?php 
							if(get_field( 'page_title' )){
								the_field( 'page_title' ); 
							}else {
								echo get_the_title($post_id);
							}
						?>
					</h1>
				</div>
			</section>

			<section class="open_sec blue_head_sec">
				<div class="container">
					<div class="open_wrap">
						<?php if(get_field( 'open_txt_title' )): ?>
							<h2 class="title_26 title_anim">
								<?php the_field( 'open_txt_title' ); ?>
							</h2>
						<?php endif; ?>

						<div class="open_grid">

							<?php if(get_field( 'open_txt_wysiwyg_left' )): ?>

								<div class="wysiwyg fade_anim_1">
									<?php the_field( 'open_txt_wysiwyg_left' ); ?>
								</div>

							<?php
								endif;

								if(get_field( 'open_txt_wysiwyg_right' )): 
							?>
								<div class="wysiwyg fade_anim_2">
									<?php the_field( 'open_txt_wysiwyg_right' ); ?>
								</div>

							<?php endif; ?>
						</div>
					</div>
				</div>

				<?php if($btn_tf): ?>
					<img class="dots_bg simple hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_bg_big.png" />
				<?php else: ?>
					<img class="dots_bg extended hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_bg.png" />
				<?php endif; ?>
				
			</section>

			<section class="blue_bar pep_mobile visible-xs">
				<?php
					if($peopleRel):
				?>

					<div class="pep_rel_cont bg_mobile_anim">
						<div class="blue_bg blue_head_sec white_all"></div>
						<div class="blue_title">
							<div class="bar_title_anim title_mobile_anim">Lead Advisors</div>
							<div class="line_mobile_anim">
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
										<div class="thum_img lazyBg" data-src="<?php echo $imgUrlPost; ?>"></div>
										<div class="name">
											<?php echo get_the_title($value_pep); ?>
										</div>
										<div class="role_wrap">
											<?php the_field( 'position_adv', $value_pep->ID ); ?>
										</div>
									</a>

								<?php endforeach; ?>
							</div>
						</div>

					</div>

				<?php 
					endif; 
				?>
			</section>
		
			<section class="ser_cont blue_head_sec<?php if($btn_tf){echo ' ser_simple_section';} ?>">

				<div class="container">
					<?php if(get_field( 'title_services' )): ?>
						<h1 class="title_26 title_anim">
							<?php the_field( 'title_services' ); ?>
						</h1>
					<?php 
						endif; 

						if($btn_tf):
							$simple = get_field( 'simple_services' );

							if($simple):
					?>
								<div class="ser_simple_cont swiper-container fade_anim_1">	
									<ul class="ser_wrap simple swiper-wrapper">
										<?php foreach ($simple as $key => $value_simple): ?>

											<li class="single_simple swiper-slide">
												<div class="wysiwyg">
													<?php echo $value_simple['p_simple_ser']; ?>
												</div>
											</li>

										<?php endforeach; ?>
									</ul>
								</div>
					<?php 
							endif;
						else: 
					?>

						<div class="ser_wrap extended">

							<?php 
								$extended = get_field( 'extended_services' );

								if($extended):
							?>

									<div class="tiles_cont fade_anim_1 hidden-xs">
										<div class="tiles_wrap">
											<?php foreach ($extended as $key => $value_tile): 

												if($key < 9){
													$nr_zero = 0;
												}else {
													$nr_zero = '';
												}

											?>

												<div class="single_tile" data-index="<?php echo $key; ?>" data-key="<?php echo $nr_zero; echo $key+1; ?>">
													<?php echo $value_tile['title_ext_ser']; ?>
												</div>

											<?php endforeach; ?>
										</div>
									</div>


									<div class="desc_ext_cont fade_anim_1">
										<div class="desc_ext_wrap">
											<?php foreach ($extended as $key => $value_desc): 

													if($key < 9){
														$nr_zero = 0;
													}else {
														$nr_zero = '';
													}

											?>

												<div class="single_desc_ext" data-index="<?php echo $key; ?>" data-key="<?php echo $nr_zero; echo $key+1; ?>">
													<div class="single_tile visible-xs">
														<?php echo $value_desc['title_ext_ser']; ?>
													</div>

													<div class="wysiwyg">
														<?php echo $value_desc['desc_ext_ser']; ?>
													</div>
												</div>

											<?php endforeach; ?>
										</div>

										<div class="swiper-pagination visible-xs"></div>
									</div>

							<?php endif; ?>

						</div>	

					<?php endif; ?>
				</div>
			</section>

			<?php
				if($discuss_ext || $discuss_int):
			?>
				<section class="blue_bar disc_mobile blue_head_sec white_all visible-xs blue_head_sec">
					<div class="dic_wrap bg_mobile_anim visible-xs">
						<div class="blue_title">
							<div class="title_mobile_anim">Discuss</div>
							<div class="line_mobile_anim">
								<div class="line_wrap children_anim">
									<div class="line"></div>
								</div>
							</div>
						</div>

						<ul class="dic_sec">
							<?php 
								if($discuss_ext):
									foreach ($discuss_ext as $key => $value_ext): 
										$link_ext_obj = $value_ext['ext_link'];
										$link_ext_url = $link_ext_obj['url'];
										$link_ext_title = $link_ext_obj['title'];
										$link_ext_target = $link_ext_obj['target'] ? $link_ext_obj['target'] : '_self';
							?>

											<li class="single_dic items_mobile_anim">
												<a href="<?php echo $link_ext_url; ?>" target="<?php echo $link_ext_target; ?>">
													<?php echo $link_ext_title; ?>
												</a>
											</li>

							<?php 
									endforeach;
								endif;

								if($discuss_int):
									foreach ($discuss_int as $key => $value_int):
										$id_int = $value_int['int_link'];
										$link_ext_url = get_the_permalink($id_int);
										$link_ext_title = get_the_title($id_int);
							?>
											<li class="single_dic items_mobile_anim">
												<a href="<?php echo $link_ext_url; ?>" >
													<?php echo $link_ext_title; ?>
												</a>
											</li>
							<?php 
									endforeach;
								endif;
							?>
						</ul>
					</div>
				</section>

			<?php endif; ?>

			<section class="spe_cont blue_head_sec">
				<div class="container">
					<h1 class="title_26 title_anim">
						<?php the_field( 'title_spe' ); ?>
					</h1>

					<?php 
						$spe_items = get_field( 'slider_spe' );

						if($spe_items):
					?>

						<div class="spe_wrap fade_anim_1 swiper-container">
							<div class="spe_items swiper-wrapper">
								<?php foreach ($spe_items as $key => $value_spe): ?>

									<div class="single_spe swiper-slide">
										<div class="wysiwyg">
											<?php echo $value_spe['desc_spe_slider']; ?>
										</div>
									</div>

								<?php endforeach; ?>
							</div>

							<div class="swiper-pagination"></div>
						</div>

					<?php endif; ?>
				</div>
			</section>

		</div>
	</div>
</main>

<?php get_footer(); ?>