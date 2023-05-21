<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bebe
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php global $bebe_options; ?>

    <!-- Background Awesomeness -->
    <div id="night"></div>

    <!-- Stars -->
    <div class="back" id="stars1"></div>
    <div class="back" id="stars2"></div>

    <!-- Clouds -->
    <div class="back" id="cloud1"></div>
    <div class="back" id="cloud2"></div>
    <div class="back" id="cloud3"></div>
    <div class="back" id="cloud4"></div>
    <div class="back" id="cloud5"></div>

    <!-- Header Section -->
    <header>
        <div class="center-align cf">

            <!-- Logo -->	
                <div class="logo float-left"> 
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php if($bebe_options['bebelogo']['url']) { ?><img src="<?php echo esc_url($bebe_options['bebelogo']['url']); ?>" class="big_divice" alt=""><?php } ?>
                    <?php if($bebe_options['bebelogosmall']['url']) { ?><img src="<?php echo esc_url($bebe_options['bebelogosmall']['url']); ?>" class="small_divice" alt=""><?php } ?>
                    </a>
					<span>
						<?php echo esc_attr($bebe_options['bebeslogan']); ?>
					</span> 
				</div>
            <!-- Social & Search -->
            <div class="social float-right cf">
                <form id="search" method="get" action="<?php echo esc_url(site_url()); ?>">
                    <input class="search-inp" type="text" name="s" size="21" maxlength="120" placeholder="Search">
                    <input class="search-btn" type="submit" value="">
                </form>
                <ul>
                  <?php if($bebe_options['fb']) { ?> <li class="facebook"><a href="<?php echo $bebe_options['fb']; ?>"></a></li><?php } ?>
                  <?php if($bebe_options['insta']) { ?> <li class="instagram"><a href="<?php echo $bebe_options['insta']; ?>"></a></li><?php } ?>
                  <?php if($bebe_options['pin']) { ?> <li class="pinterest"><a href="<?php echo $bebe_options['pin']; ?>"></a></li><?php } ?>
                  <?php if($bebe_options['twi']) { ?> <li class="twitter"><a href="<?php echo $bebe_options['twi']; ?>"></a></li><?php } ?>
                  <?php if($bebe_options['yt']) { ?> <li class="youtube"><a href="<?php echo $bebe_options['yt']; ?>"></a></li><?php } ?>
                </ul>
            </div>

            <!-- Nav -->
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-header',
                            'menu_id'        => 'header-menu',
                            'menu_class'     => 'cf',
                            'container'      => 'nav'
                        )
                    );
                ?>

            <!-- Drop Down -->
            <div class="drop-menu">
                <a>Menu</a>

                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'mobile-menu',
                            'menu_class'     => 'ul-drop',
                            'container'      => false
                        )
                    );
                ?>
            </div> 

        </div>
    </header>

    <!-- Slider -->
    <?php if(is_front_page()) { ?>

    <?php 
        $slides = '';   
        $slides = $bebe_options['homepageslider'];
    ?>
        <div class="center-align">
            <div id="slider">
                <ul class="slides">

                <?php  
                    if($slides) {
                        foreach($slides as $slide){ ?>
                            <li>
                                <div class="wood">
                                    <div class="text">
                                    <?php if($slide['title']) { ?> <h2 class="caption"><?php echo esc_attr($slide['title']); ?></h2><?php }?>
                                        <?php if($slide['description']) { ?>  <p class="content">
                                            <?php echo esc_attr($slide['description']); ?>
                                        </p><?php }?>
                                      <?php if($slide['url']) { ?><a class="more" href="<?php echo esc_url($slide['url']); ?>"><?php esc_html_e('More', 'bebe')?>></a><?php }?>
                                    </div>
                                </div>
                                <img src="<?php echo esc_url($slide['image']); ?>" alt="" />
                            </li>
                    <?php }
                    }
                ?>
                    <!-- -->
                </ul>
            </div>
        </div>
    <!-- Content Section -->
    <section id="content" class="center-align">
    <?php } else { ?>

        <section class="center-align">

        <!-- Caption -->
        <div class="title-page">
            <h2><?php
            if(is_tag()){
                echo 'Tag Archive' . single_tag_title('',false);
            } elseif(is_search()){
                echo 'Search Results for : ' . get_search_query();
            } elseif(is_author()){
                echo 'Author' . get_the_author();
            } elseif(is_post_type_archive('rooms')){
                echo 'Our Rooms';
            } elseif(is_post_type_archive('gallery')){
                echo 'Our Gallery';
            } elseif(is_category()){
                echo 'Category';
            } elseif(is_archive()){
                if(is_day()){
                    echo 'Day Archive' . get_the_date('d M');
                } elseif(is_month()){
                    echo 'Month Archive' . get_the_date('M');
                } elseif(is_year()){
                    echo 'Year Archive' . get_the_date('Y');
                } else {
                    echo 'Archive';
                }
            } else{
                wp_title('');
            }
            
            ?></h2>
            <div class="page">
                <span class="home"></span><?php echo get_breadcrumbs(); ?>
            </div>
        </div>

        <!-- -->
        <div class="dotted-line"></div>

    <?php } ?>


<?php wp_body_open(); ?>
