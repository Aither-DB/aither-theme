<section class="raport_sec_banner blue_head_sec white_all">
	<div class="bg_img lazyBg" data-src="<?php echo $banner_img; ?>"></div>
	<div class="container">
		<div class="desc_section<?php if($sub_sections != null){echo ' sub_s_is';} ?>">
			<?php if($banner_title): ?>
				<h2 class="title_anim">
					<?php if($key != null): ?>
						<span><?php echo $key; ?>.0</span>
					<?php
						endif; 
						echo $banner_title; 
					?>
				</h2>
			<?php 
				endif; 
				if($sub_sections != null):
					$index_ss = 1;
			?>
				<div class="sub_sections title_anim_2">
					<?php foreach ($sub_sections as $key_ss => $value_s): ?>

						<a href="#raport_page_subsection_<?php echo $key; ?>_<?php echo $key_ss; ?>" class="single_sub">
							<span><?php echo $key.'.'.$index_ss ?></span>
							<?php echo $value_s['subsec_title']; ?>
						</a>

					<?php 
							$index_ss++;
						endforeach; 
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>