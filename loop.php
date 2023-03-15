
	<?php 
		if (have_posts()) : while (have_posts()) : the_post(); 
			//terms ID
			$termsId = array();

			$taxonomies_post = get_object_taxonomies( $post->post_type );

			if($taxonomies_post){
				foreach ($taxonomies_post as $key => $value_post_tax) {

					$post_terms = get_the_terms( $value_post, $value_post_tax );
					if($post_terms){
						foreach ($post_terms as $key => $value_post_term) {

							$term_id_string = '"'.$value_post_term->term_id.'"';

							array_push($termsId, $term_id_string);
						}
					}
				}
			}
			//endTermID

			//authors
			$author_post = get_field( 'authors_post', $post );

			if($author_post){
				foreach ($author_post as $key => $value_author) {
					$author_id = '"'.$value_author->ID.'"';

					array_push($termsId, $author_id);
				}
			}
			//end autohrs

			//years
			$year = get_the_time('Y');
			$year_to_array = '"data_'.$year.'"';
			array_push($termsId, $year_to_array);
			//end years

			$btn_Url = get_field( 'has_video');
			$imgThumb = get_field('thumbnail') ? get_field('thumbnail')['sizes']['medium'] : get_field('thumbnail');

			if(!$btn_Url):
	?>

				<a href="<?php the_permalink(); ?>" class="news_wrap" data-groups='[<?php echo implode(", ", $termsId); ?>]'>
					<div class="news_item items_anim_1">
						<div class="title_wrap_ps">
							<h2 class="title hidden_xs">
								<span class="title_hgh">
									<?php 
										//echo title_short(get_the_title(),49); 
										echo get_the_title(); 
									?>
								</span>
							</h2>
						</div>
						<div class="image_wrap">
							<div class="image lazyBg" data-src="<?php echo $imgThumb; ?>"></div>
							<div class="text_wrap">
								<div class="date">
									<div><?php the_time('j F Y') ?></div>
								</div>
								<div class="tag"><?php echo get_the_tags()[0]->name; ?></div>
							</div>
							<div class="title_wrap_ps">
								<h2 class="title visible_xs">
									<span class="title_hgh">
										<?php 
											//echo title_short(get_the_title(),40);
											echo get_the_title(); 
										?>
									</span>
								</h2>
							</div>
							<div class="desc hidden-xs"><?php echo mb_ucfirst(get_field( 'short_description' ), 126); ?></div>
							<div class="desc visible-xs"><?php echo mb_ucfirst(get_field( 'short_description' ), 90); ?></div>
						</div>
					</div>
				</a>

			<?php else: 
					$videoUrl = get_field( 'video_url' );
			?>
					<div class="news_wrap" data-groups='[<?php echo implode(", ", $termsId); ?>]'>
						<div class="news_item items_anim_1">
							<a href="<?php the_permalink(); ?>">
								<div class="title_wrap_ps">
									<h2 class="title hidden_xs">
										<span class="title_hgh">
											<?php 
												//echo title_short(get_the_title(),49);
												echo get_the_title();
											?>
										</span>
									</h2>
								</div>
							</a>
							<div class="image_wrap">
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
									            echo "<iframe class='intro_vid vimeo_video' id='vimeo_video_single_".rand(0, 1000)."' data-key='vimeo_".rand(0, 1000)."' frameborder='0' src='" . $new_src . "'></iframe>";
									        }
										?>
									</div>

									<div class="image_video lazyBg" data-src="<?php echo $imgThumb; ?>"></div>

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
									<a class="video_link" href="<?php the_permalink(); ?>"></a>

								</div>
								<a href="<?php the_permalink(); ?>">
									<div class="text_wrap">
										<div class="date">
											<div><?php the_time('j F Y') ?></div>
										</div>
										<div class="tag"><?php echo get_the_tags()[0]->name; ?></div>
									</div>
									<div class="title_wrap_ps">
										<h2 class="title visible_xs">
											<span class="title_hgh">
												<?php
													// echo title_short(get_the_title(),40); 
													echo get_the_title(); 
												?>
											</span>
										</h2>
									</div>
									<div class="desc hidden-xs"><?php echo mb_ucfirst(get_field( 'short_description' ), 126); ?></div>
									<div class="desc visible-xs"><?php echo mb_ucfirst(get_field( 'short_description' ), 100); ?></div>
								</a>
							</div>
						</div>
					</div>
<?php 
			endif;
	endwhile; else: 
?>
	<p><?php _e('Sorry, no posts matched your criteria.' , 'epic_translate' ); ?></p><?php endif; ?>