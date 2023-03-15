<?php 
    $anim_intro = "";
    if (!isset($_COOKIE['animLoad']) && is_front_page()) {
        $anim_intro = " anim_intro";
    }

?>

<header class="header<?php echo $anim_intro; ?>">
    <div class="header_cont">
        <?php if(is_page_template('page-temp/advisors.php') || is_home()): ?>
            <div class="grad_mobile visible-xs"></div>
        <?php endif; ?>
        <div class="add_grad blue_hid hidden-xs"></div>
        <div class="header_wrap white_all<?php if(!(is_page_template('page-temp/advisors.php') || is_home() || is_page_template('page-temp/home.php'))){echo ' bg_head_wrap';} if(is_page_template('page-temp/sectors_services.php')){echo ' bg_trans';} ?>">
            <div class="header_bg"></div>
            <div class="header_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="wrap">
                        <a href="<?php echo home_url(); ?>">
                            <?php if (get_field('logo','options')):
                                $img = get_field('logo','options');
                                $img_url = $img['sizes']['medium'];
                            ?>
                            <img src="<?php echo $img_url ?>" class="header_logo"/>
                                
                            <?php endif ?>
                            
                        </a>
                        <div class="head_menu_btn visible-xs">
                            <span class="t1">MENU</span>
                            <span class="t2">CLOSE</span>
                        </div>
                        <?php
                            wp_nav_menu( array(
                                'menu'              => 'header-menu',
                                'theme_location'    => 'header-menu',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_id'      => 'head_menu',
                                'container_class'   => 'head_menu',
                                //'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker()
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="header_wrap blue_all blue_hid">
            <div class="header_width">
                <div class="container">
                    <div class="row">
                        <div class="wrap">
                            <a href="<?php echo home_url(); ?>">
                                <?php if (get_field('logo','options')):
                                    $img = get_field('logo','options');
                                    $img_url = $img['sizes']['medium'];
                                ?>
                                <img src="<?php echo $img_url ?>" class="header_logo svg_inject"/>
                                    
                                <?php endif ?>
                                
                            </a>
                            <div class="head_menu_btn visible-xs">
                                <span class="t1">MENU</span>
                                <span class="t2">CLOSE</span>
                            </div>
                            <?php
                                wp_nav_menu( array(
                                    'menu'              => 'header-menu',
                                    'theme_location'    => 'header-menu',
                                    'depth'             => 2,
                                    'container'         => 'div',
                                    'container_id'      => 'head_menu_blue',
                                    'container_class'   => 'head_menu',
                                    //'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker()
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>
