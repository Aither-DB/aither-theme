			<!-- footer -->
			<footer class="footer lazyBg blue_head_sec blue_all_sec" data-src="<?php echo get_template_directory_uri() ?>/img/footer_bg.jpg"  data-src-sm="<?php echo get_template_directory_uri() ?>/img/footer_sm.jpg">
				<div class="container">
					<div class="row">
						<div class="footer_top fade_anim_1">
							<div class="logo">
								<a href="<?php echo home_url(); ?>">
			                        <?php if (get_field('logo','options')):
			                            $img = get_field('logo','options');
			                            $img_url = $img['sizes']['medium'];
			                        ?>
			                        <img src="<?php echo $img_url ?>" alt="Logo" class="svg_inject"/>
			                        <?php endif ?>
			                    </a>
							</div>
							<div class="desc hidden-xs">
								<?php the_field('desc_f','options') ?>
							</div>
							<div class="logo_r">
								<?php 
								$link = get_field('logo_linkr_f','options');
								if ($link): ?>
									<a href="<?php echo $link ?>" target="_blank">
								<?php endif ?>
								<?php 
									 $img = get_field('logor_f','options');
									if ($img ):
			                           
			                            $img_url = $img['sizes']['medium'];
			                            $img_xs = get_field('logor_f_xs','options');
			                            $img_xs_url = $img_xs ? $img_xs['sizes']['medium'] : $img_url;
			                        ?>
			                        <img src="#" data-src="<?php echo $img_url ?>" alt="Logo" class="lazyImg hidden-xs"/>
			                        <img src="#" data-src="<?php echo $img_xs_url ?>" alt="Logo" class="lazyImg hidden-lg hidden-md hidden-sm"/>

			                        <?php endif ?>
								<?php if ($link): ?>
									</a>
								<?php endif ?>
							</div>
						</div>
						<?php
	                        wp_nav_menu( array(
	                            'menu'              => 'footer-menu',
	                            'theme_location'    => 'footer-menu',
	                            'depth'             => 2,
	                            'container'         => 'div',
	                            'container_id'      => 'footer_menu',
	                            'container_class'   => 'footer_menu fade_anim_1 hidden-xs'
	                            //'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                            //'walker'            => new wp_bootstrap_navwalker()
	                        )
	                    );
	                    ?>
	                    <?php
	                        wp_nav_menu( array(
	                            'menu'              => 'footer-menu-xs',
	                            'theme_location'    => 'footer-menu-xs',
	                            'depth'             => 2,
	                            'container'         => 'div',
	                            'container_id'      => 'footer_menu_xs',
	                            'container_class'   => 'footer_menu hidden-lg hidden-md hidden-sm'
	                            //'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                            //'walker'            => new wp_bootstrap_navwalker()
	                        )
	                    );
	                    ?>
	                    <div class="footer_bot fade_anim_1">
	                    	<a href="https://www.jtbstudios.com.au/" target="_blank">
	                    		<span>
	                    			Web Development<br>Melbourne
	                    		</span>
	                    		<img class="svg_inject" src="<?php echo get_template_directory_uri() ?>/img/jtb_logo.svg" alt="jtb_">
	                    	</a>
	                    </div>
					</div>
				</div>
			</footer>
			<!-- /footer -->
			
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
	</html>
