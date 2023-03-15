<?php 
	foreach ($modules_build as $key => $value_mod):
		if($value_mod['acf_fc_layout'] == 'open_text'):
?>
		<section class="open_txt_sec blue_head_sec">
			<div class="container">
				<div class="open_txt_wrap">
					<?php if($value_mod['open_text']): ?>
						<div class="desc qoute_anim wysiwyg">
							<?php echo $value_mod['open_text']; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

	<?php 
		endif; 
		if($value_mod['acf_fc_layout'] == 'block_quote'):
	?>
		
		<section class="bq_sec blue_head_sec">
			<div class="container">
				<div class="bq_wrap">
					<?php if($value_mod['quote_bq']): ?>
						<div class="qoute_block">
							<div class="qoute_anim"><?php echo $value_mod['quote_bq']; ?></div>
							<div class="line line_q_anim"></div>
						</div>
					<?php 
						endif; 

						if($value_mod['author_bq']):
					?>
						<div class="ath_wrap qoute_anim">
							<?php echo $value_mod['author_bq']; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

	<?php 
		endif;
		if($value_mod['acf_fc_layout'] == 'file_download'):
			$file = $value_mod[ 'file_down' ];
			$file_desc = $value_mod[ 'desc_file_down' ];
			$file_title = $value_mod[ 'title_file_doww' ]; 
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

					<?php 
						if($file):
					?>

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
		if($value_mod['acf_fc_layout'] == 'gallery'):
			$gallery = $value_mod[ 'gallery_rep' ];
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
		if($value_mod['acf_fc_layout'] == 'linked_advisor'):
	?>

			<section class="link_adv">
				<div class="container">

					<div class="link_adv_wrap">
						<?php if($value_mod['pp_la']): ?>
							<p class="desc_adv qoute_anim">
								<?php echo $value_mod['pp_la']; ?>
							</p>
						<?php 
							endif; 
							$advs = $value_mod['advisor_la'];
							if($advs):
								foreach ($advs as $key => $value_adv):
									$imgArrayAdv = get_field( 'thumbnail_adv', $value_adv );
									$imgUrlAdv = $imgArrayAdv['sizes']['thumbnail'];
						?>

									<a href="<?php echo get_the_permalink($value_adv) ?>" class="single_adv qoute_anim">
										<div class="img_wrap">
											<div class="thub_img lazyBg" data-src="<?php echo $imgUrlAdv; ?>"></div>
										</div>
										<div class="text_wrap">
											<div class="name">
												<?php echo get_the_title($value_adv); ?>
											</div>
											<div class="role_wrap">
												<?php the_field( 'position_adv', $value_adv ); ?>
											</div>
										</div>
									</a>

						<?php 
								endforeach; 
							endif;
						?>
					</div>

				</div>
			</section>
		<?php 
			endif;
			if($value_mod['acf_fc_layout'] == 'two_column_text_area'):
		?>

			<section class="two_col_wysiwyg blue_head_sec">
				<div class="container">
					<div class="wysiwyg qoute_anim">
						<?php echo $value_mod['tcta_desc']; ?>
					</div>
				</div>
			</section>

		<?php 
			endif;
			if($value_mod['acf_fc_layout'] == 'inline_image'): 
				$img = $value_mod['image_ii'];
				$img_url = $img ? $img['sizes']['large'] : array();
		?>

			<section class="inline_image blue_head_sec">
				<div class="container">
					<div class="inline_image_wrap">
						<img data-src="<?php echo $img_url; ?>" class="qoute_anim lazyImgInline">
						<div class="wysiwyg qoute_anim"><?php echo $value_mod['reference_text_ii']; ?></div>
					</div>
				</div>
			</section>

		<?php 
			endif; 
			if($value_mod['acf_fc_layout'] == 'graph_slider'):
				$graph_slider = $value_mod['slider_gs'] ? $value_mod['slider_gs'] : array();
		?>

			<section class="gi_slider blue_head_sec">
				<div class="container">
					<div class="gi_slider_wrap qoute_anim">
						<?php 
							foreach ($graph_slider as $key => $value_gs):
								$img_or_graph = $value_gs['image_or_graph'];
								$img_gs = $value_gs['image_slider_gs'];
								$img_gs_url = $img_gs ? $img_gs['sizes']['large'] : array();
								$select_graph = $value_gs['select_graph'];
						?>
							<div class="single_gs">
								<?php if($img_or_graph): ?>
									<img class="img_gs" data-lazy="<?php echo $img_gs_url; ?>">
								<?php 
									else: 
								?>
									<div class="graph_slider">
										<?php echo $value_gs['graph_code']; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>

					<div class="nav_gi_slider_wrap qoute_anim">
						<?php foreach ($graph_slider as $key => $value_gs): ?>
							<div class="single_nav_gs">
								<?php if($value_gs['title_slider_gs']): ?>
									<h4><?php echo $value_gs['title_slider_gs'] ?></h4>
								<?php 
									endif;
									if($value_gs['desc_slider_gs']):
								 ?>
									<p><?php echo $value_gs['desc_slider_gs'] ?></p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

		<?php
			endif; 
			if($value_mod['acf_fc_layout'] == 'full_width_image_graph'):
				$img_or_graph = $value_mod['image_or_graph'];
				$img_full = $value_mod['image_fwig'];
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
								echo $value_mod['graph_script'];
							?>
						</div>
					</div>
				<?php endif; ?>
			</section>


		<?php
			endif; 
			if($value_mod['acf_fc_layout'] == 'table_builder'):
		?>


			<section class="table_section">
				<div class="container">
					<div class="table_top">
						<?php if($value_mod['title_table']): ?>
							<h3><?php echo $value_mod['title_table']; ?></h3>
						<?php 
							endif;
							if($value_mod['desc_table']):
						?>
							<p><?php echo $value_mod['desc_table']; ?></p>
						<?php endif; ?>
					</div>
					<?php 
						$table_th = $value_mod['table_header'] ? $value_mod['table_header'] : array();
						$table_body = $value_mod['table_tb'] ? $value_mod['table_tb'] : array();
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
							if($value_mod['foot_table']):
						?>
							<?php echo $value_mod['foot_table']; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>

<?php
		endif;
	endforeach; 
?>