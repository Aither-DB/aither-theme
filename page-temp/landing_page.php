<?php
/*
Template Name: Landing page
*/

get_header();
epic_get_template('header-true.php');

?>

<main role="main" class="division landing_page">
	<div class="blue_bar sec_ser_temp">
		<div class="blue_bar_wrap">

			<div class="blue_title title_bar hidden-xs">
				<div class="bar_title_anim">
					<span class="children_anim">
						<?php 
							the_field( 'left_menu_title' ); 
						?>
					</span>
				</div>
				<div class="bar_line_anim line_mobile_anim">
					<div class="line_wrap children_anim">
						<div class="line"></div>
					</div>
				</div>
			</div>

			<ul class="ltos_wrap hidden-xs">
				<?php foreach (get_field('iframe_menu') as $key => $value):
					$subheadings = $value['subheadings'];
					?>
					<li class="single_ltos bar_items_anim">
						<div class="anim_to_left">
							<div data-href="<?php echo $value['link']; ?>" class="children_anim iframe_menu_link"
								data-scroll-to="<?php echo $value['scroll_to_desktop_in_px'];  ?>"
								data-scroll-to-lg-sm="<?php echo $value['scroll_to_desktop_md_in_px'];  ?>" 
								data-scroll-to-lg-xs="<?php echo $value['scroll_to_desktop_sm_in_px'];  ?>"
								data-scroll-to-sm="<?php echo $value['scroll_to_tablet_in_px'];  ?>"
								data-scroll-to-xs="<?php echo $value['scroll_to_mobile_in_px'];  ?>">
								<?php echo $value['title']; ?>
							</div>
						</div>
						<?php if($subheadings): ?>
							<ul class="subheadings_wrap">
								<?php 
									foreach ($subheadings as $key_sub => $value_sub): 
								?>
									<li class="single_ltos bar_items_anim">
										<div class="anim_to_left">
											<div data-href="<?php echo $value_sub['link_sub']; ?>" class="children_anim iframe_menu_link"
												data-scroll-to="<?php echo $value_sub['scroll_to_desktop_in_in_pixels_sub'];  ?>" 
												data-scroll-to-lg-sm="<?php echo $value_sub['scroll_to_desktop_md_in_px_sub'];  ?>" 
												data-scroll-to-lg-xs="<?php echo $value_sub['scroll_to_desktop_sm_in_px_sub'];  ?>"
												data-scroll-to-sm="<?php echo $value_sub['scroll_to_tablet_in_in_pixels_sub'];  ?>"
												data-scroll-to-xs="<?php echo $value_sub['scroll_to_mobile_in_in_pixels_sub'];  ?>">
												<?php echo $value_sub['title_sub']; ?>
											</div>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
 
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
							echo get_the_title();
						?>
					</h1>
				</div>
			</section>
			<div class="blue_head_sec iframe_wrap">
				<iframe id="iframe_page" src="<?php the_field('iframe_url');?>" data-src="<?php the_field('iframe_url');?>" width="100%" frameborder="0" height="<?php the_field( 'iframe_height' ); ?>"></iframe>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>