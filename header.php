<?php
/**
* Header
*/
global $vpw_theme,$woocommerce;
$logo = get_field('logo','option');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>
    <?php wp_title('-', TRUE, 'right'); ?><?php bloginfo('name'); ?><?php if (is_front_page()) {
    echo ' - ';
    bloginfo('description');
    } ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="<?php the_field('favi','option')?>" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <?php wp_head(); ?>
</head>
<body <?php   if(is_front_page()){ echo body_class('common-home woocommerce'); } else{ echo body_class(); } ?>>
<div class="wrapper">
    <header>

        <div class="top" id="top">
            <div class="container text-right hidden">
            </div><!-- container -->
        </div><!-- #top -->
        <div class="middle-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <a class="logo-desktop" href="<?= site_url('/') ?>"><img src="<?= $logo ?>" alt="logo"></a>
                    </div>
                    <div class="col-md-7 col-sm-8 col-sx-8 text-right hidden-sm hidden-xs">
                        <form action="<?php echo esc_url(home_url('/')); ?>" id="header-search" class="search-form" method="get" role="search">
                            <div class="input-group">
                                <input name="s" value="<?php echo get_search_query(); ?>" class="form-control search-input input-lg" placeholder="<?php _e('Tìm kiếm sản phẩm', 'vpw_theme') ?>" type="search">
                                <input type="hidden" name="post_type" value="product" />
                                <span class="input-group-btn">
                                    <button class="btn btn-lg btn-warning search-submit" type="submit"><i class="fa fa-search"></i><span class="sr-only"> <?php _e('Tìm', 'vpw_theme') ?></span></button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </div>
                    <div class="col-md-2 col-sm-4 col-sx-4 account-nav text-right">
                        <div class="account-link hidden-sm hidden-xs">
                            <div class="dropdown">
                                <a data-toggle="dropdown" href=""><i class="fa fw fa-2x fa-user-o"></i> <span class="caret hidden"></span></a>
                                <ul class="dropdown-menu">
                                    <?php if (is_user_logged_in()) : ?>
                                        <li><a class="logout-link" href="<?php echo wp_logout_url(get_permalink()); ?>"><?= __('Logout') ?></a></li>
                                    <?php else: ?>
                                        <li><a class="regiter-link" href="<?php echo wp_login_url(get_permalink()); ?>"><?= __('Register') ?></a></li>
                                        <li><a class="login-link" href="<?php echo wp_login_url(get_permalink()); ?>"><?= __('Login') ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="mini-cart">
                            <div class="cart-text">
                                <a href="<?php echo wc_get_cart_url(); ?>" class="mini-cart-icon">
                                    <i class="fa fa-fw fa-2x fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <span class="cart-total"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            </div>
                            <div class="mini-card-section top-cart-content">
                                <div class="mini-products-list">                                                
                                </div>                                                      
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div><!-- container -->
        </div>

        <!-- NAV MENU -->
		<div class="mainnav">
			<nav class="navbar navbar-inverse"><!-- navbar-fixed-top -->
				<div class="container">
                    <div class="row row-md">
                        <div class="col-md-3">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav">
                                    <span class="sr-only">Toggle mainnav</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="hidden-lg hidden-md navbar-brand<?php if(is_home()) echo ' active' ?>" href="<?= site_url('/') ?>"><img src="<?= $logo ?>" alt="logo"><span class="text hidden"><i class="fa fa-home"></i> <?= __('Home', 'leo_blog') ?></span></a>
                            </div>
                            <div id="mainnav" class="collapse navbar-collapse">
                                <?php
                                    if(has_nav_menu( 'primary'))
                                    {
                                        wp_nav_menu( [
                                            'theme_location' => 'primary',
                                            'items_wrap'	 => '<a data-toggle="collapse" href="#primary-menu-list" aria-expanded="true" aria-controls="primary-menu-list">
                                                <i class="fa fw fa-bars"></i> &nbsp; Danh Mục Sản Phẩm <i class="fa fa-chevron-down arrow"></i></a>
                                                <div class="collapse'.((is_front_page())? ' in' : '').'" id="primary-menu-list"><ul class="%1$s %2$s list-unstyled"> %3$s </ul></div>',
                                            'container' => 'div',
                                            'container_id' => 'primary-menu',
                                            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                            'walker' => new WP_Bootstrap_Navwalker(),
                                        ] );
                                        
                                        // wp_nav_menu( [
                                        // 	'theme_location' => 'primary',
                                        // 	'items_wrap'	 => '<ul id="primary-menu" class="%1$s %2$s nav navbar-nav">%3$s</ul>',
                                        // 	'container'		=> false,
                                        //     'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                        //     'walker' => new WP_Bootstrap_Navwalker(),
                                        // ] );
                                    }
                                    
                                    // if(has_nav_menu( 'top'))
                                    // {
                                    // 	wp_nav_menu( [
                                    // 		'theme_location' => 'top',
                                    // 		'items_wrap' => '<ul id="top-menu" class="%1$s %2$s nav navbar-nav">%3$s</ul>',
                                    // 		'container'		=> false,
                                    //         'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                    //         'walker' => new WP_Bootstrap_Navwalker(),
                                    // 	] );
                                    // }

                                ?>
                            </div><!-- #mainnav -->
                        </div>
                        <div class="col-md-9"> &nbsp; </div>
                    </div>
				</div>
			</nav>
		</div><!-- .mainnav -->

    </header>
    <div class="droplet"></div>

