<?php
/*
Template Name: Home
*/
?>

<?php
get_header();
epic_get_template('header-true.php');

$anim_intro = "";
if (!isset($_COOKIE['animLoad'])) :
	$anim_intro = " anim_intro";
?>


	<div class="hidden" id="get_days" data-days="<?php the_field( 'cookie_exp_days' ); ?>"></div>
	<div class="intro_vid_cont hidden-sm hidden-xs">
		<div class="intro_vid_wrap">
			<div class="intro_text head_text anim_1">
				<span>Aither</span>
			</div>
			<div class="text_wrap">
				<div class="intro_text text_slide anim_2">
					<span>Policy</span>
				</div>
				<div class="intro_text text_slide anim_3">
					<span>Strategy</span>
				</div>
				<div class="intro_text text_slide anim_4">
					<span>Economics</span>
				</div>
				<div class="intro_text text_center anim_5">
					<div class="text_anim">
						<span class="anim_l_w">W</span><span class="anim_l_a">A</span><span class="anim_l_i hid">I</span><span class="anim_l_t">T</span><span class="anim_l_h hid">H</span><span class="anim_l_er">ER</span>
					</div>
				</div>
			</div>
			<div class="skip_btn">
				Skip
			</div>
		</div>
	</div>

<?php endif; ?>

