<?php
get_header();
epic_get_template('header-true.php');
?>

<main role="main" class="division">
	<div class="blue_bar hidden-xs default_temp">

	</div>

	<div class="main_content">
		<div class="default_temp default_temp_style">

			<img class="dots_bg hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_insights.png" />
			<img class="dots_bg bottom hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_insights.png" />

			<section class="banner blue_head_sec">

				<img class="dots_bg hidden-sm hidden-xs lazyImg" data-src="<?php echo get_template_directory_uri() ?>/img/dots_insights.png" />

				<div class="container">
					<div class="section_content">
						<div class="text_wrap">
							<div class="banner_title_bcg title_anim"><?php the_field( 'title_bgc_dt' ); ?></div>
							<h1 class="banner_title title_anim"><?php the_title(); ?></h1>
						</div>

						<!-- <div class="date_wrap title_anim">
							<?php //the_time('F jS Y'); ?>
						</div> -->

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
				$btnVideo = get_field( 'has_video_dt' );
				$hero_img = get_field( 'hero_image_dt' );
				$hero_img_url = $hero_img['sizes']['large'];
				$video = get_field( 'video_url_dt' );
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
				if( have_rows('page_builder_dt') ):
					$globalIndex = 1;

					while ( have_rows('page_builder_dt') ) : the_row();

						if( get_row_layout() == 'open_text_section_dt' ):

			
						$open_txt_title = get_sub_field( 'title_open_txt_dt' );
						$open_txt = get_sub_field( 'open_text_dt' );
					?>

						<section class="open_txt_sec blue_head_sec">
							<div class="container">
								<div class="open_txt_wrap">
									<?php if($open_txt_title): ?>
										<h1 class="title_26 title_anim"><?php echo $open_txt_title; ?></h1>
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

						if( get_row_layout() == 'block_quote_dt' ):

						$block_qoute = get_sub_field( 'quote_bq_dt' );
						$author_bq = get_sub_field( 'author_bq_dt' );
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

						if( get_row_layout() == 'list_dt' ):

						$list_title = get_sub_field( 'title_list_dt' );
						$list = get_sub_field( 'list_items_dt' );
					?>

						<section class="list_sec blue_head_sec">
							<div class="container">
								<?php if($list_title): ?>
									<h1 class="title_26 title_anim"><?php echo $list_title; ?></h1>
								<?php 
									endif; 

									if($list):
								?>

									<div class="desc qoute_anim wysiwyg">
										<?php echo $list; ?>
									</div>

								<?php endif; ?>
							</div>
						</section>

					<?php 
						endif; 

						if( get_row_layout() == 'embedded_video_dt' ):

						$video_sec = get_sub_field( 'video_section_dt' );
						$video_img = get_sub_field( 'video_image_dt' );
						$video_img_url = $video_img['sizes']['large'];
						$video_title = get_sub_field( 'video_title_page_dt' );
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

						if( get_row_layout() == 'multilevel_list_dt' ):

						$list_multi_title = get_sub_field( 'title_multilevel_dt' );
						$list_multi = get_sub_field( 'multilevel_wysiwyg_dt' );
					?>

						<section class="list_multi_sec blue_head_sec">
							<div class="container">
								<?php if($list_multi_title): ?>
									<h1 class="title_26 title_anim"><?php echo $list_multi_title; ?></h1>
								<?php 
									endif; 

									if($list_multi):
								?>

									<div class="desc qoute_anim wysiwyg">
										<?php echo $list_multi; ?>
									</div>

								<?php endif; ?>
							</div>
						</section>

					<?php 
						endif; 

						if( get_row_layout() == 'file_download_dt' ):

						$file = get_sub_field( 'file_down_dt' );
						$file_desc = get_sub_field( 'desc_file_down_dt' );
						$file_title = get_sub_field( 'title_file_doww_dt' );
					?>

						<section class="file_sec blue_head_sec">
							<div class="container">
								<div class="file_wrap">
									<?php if($file_title): ?>
										<h1 class="title_26 title_anim">
											<?php echo $file_title; ?>
										</h1>
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

						if( get_row_layout() == 'gallery_dt' ):

						$gallery = get_sub_field( 'gallery_rep_dt' );

							if($gallery):
					?>

							<section class="gallery_section blue_head_sec white_all swiper-container qoute_anim">

								<div class="gallery_pag top visible-xs">
									<div class="pag_wrap">
										<div class="pag_txt">
											<span id="cur_slide_2">1</span>
											<span>of</span>
											<span><?php echo count($gallery); ?></span>
										</div>
									</div>
								</div>

								<div class="gallery_wrap swiper-wrapper">

									<?php foreach ($gallery as $key => $value_gallery): 
										$gal_img = $value_gallery['gallery_img_dt'];
										$gal_img_url = $gal_img['sizes']['large'];
										$photo = $value_gallery['photographer_dt'];
										$img_desc = $value_gallery['image_desc_dt'];
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
											<span id="cur_slide">1</span>
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
					endwhile;
				endif;
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>