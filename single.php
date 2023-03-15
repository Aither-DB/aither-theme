<?php
get_header();
epic_get_template('header-true.php');
?>

<main role="main" class="division">
	<div class="blue_bar insights_single">
		<div class="blue_bar_wrap">
			<?php 
				$peopleRel = get_field( 'authors_post' );

				if($peopleRel):
			?>

				<div class="pep_rel_cont bg_mobile_anim">
					<div class="blue_bg blue_head_sec white_all visible-xs"></div>
					<div class="blue_title">
						<div class="bar_title_anim title_mobile_anim"><span class="children_anim">The Authors</span></div>
						<div class="bar_line_anim line_mobile_anim">
							<div class="line_wrap children_anim">
								<div class="line"></div>
							</div>
						</div>
					</div>

					<div class="pep_rel_slider swiper-container">
						<div class="pep_rel_wrap swiper-wrapper">
							<?php foreach ($peopleRel as $key => $value_pep):
								$imgArrayPost = get_field( 'thumbnail_adv', $value_pep->ID );
								$imgUrlPost = $imgArrayPost['sizes']['thumbnail'];
							?>

								<a href="<?php echo get_the_permalink($value_pep); ?>" class="single_rel_pep slides_bar_anim swiper-slide">
									<div class="anim_to_left">
										<div class="thum_img children_anim_adv lazyBg" data-src="<?php echo $imgUrlPost; ?>"></div>
										<div class="name children_anim">
											<span class="hidden-xs"><?php echo get_the_title($value_pep); ?></span>
											<div class="visible-xs">
												<?php the_field( 'first_name_adv',$value_pep->ID  ); ?>
											</div>
											<div class="visible-xs">
												<?php the_field( 'last_name_adv',$value_pep->ID  ); ?>
											</div>
										</div>
										<div class="role_wrap children_anim hidden-xs">
											<?php the_field( 'position_adv', $value_pep->ID ); ?>
										</div>
									</div>
								</a>

							<?php endforeach; ?>
						</div>
					</div>
				</div>

			<?php endif; ?>

			<div class="share_wrap hidden-xs">
				<div class="blue_title">
					<div class="bar_title_anim title_mobile_anim"><span class="children_anim">Share this insight</span></div>
					<div class="bar_line_anim line_mobile_anim">
						<div class="line_wrap children_anim">
							<div class="line"></div>
						</div>
					</div>
				</div>

				<div class="shaer_items">
					<a class="twitter bar_items_anim" href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;hashtags=tiv" target="_blank">
					 	<i class="fa fa-twitter children_anim"></i>
					</a>

					<a class="link bar_items_anim" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank">
						<i class="fa fa-linkedin children_anim"></i>
					</a>

					<!-- Email -->
				    <a class="email bar_items_anim" href="mailto:?Subject=<?php the_title(); ?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php the_permalink(); ?>">
				        <i class="fa fa-envelope children_anim"></i>
					</a>

					<a class="fb bar_items_anim" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
					    <i class="fa fa-facebook-f children_anim"></i>
					</a>
				</div>
			</div>


			<?php 
				$thisInsights = get_field( 'related_insights' );

				if($thisInsights):
			?>
				<div class="rel_ins_cont bg_mobile_anim">
					<div class="blue_bg blue_head_sec white_all visible-xs"></div>
					<div class="blue_title">
						<div class="bar_title_anim title_mobile_anim"><span class="children_anim"><?php the_field( 'first_name_adv' ); ?><span> Insights</span></span></div>
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
										<div class="desc children_anim hidden-xs"><?php echo mb_ucfirst(get_field( 'short_description', $value_ins ), 68); ?></div>
										<div class="desc children_anim visible-xs"><?php echo mb_ucfirst(get_field( 'short_description', $value_ins ), 54); ?></div>
									</div>
									<div class="line children_anim hidden-sm hidden-xs"></div>
								</a>

							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php 
				endif; 
			?>
		</div>
	</div>

	<div class="main_content">
		<div class="insights_single">
			
			<img class="dots_bg hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_insights.png" />
			<img class="dots_bg bottom hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_insights.png" />

			<section class="banner blue_head_sec">

				<img class="dots_bg hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_insights.png" />

				<div class="container">
					<div class="section_content">
						<div class="text_wrap">
							<div class="banner_title_bcg title_anim">Insight</div>
							<h1 class="banner_title title_anim"><?php the_title(); ?></h1>
						</div>

						<div class="date_wrap title_anim">
							<?php the_time('F jS Y'); ?>
						</div>

						<?php if($peopleRel): ?>
							<div class="authors_wrap title_anim visible-xs">
								<span>By </span>
								<?php foreach ($peopleRel as $key => $value_pep2): ?>
									<a href="<?php echo get_the_permalink($value_pep2); ?>" class="single_pep">
										<?php echo get_the_title($value_pep2); ?>
										<span class="sep">and</span>
									</a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<?php 
				$btnVideo = get_field( 'has_video' );
				$hero_img = get_field( 'hero_image' );
				$hero_img_url = $hero_img['sizes']['large'];
				$video = get_field( 'video_url' );

				if($hero_img || $video):
			?>

				<section class="hero_img_sec qoute_anim blue_head_sec">
					<div class="container">

						<?php if($btnVideo): ?>

							<div class="video_cont">
								<div class="video_wrap">
									<?php 
										$iframe = $video;
										preg_match('/src="(.+?)"/', $iframe, $matches);
										$src = $matches[1];
										// add extra params to iframe src
										$src_array = parse_url($src);
										if ($src_array['host'] == 'www.youtube.com') {
											$params = array(
											    'controls'		=> 0,
											    'hd'			=> 1,
											    'autohide'		=> 1,
											    'autoplay'		=> 1
											);
											$new_src = add_query_arg($params, $src);
											$youtube_key = substr($src_array["path"],7);
											echo "<div id='ytplayer_".rand(0, 1000)."' class='ytplayer' data-key='".$youtube_key."'></div>";
										} elseif ( $src_array['host'] == 'player.vimeo.com' ) {
								            $params = array(
								                'autoplay'      => 0,
								                'loop'          => 0,
								                'portrait'      => 0,
								                'badge'         => 0,
								                'byline'        => 0,
								                'player_id'     => 'vimeo_video_single'
								            );
								            $new_src = add_query_arg($params, $src);
								            echo "<iframe class='intro_vid vimeo_video' id='vimeo_video_single_".rand(0, 1000)."' data-key='vimeo_".rand(0, 1000)."' frameborder='0' src='" . $new_src . "'></iframe>";
								        }
									?>
								</div>

								<div class="image_video lazyBg" data-src="<?php echo $hero_img_url; ?>"></div>

								<div class="play_btn">
									<i class="fa fa-play"></i>
									<!-- <i class="fa fa-stop"></i> -->
								</div>
							</div>

						<?php else: ?>

							<div class="hero_img lazyBg" data-src="<?php echo $hero_img_url; ?>"></div>

						<?php endif; ?>

					</div>
				</section>
			<?php
				endif;

				if( have_rows('page_builder_news') ):
					$globalIndex = 1;

					while ( have_rows('page_builder_news') ) : the_row();

						if( get_row_layout() == 'open_text_section' ):

			
						$open_txt_title = get_sub_field( 'title_open_txt' );
						$open_txt = get_sub_field( 'open_text' );
					?>

						<section class="open_txt_sec blue_head_sec">
							<div class="container">
								<div class="open_txt_wrap">
									<?php if($open_txt_title): ?>
										<h2 class="title_26 title_anim"><?php echo $open_txt_title; ?></h2>
									<?php 
										endif; 

										if($open_txt):
									?>

										<div class="desc qoute_anim wysiwyg">
											<?php echo $open_txt; ?>
										</div>

									<?php endif; ?>
								</div>
							</div>
						</section>
					<?php 
						endif;

						if( get_row_layout() == 'block_quote' ):

						$block_qoute = get_sub_field( 'quote_bq' );
						$author_bq = get_sub_field( 'author_bq' );
					?>

						<section class="bq_sec blue_head_sec">
							<div class="container">
								<div class="bq_wrap">
									<?php if($block_qoute): ?>
										<div class="qoute_block">
											<div class="qoute_anim"><?php echo $block_qoute; ?></div>
											<div class="line line_q_anim"></div>
										</div>
									<?php 
										endif; 

										if($author_bq):
									?>
										<div class="ath_wrap qoute_anim">
											<?php echo $author_bq; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</section>
					<?php 
						endif; 

						if( get_row_layout() == 'embedded_video' ):

						$video_sec = get_sub_field( 'video_section' );
						$video_img = get_sub_field( 'video_image' );
						$video_img_url = $video_img['sizes']['large'];
						$video_title = get_sub_field( 'video_title_page' );
					?>

						<section class="page_video blue_head_sec">
							<div class="container">

								<div class="video_cont qoute_anim">
									<div class="video_wrap">
										<?php 
											$iframe = $video_sec;
											preg_match('/src="(.+?)"/', $iframe, $matches);
											$src = $matches[1];
											// add extra params to iframe src
											$src_array = parse_url($src);
											if ($src_array['host'] == 'www.youtube.com') {
												$params = array(
												    'controls'		=> 0,
												    'hd'			=> 1,
												    'autohide'		=> 1,
												    'autoplay'		=> 1
												);
												$new_src = add_query_arg($params, $src);
												$youtube_key = substr($src_array["path"],7);
												echo "<div id='ytplayer_".rand(0, 1000)."' class='ytplayer' data-key='".$youtube_key."'></div>";
											} elseif ( $src_array['host'] == 'player.vimeo.com' ) {
									            $params = array(
									                'autoplay'      => 0,
									                'loop'          => 0,
									                'portrait'      => 0,
									                'badge'         => 0,
									                'byline'        => 0,
									                'player_id'     => 'vimeo_video_single'
									            );
									            $new_src = add_query_arg($params, $src);
									            echo "<iframe class='intro_vid vimeo_video' id='vimeo_video_single_".rand(0, 1000)."' data-key='vimeo_".rand(0, 1000)."' frameborder='0' src='" . $new_src . "'></iframe>";
									        }
										?>
									</div>

									<div class="image_video lazyBg" data-src="<?php echo $video_img_url; ?>"></div>

									<div class="play_btn">
										<i class="fa fa-play"></i>
										<!-- <i class="fa fa-stop"></i> -->

										<div class="title_video">
											<?php echo $video_title; ?>
										</div>

										<div class="video_time">

										</div>
									</div>
								</div>

							</div>
						</section>

					<?php 
						endif; 

						if( get_row_layout() == 'file_download' ):

						$file = get_sub_field( 'file_down' );
						$file_desc = get_sub_field( 'desc_file_down' );
						$file_title = get_sub_field( 'title_file_doww' );
					?>

						<section class="file_sec blue_head_sec">
							<div class="container">
								<div class="file_wrap">
									<?php if($file_title): ?>
										<h2 class="title_26 title_anim">
											<?php echo $file_title; ?>
										</h2>
									<?php 
										endif; 

										if($file_desc):
									?>
										<div class="file_desc qoute_anim">
											<?php echo $file_desc; ?>
										</div>
									<?php endif; ?>

									<?php if($file): ?>

										<a href="<?php echo $file['url']; ?>" class="file_btn qoute_anim" target="_blank">
											<img src="<?php echo get_template_directory_uri() ?>/img/big_file.svg" class="file_icon svg_inject">
											<div class="file_info">
												<div class="file_name">
													<?php echo $file['title']; ?>
													<span class="arrow"></span>
												</div>
												<div class="file_size">
													<?php echo size_format(filesize( get_attached_file( $file['id'] ) ));?>
												</div>

												<span class="arrow"></span>
											</div>
										</a>

									<?php endif; ?>
								</div>
							</div>
						</section>

					<?php 
						endif; 

						if( get_row_layout() == 'gallery' ):

						$gallery = get_sub_field( 'gallery_rep' );

							if($gallery):
					?>

							<section class="gallery_section blue_head_sec white_all swiper-container qoute_anim">

								<div class="gallery_pag top visible-xs">
									<div class="pag_wrap">
										<div class="pag_txt">
											<span class="cur_slide_2">1</span>
											<span>of</span>
											<span><?php echo count($gallery); ?></span>
										</div>
									</div>
								</div>

								<div class="gallery_wrap swiper-wrapper">

									<?php foreach ($gallery as $key => $value_gallery): 
										$gal_img = $value_gallery['gallery_img'];
										$gal_img_url = $gal_img['sizes']['large'];
										$photo = $value_gallery['photographer'];
										$img_desc = $value_gallery['image_desc'];
									?>
										<div class="single_gallery swiper-slide">

											<?php if($photo): ?>
												<div class="desc_gallery top visible-xs">
													<div class="desc_gallery_wrap">
														<?php if($photo): ?>
															<div class="photo">
																<?php echo $photo; ?>
															</div>
														<?php 
															endif;
														?>
													</div>
												</div>
											<?php endif; ?>

											<div class="bg_img lazyBg" data-src="<?php echo $gal_img_url; ?>"></div>

											<?php if($photo || $img_desc): ?>
												<div class="desc_gallery">
													<div class="desc_gallery_wrap">
														<?php if($photo): ?>
															<div class="photo hidden-xs">
																<?php echo $photo; ?>
															</div>
														<?php 
															endif;

															if($img_desc): 
														?>
															<div class="img_desc">
																<?php echo $img_desc; ?>
															</div>
														<?php endif; ?>
													</div>
												</div>
											<?php endif; ?>
										</div>
									<?php endforeach; ?>

								</div>

								<div class="swiper-pagination"></div>

								<div class="swiper-button-prev prev_btn visible-xs"></div>
					    		<div class="swiper-button-next next_btn visible-xs"></div>

								<div class="gallery_pag hidden-xs">
									<div class="pag_wrap">
										<div class="pag_txt hidden-xs">
											<span class="cur_slide">1</span>
											<span>of</span>
											<span><?php echo count($gallery); ?></span>
										</div>
										<div class="swiper-button-prev prev_btn"></div>
					    				<div class="swiper-button-next next_btn"></div>
					    			</div>
				    			</div>

							</section>
			<?php 
							endif; 
						endif; 

						if(get_row_layout() == 'inline_image'): 
							$img = get_sub_field('image_ii');
							$img_url = $img ? $img['sizes']['large'] : array();
					?>

							<section class="inline_image blue_head_sec">
								<div class="container">
									<div class="inline_image_wrap">
										<img data-src="<?php echo $img_url; ?>" class="qoute_anim lazyImg">
										<div class="wysiwyg qoute_anim"><?php echo get_sub_field('reference_text_ii'); ?></div>
									</div>
								</div>
							</section>
					<?php
						endif;

						if(get_row_layout() == 'full_width_image_graph'):
							$img_or_graph = get_sub_field('image_or_graph');
							$img_full = get_sub_field('image_fwig');
							$img_full_url = $img_full ? $img_full['sizes']['large'] : array();
					?>

							<section class="full_img_sec blue_head_sec">
								<?php if($img_or_graph): ?>
									<div class="img lazyBg" data-src="<?php echo $img_full_url; ?>"></div>
								<?php 
									else: 
								?>
									<div class="container">
										<div class="full_graph qoute_anim">
											<?php 
												echo get_sub_field('graph_script');
											?>
										</div>
									</div>
								<?php endif; ?>
							</section>
					<?php 
						endif;

						if(get_row_layout() == 'table_builder'):
					 ?>

							<section class="table_section blue_head_sec">
								<div class="container">
									<div class="table_top">
										<?php if(get_sub_field('title_table')): ?>
											<h3><?php echo get_sub_field('title_table'); ?></h3>
										<?php 
											endif;
											if(get_sub_field('desc_table')):
										?>
											<p><?php echo get_sub_field('desc_table'); ?></p>
										<?php endif; ?>
									</div>
									<?php 
										$table_th = get_sub_field('table_header') ? get_sub_field('table_header') : array();
										$table_body = get_sub_field('table_tb') ? get_sub_field('table_tb') : array();
									?>
									<div class="table_wrap">
										<div class="table_scrl">
											<table>
												<thead>
													<tr>
														<?php 
															foreach ($table_th as $key => $th_val): 
																$isSplit = $th_val['is_split'];
																$subCell = $th_val['header_cells'] ? $th_val['header_cells'] : array();
														?>
															<th class="<?php if($isSplit){echo 'split';} ?>" <?php if($isSplit){echo 'colspan="2"';} ?>>
																<div class="desc_hd">
																	<div class="hd_table"><?php echo $th_val['th_cell']; ?></div>
																	<?php if($isSplit): ?>
																		<table>
																			<tr>
																				<?php foreach ($subCell as $key => $sc_val): ?>
																					<th>
																						<div class="hd_table"><?php echo $sc_val['header_cell'] ?></div>
																					</th>
																				<?php endforeach; ?>
																			</tr>
																		</table>
																	<?php endif; ?>
																</div>
															</th>
														<?php endforeach; ?>
													</tr>
												</thead>
												<tbody>
													<?php 
														foreach ($table_body as $key => $tbody_val):
															$cells =  $tbody_val['cells'];
															if($cells):
													?>
															<tr>
																<?php 
																	foreach ($cells as $key => $cell): 
																		$cell_val = $cell['cell'];
																		$isArrow = $cell['arrow_app'];
																		$arrow = $cell['arrow_top_bot'];
																		if($cell_val):
																?>	
																		<td>
																			<div class="data<?php if($isArrow){echo ' is_arrow';} ?>">
																				<span><?php echo $cell_val; ?></span>
																				<?php if($isArrow): ?>
																					<span class="arrow <?php if($arrow){echo 'up';}else{echo 'down';} ?>">
																					</span>
																				<?php endif; ?>
																			</div>
																		</td>
																<?php 
																		endif;
																	endforeach; 
																?>
															</tr>
													<?php 
															endif;
														endforeach; 
													?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="table_fot">
										<?php
											if(get_sub_field('foot_table')):
										?>
											<?php echo get_sub_field('foot_table'); ?>
										<?php endif; ?>
									</div>
								</div>
							</section>


					<?php 
						endif;
						if ($globalIndex == 1): 
					?>
							<section class="blue_bar share_cont blue_head_sec bg_mobile_anim visible-xs">
							<div class="blue_bg blue_head_sec white_all"></div>
							<div class="container">
								<div class="share_wrap">
									<div class="blue_title">
										<div class="title_name title_mobile_anim">Share this insight</div>
										<div class="line_mobile_anim">
											<div class="line_wrap children_anim">
												<div class="line"></div>
											</div>
										</div>
									</div>

									<div class="shaer_items">
										<a class="twitter slides_bar_anim" href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;hashtags=tiv" target="_blank">
										 	<i class="fa fa-twitter"></i>
										</a>

										<a class="link slides_bar_anim" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank">
											<i class="fa fa-linkedin"></i>
										</a>

										<!-- Email -->
									    <a class="email slides_bar_anim" href="mailto:?Subject=<?php the_title(); ?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php the_permalink(); ?>">
									        <i class="fa fa-envelope"></i>
										</a>

										<a class="fb slides_bar_anim" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
										    <i class="fa fa-facebook-f"></i>
										</a>
									</div>
								</div>
							</div>
						</section>
						<?php endif; $globalIndex++; ?>
					<?php endwhile;
				endif;
			?>
		</div>
	</div>
</main>

<?php //echo do_shortcode('[post-views]'); ?>

<?php get_footer(); ?>