<main role="main">
	<div class="home_page">
		<section class="hp_banner blue_head_sec white_all">
			<div class="hpb_bg">
				<?php 
				$banner = get_field('banner') ? get_field('banner') : array();
				foreach ($banner as $key => $value): 
					$iframe = $value['video'];
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];
					// add extra params to iframe src
					$show_video = '';
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
						$show_video = "<div id='ytplayer_".rand(0, 1000)."' class='ban_video ytplayer' data-key='".$youtube_key."'></div>";
					} elseif ( $src_array['host'] == 'player.vimeo.com' ) {
			            $params = array(
			                'autoplay'      => 0,
			                'loop'          => 1,
			                'portrait'      => 0,
			                'badge'         => 0,
			                'byline'        => 0,
			                'player_id'     => 'vimeo_video_single'
			            );
			            $new_src = add_query_arg($params, $src);
			            $show_video = "<iframe class='ban_video vimeo_video' id='vimeo_video_single_".rand(0, 1000)."' frameborder='0' src='" . $new_src . "' data-key='vimeo_".rand(0, 1000)."'></iframe>";
			        }
			        $img = $value['img'] ? $value['img']['url'] : $value['img'];

					?>
					<div class="video_wrap">
						<?php echo $show_video; ?>
						<div class="video_img" style="background-image: url(<?php echo $img ?>)"></div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="hpb_desc container<?php echo $anim_intro; ?>">
				<?php foreach ($banner as $key => $value): ?>
					<div class="desc_wrap ">
						<div class="all_cont">
							<div class="text_wrap">
							<?php if ($key == 0): ?>
								<h1 class="heading heading_80"><?php echo $value['heading'] ?></h1>
								<div class="el_bot">
									<h2 class="subheading heading_26"><?php echo $value['subheading'] ?></h2>
							<?php else: ?>
								<h2 class="heading heading_80"><?php echo $value['heading'] ?></h2>
								<div class="el_bot">

									<h3 class="subheading heading_26"><?php echo $value['subheading'] ?></h3>
							<?php endif ?>
								<?php if ($value['button_link']): ?>
									<div class="cta_wrap">
										<a class="cta hover_arrow find_out_more" href="<?php echo $value['button_link'] ?>">
											<?php echo $value['button_text'] ?>
										</a>
									</div>
								<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>

			<!-- <div class="hpb_desc swiper-container container<?php //echo $anim_intro; ?>">
				<div class="swiper-wrapper">

					<?php //foreach ($banner as $key => $value): ?>
						<div class="desc_wrap swiper-slide">
						</div>
					<?php //endforeach ?>
				</div>
				<div class="swiper-pagination"></div>
			</div> -->
			<div class="hpb_dots<?php echo $anim_intro; ?>">
				<div class="container"></div>
			</div>
		</section>
		<section class="hp_advisors blue_head_sec blue_all_sec">
			<img class="bg_img bg1 lazyImg" src="<?php echo get_template_directory_uri() ?>/img/hp_advisor2.png">
			<img class="bg_img bg2 lazyImg hidden-xs" src="<?php echo get_template_directory_uri() ?>/img/hp_advisor2.png">
			<?php 
				$all_advs = get_field( 'hp_all_advs' ) ? get_field('hp_all_advs') : array();
				//$select = get_field('advisors_sector') ? get_field('advisors_sector') : array();
				$select_count = count($all_advs); 
			?>
			<div class="container">
				<div class="hpa_left col-md-6 col-xs-12">
					<div class="desc ">
						<h2 class="heading_22 element_anim_1">Meet our leading advisors that <br>specialize in </h2>
						<span class="hpal_select hidden-xs" data-count="<?php echo $select_count; ?>">
							<?php 
								foreach ($all_advs as $key => $value_adv): 
									$adv_sector = $value_adv['advisors_sector'];
							?>

										<span class="val" data-val="<?php echo $adv_sector->term_id ?>">
											<span class="text_wrap">
												<span class="text element_anim_2"><?php echo $adv_sector->name ?></span>
											</span>
										</span>
									
							<?php 
								endforeach 
							?>
							<?php 
								foreach ($all_advs as $key => $value_adv): 
									$adv_sector = $value_adv['advisors_sector'];
							?>
								<span class="val" data-val="<?php echo $adv_sector->term_id ?>">
									<span class="text_wrap">
										<span class="text element_anim_2"><?php echo $adv_sector->name ?></span>
									</span>
								</span>
							<?php endforeach ?>
						</span>
						<div class="hpal_select2 visible-xs element_anim_2">
							<select>
							<?php 
								foreach ($all_advs as $key => $value_adv):
									$adv_sector = $value_adv['advisors_sector']; 
							?>
								<option value="<?php echo $adv_sector->term_id ?>">
									<?php echo $adv_sector->name ?>
								</option>
							<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<div class="hpa_right col-md-6 col-xs-12">
					<?php 
						// $args =array(
						//    	'post_type' 		=> 'advisors_posts',
						//    	'posts_per_page'	=> -1,
						//    	'orderby'        => 'date',
	   					// 		'order'          => 'ASC'
						// ); 

						//$posts = get_posts($args);

						if($all_advs):
					?>
						<div class="pag_wrap">
							<div class="pag_txt">
								<span id="cur_slide">1</span>
								<span>of</span>
								<span id="all_slide">4</span>
							</div>
							<div class="arrows"></div>
		    			</div>
						<div class="hpar_wrap">
							<?php foreach ($all_advs as $key => $value_all_adv): 
								$adv_sector = $value_all_adv['advisors_sector'];
								$term_id = $adv_sector->term_id;
								//$taxonomy = 'sectors';
								//$terms = wp_get_post_terms( $post_id, $taxonomy );
								// if($terms){
								// 	foreach ($terms as $key => $value_term) {
								// 		$term_id = $value_term->term_id;
								// 		array_push($terms_id, $term_id);
								// 	}
								// }
								// $terms_json = json_encode($terms_id);
								// $term_id = count($terms)>0 ? $terms[0]->term_id : 0;
								$posts_adv = $value_all_adv['advisors_all'];

								if($posts_adv):
									foreach ($posts_adv as $key => $value_post):
										$post_id = $value_post->ID;
										$imgArrayPost = get_field( 'thumbnail_adv', $post_id );
										$imgUrlPost = $imgArrayPost ? $imgArrayPost['sizes']['thumbnail'] : $imgArrayPost;
										
							?>

											<div class="single_post_wrap" data-term="<?php echo $term_id; ?>">
												<div class="single_post">
													<a href="<?php echo get_the_permalink($post_id); ?>" class="full_link"></a>
													<div class="img_wrap">
														<div class="thub_img" data-src="<?php echo $imgUrlPost; ?>"></div>
													</div>
													<div class="text_wrap">
														<div class="name">
															<?php echo get_the_title($value_post); ?>
														</div>
														<div class="role_wrap">
															<?php the_field( 'position_adv', $post_id ); ?>
														</div>
														<div class="location hidden-xs">
															<?php the_field( 'location_adv', $post_id ); ?>
														</div>
													</div>
												</div>
											</div>

							<?php 
										endforeach;
									endif;
								endforeach; 
							?>
						</div>
					<?php endif; ?>
					<div class="btn_wrap">
						<a class="cta hover_arrow blue closer_arrow" href="<?php the_field('advisors_link') ?>"><?php the_field('advisors_link_text') ?></a>
					</div>
				</div>
			</div>
		</section>

		<section class="hp_insights">
			<div class="hpi_right blue_head_sec">
				<div class="wrap_cont">
					<h2 class="hpi_title visible-xs">
						Featured Insights
					</h2>
					<?php 
						$f_id = get_field('featured_inisghts');
						if ($f_id): 
							$Thumb = get_field('thumbnail',$f_id);
							$imgThumb = $Thumb ? $Thumb['sizes']['medium'] : $Thumb;
					?>
						<a class="hpir_featured" href="<?php echo get_permalink($f_id) ?>">
							<div class="img lazyBg" data-src="<?php echo $imgThumb; ?>"></div>
							<div class="text">
								<h3 class="title heading_22"><?php echo get_the_title($f_id) ?></h3>
								<div class="wrap">
									<span class="cta hover_arrow blue closer_arrow"><?php the_field('featured_inisghts_btn_text') ?></span>
								</div>
							</div>
						</a>
					<?php endif ?>
					
					<div class="hpir_wrap">
						<?php 
							$insights = get_field('select_inisghts') ? get_field('select_inisghts') : array();
							foreach ($insights as $key => $insight_id):

							$btn_Url = get_field( 'has_video',$insight_id);
							$Thumb = get_field('thumbnail',$insight_id);
							$imgThumb = $Thumb ? $Thumb['sizes']['thumbnail'] : $Thumb;
						?>

							<div class="news_wrap fade_anim_1">
								<div class="all_content_wrap">
									<a href="<?php echo get_permalink($insight_id); ?>" >
										<div class="text_wrap"><?php echo get_the_time('j F Y',$insight_id) ?></div>
										<h3 class="title"><?php echo mb_ucfirst(get_the_title($insight_id),40); ?></h3>
									</a>
									<div class="image_wrap">
										<?php if (!$btn_Url): ?>
											<a class="img_link" href="<?php echo get_permalink($insight_id); ?>" >
												<div class="image lazyBginsight" data-src="<?php echo $imgThumb; ?>"></div>
											</a>
										<?php else: 
											$videoUrl = get_field( 'video_url',$insight_id );
										?>
											<div class="video_cont">
											<div class="video_wrap">
												<?php 
												$iframe = $videoUrl;
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
													echo "<iframe class='vimeo_video' id='vimeo_video_single_".rand(0, 1000)."' frameborder='0' src='" . $new_src . "'></iframe>";
												}
												?>
											</div>

											<div class="image_video lazyBginsight" data-src="<?php echo $imgThumb; ?>"></div>

											<div class="play_btn">
												<i class="fa fa-play"></i>
												<i class="fa fa-stop"></i>
												<span class="play">
													Play Video
												</span>
												<span class="stop">
													Stop Video
												</span>
											</div>
											<a class="video_link" href="<?php echo get_permalink($insight_id); ?>" ></a>

										</div>
											
										<?php endif ?>
									</div>
									<a href="<?php echo get_permalink($insight_id); ?>" >
										<div class="desc"><?php echo mb_ucfirst(get_field( 'short_description',$insight_id ), 100); ?></div>
										<div class="read_more">
											Read More
										</div>
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php 
				$bg = get_field('bg_inisghts');
				$bg_url = $bg ? $bg['url'] : $bg;
			?>
			<div class="hpi_left_bg lazyBg" data-src="<?php echo $bg_url; ?>">
				<div class="container">
					<div class="cont_wrap">
						<h2 class="text hidden-xs">
							Featured Insights
						</h2>
						<div class="dots"></div>
					</div>
				</div>
			</div>
		</section>

		<section class="hp_test blue_head_sec blue_all_sec">
			<img class="bg_img lazyImg" src="<?php echo get_template_directory_uri() ?>/img/hp_advisor2.png">
			<div class="container">
				<div class="hpt_wrap fade_anim_1">
					<div class="hpt_left">
						<?php 
						$icons = get_field('icons') ? get_field('icons') : array();
						foreach ($icons as $key => $icon): 
							$url = $icon['sizes']['medium'];
						?>
						<div class="single">
							<img class="lazyImg" src="" data-src="<?php echo $url ?>">
						</div>
						<?php endforeach ?>
					</div>
					<div class="hpt_right">
						<div class="hpt_right_move">
							
						
							<div class="hptr_slider">
							<?php 
							$testimonials = get_field('testimonials') ? get_field('testimonials') : array();
							foreach ($testimonials as $key => $single): ?>
								<div class="hptr_single">
									<h2 class="heading"><?php echo $single['heading'] ?></h2>
									<div class="desc"><?php echo $single['body'] ?></div>
									<div class="name"><?php echo $single['name'] ?></div>
									<div class="comp"><?php echo $single['company'] ?></div>
								</div>
							<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php 
			$bg = get_field('bg_news');
			$bg_url = $bg ? $bg['url'] : $bg;
		?>
	</div>
</main>

<?php get_footer(); ?>