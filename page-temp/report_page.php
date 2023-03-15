<?php
/*
Template Name: Report page
*/
?>

<?php
get_header();
epic_get_template('header-true.php');

$report_page_builder = get_field('content_builder') ? get_field('content_builder') : array();

?>

<main role="main" class="division report_page">
	<div class="fixed_bar_blue">
		<div class="fixed_bar">
			<div class="btn_bar hidden-lg hidden-md hidden-sm">
				<?php if(get_field( 'hd_banner' )): ?>
					<h2 class="page_title">
						<?php the_field( 'hd_banner' ); ?>
					</h2>
				<?php 
					endif;
				?>
				<div class="btn_desc">
					<span class="desc">Contents</span>
					<span class="arrow"></span>
				</div>
			</div>
			<div class="fixed_bar_wrap">
				<div class="top_desc hidden-xs">
					<div class="desc">
						<?php if(get_field( 'hd_banner' )): ?>
							<h2 class="page_title title_anim">
								<?php the_field( 'hd_banner' ); ?>
							</h2>
						<?php 
							endif; 
							if(get_field( 'desc_banner' )):
						?>
							<p class="title_anim_2"><?php the_field( 'desc_banner' ); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<div class="blue_title hidden-xs">
					<div class="bar_title_anim">Contents</div>
					<div class="bar_line_anim"><div class="line"></div></div>
				</div>

				<div class="anchors_wrap">
					<?php 
						foreach ($report_page_builder as $key_nav_all => $value_contb): 
							if ($value_contb['acf_fc_layout'] == 'summary_section'):
					?>
							<a href="#report_section_<?php echo $key_nav_all; ?>" data-target="report_section_<?php echo $key_nav_all; ?>" class="item_anch bar_items_anim">
								<span class="anim_to_left"><span class="add_act"><?php echo $value_contb['section_anchor_title']; ?></span></span>
							</a>
						<?php 
							endif;
							if ($value_contb['acf_fc_layout'] == 'content_section'): 
						?>
							<a href="#report_section_<?php echo $key_nav_all; ?>" data-target="report_section_<?php echo $key_nav_all; ?>" class="item_anch bar_items_anim">
								<span class="anim_to_left"><span class="add_act"><?php echo $value_contb['section_anchor_title']; ?></span></span>
							</a>
						<?php 
							endif;
							if ($value_contb['acf_fc_layout'] == 'related_content_section'): 
						?>
							<a href="#report_section_<?php echo $key_nav_all; ?>" data-target="report_section_<?php echo $key_nav_all; ?>" class="item_anch bar_items_anim">
								<span class="anim_to_left"><span class="add_act"><?php echo $value_contb['section_anchor_title']; ?></span></span>
							</a>
						<?php 
							endif;
							if ($value_contb['acf_fc_layout'] == 'notes_section'): 
						?>
							<a href="#report_section_<?php echo $key_nav_all; ?>" data-target="report_section_<?php echo $key_nav_all; ?>" class="item_anch bar_items_anim">
								<span class="anim_to_left"><span class="add_act"><?php echo $value_contb['section_anchor_title']; ?></span></span>
							</a>
					<?php 
							endif;
						endforeach; 
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="main_content">
		<?php
			$bg_img = get_field( 'bg_img_banner' );
			$bg_img_url = $bg_img ? $bg_img['sizes']['large'] : array();
		?>
		<section class="banner_template blue_head_sec white_all" style="background-image: url('<?php echo $bg_img_url; ?>');">
			<div class="container">
				<div class="desc">
					<?php if(get_field( 'hd_banner' )): ?>
						<h1 class="page_title title_anim">
							<?php the_field( 'hd_banner' ); ?>
						</h1>
					<?php 
						endif; 
						if(get_field( 'desc_banner' )):
					?>
						<p class="title_anim_2"><?php the_field( 'desc_banner' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php
				foreach ($report_page_builder as $key_cont_all => $value_contb):
					if ($value_contb['acf_fc_layout'] == 'summary_section'):
		?>

					<section class="summary_section scrl_sec" id="report_section_<?php echo $key_cont_all; ?>">
						<?php 
							$moduels = $value_contb['ss_modules'] ? $value_contb['ss_modules'] : array();
							epic_get_template('page-temp/parts/modules_builder.php', array('modules_build'=>$moduels)); 
						?>
					</section>
				<?php 
					endif;

					if ($value_contb['acf_fc_layout'] == 'content_section'):
						$img_banner_sec = $value_contb['section_image'];
						$img_banner_sec_url = $img_banner_sec ? $img_banner_sec['sizes']['large'] : array();
						$banner_title_sec = $value_contb['section_tiitle'];

						$sub_sections = $value_contb['subsections'];

						$array_banner = array(
							'banner_img' => $img_banner_sec_url,
							'banner_title' => $banner_title_sec,
							'sub_sections' => $sub_sections,
							'key' => $key_cont_all
						)
				?>

					<section class="content_section scrl_sec" id="report_section_<?php echo $key_cont_all; ?>">
						<?php 
							epic_get_template('page-temp/parts/raport_heading.php', $array_banner);
							if($sub_sections):
								$index_ss = 1;
								foreach ($sub_sections as $key_ss => $value_ss): 
									$moduels = $value_ss['ss_modules'] ? $value_ss['ss_modules'] : array();
						?>

									<div class="single_sec_build" id="raport_page_subsection_<?php echo $key_cont_all; ?>_<?php echo $key_ss; ?>">
										<div class="container blue_head_sec">
											<h2 class="subs_title title_anim">
												<span class="key"><?php echo $key_cont_all.'.'.$index_ss;?></span>
												<?php echo $value_ss['subsec_title']; ?>
											</h2>
										</div>
										<div class="moduels_wrap">
											<?php epic_get_template('page-temp/parts/modules_builder.php', array('modules_build'=>$moduels)); ?>
										</div>
									</div>

						<?php 
									$index_ss++;
								endforeach;
							endif; 
						?>
					</section>

				<?php
					endif; 

					if ($value_contb['acf_fc_layout'] == 'related_content_section'): 

						$img_banner_sec = $value_contb['section_image'];
						$img_banner_sec_url = $img_banner_sec ? $img_banner_sec['sizes']['large'] : array();
						$banner_title_sec = $value_contb['section_tiitle'];

						$array_banner = array(
							'banner_img' => $img_banner_sec_url,
							'banner_title' => $banner_title_sec,
							'sub_sections' => null,
							'key' => null
						)
				?>

					<section class="related_content_section scrl_sec" id="report_section_<?php echo $key_cont_all; ?>">
						<?php 
							epic_get_template('page-temp/parts/raport_heading.php', $array_banner);
							$recent_raports = $value_contb['recent_reports'];
							if($recent_raports):
								$img_defult = $value_contb['default_image_occasion'];
								$img_defult_url = $img_defult ? $img_defult['sizes']['medium'] : array();
						?>

							<div class="recent_raports_wrap blue_head_sec">
								<div class="container">
									<?php 
										foreach ($recent_raports as $key => $value_rec):
											$img_bg = $value_rec['image_rr'];
											$img_bg_url = $img_bg ? $img_bg['sizes']['medium'] : $img_defult_url;
									?>

										<a href="<?php echo $value_rec['link_rr']; ?>" class="single_report qoute_anim">
											<div class="img_bg lazyBg" data-src="<?php echo $img_bg_url; ?>"></div>
											<div class="desc_recent">
												<h3><?php echo $value_rec['heading_rr'] ?></h3>
												<div class="body"><?php echo $value_rec['body_rr']; ?></div>
												<div class="link_btn"><?php echo $value_rec['link_text_rr']; ?></div>
											</div>
										</a>

									<?php endforeach; ?>
								</div>
							</div>

						<?php endif; ?>

					</section>

			<?php 
				endif; 
				
				if ($value_contb['acf_fc_layout'] == 'notes_section'): 

					$img_banner_sec = $value_contb['section_image'];
					$img_banner_sec_url = $img_banner_sec ? $img_banner_sec['sizes']['large'] : array();
					$banner_title_sec = $value_contb['section_tiitle'];

					$array_banner = array(
						'banner_img' => $img_banner_sec_url,
						'banner_title' => $banner_title_sec,
						'sub_sections' => null,
						'key' => null
					)
			?>
				<section class="notes_section scrl_sec" id="report_section_<?php echo $key_cont_all; ?>">
					<?php 
						epic_get_template('page-temp/parts/raport_heading.php', $array_banner);

						$moduels = $value_contb['ss_modules'] ? $value_contb['ss_modules'] : array();
						epic_get_template('page-temp/parts/modules_builder.php', array('modules_build'=>$moduels)); 
						
					?>
				</section>
		<?php
				endif;
			endforeach; 
		?>
	</div>
</main>

<?php get_footer(); ?>