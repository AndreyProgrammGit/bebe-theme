<?php 
/**
 *  Template name: Homepage Template
 */

get_header(); ?>

<article class="about-us-home cf">
            <aside class="about cf">
                <div class="img">
                    <img src="<?php echo esc_url(get_post_meta(get_the_ID(), 'bebe_about_photo', true)); ?>" alt=""/>
                </div>
                <div class="text">
                    <h2><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_about_title', true)); ?></h2>
                    <p>
                        <?php echo esc_html(get_post_meta(get_the_ID(), 'bebe_about_desc', true)); ?>
                    </p>
                    <a class="more" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'bebe_about_link', true)); ?>">More></a>
                </div>
            </aside>
            <aside class="list">
                <ul>
                    <li class="cf">
                        <div class="icon i1"></div>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_1', true)); ?></a>
                        <p><?php echo esc_html(get_post_meta(get_the_ID(), 'bebe_info_description_1', true)); ?></p>
                    </li>
                    <li class="cf">
                        <div class="icon i2"></div>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_2', true)); ?></a>
                        <p><?php echo esc_html(get_post_meta(get_the_ID(), 'bebe_info_description_2', true)); ?></p>
                    </li>
                    <li class="cf">
                        <div class="icon i3"></div>
                        <a href="" class="caption"><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_info_title_3', true)); ?></a>
                        <p><?php echo esc_html(get_post_meta(get_the_ID(), 'bebe_info_description_3', true)); ?></p>
                    </li>
                </ul>
            </aside>
        </article>

        <!-- Recent From Blog -->
        <article class="recent-blog-home">
            <h2 class="title">Recent from blog</h2>

            <div class="items cf">

                <?php 
                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => '4'
                    ];

                    $home_posts = new WP_Query($args);
                
                    while ( $home_posts->have_posts() ) : $home_posts->the_post(); ?>
        
                        <div class="col-3">
                            <a href="blog-single.html">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-front'); ?>
                            </a>
                            <div class="info cf">
                                <div class="time"><?php echo get_the_date(); ?></div>
                                <a href="<?php the_permalink(); ?>" class="comments"><?php echo comments_number(); ?></a>
                            </div>
                            <div class="text">
                                <a href="<?php the_permalink(); ?>" class="caption"><?php the_title(); ?></a>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                        </div>

                <?php  endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </article>
    </section>

    <!-- Photo Gallery -->
    <div class="center-align photo-gallery">
        <div class="top">
            <h2>Photo Gallery</h2>
        </div>

        <div id="photo-gallery">

        <?php 

            $args = [
                'post_type' => 'gallery',
                'posts_per_page' => '10'
            ];

            $home_galleries = new WP_Query($args); 

        ?>
            <ul class="slides">
                <!-- -->

                <li>
                    <div class="items1">
                        <?php $i = 0; while ( $home_galleries->have_posts() ) : $home_galleries->the_post(); $i++;?> 
                            <?php if($i == 1 || $i == 6): ?>
                                <a class="<?php echo $i?>" href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery-one');?></a>
                            <?php elseif($i == 2 || $i == 5 || $i == 7 || $i == 8): ?>
                                <a class="<?php echo $i?>" href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery-two');?></a>
                            <?php elseif($i == 3 || $i == 4 ||$i == 9 || $i == 10) :?>
                                <a class="<?php echo $i?>" href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery-third');?></a>
                            <?php endif; ?>  
                            
                            <?php if($i == 5): ?>
                                </div>
                                </li>

                                <li>
                                <div class="items2">
                            <?php endif; ?>
                        <?php  endwhile; wp_reset_postdata(); ?>    
                    </div>                          
                </li>

                <!-- <li>
                    <div class="items1">
                        <a href="gallery-opened.html"><img src="css/images/gallery/1.jpg" alt=""/></a>
                        <a href="gallery-opened.html"><img src="css/images/gallery/2.jpg" alt=""/></a>
                        <a href="gallery-opened.html"><img src="css/images/gallery/4.jpg" alt=""/></a>
                        <a href="gallery-opened.html"><img src="css/images/gallery/3.jpg" alt=""/></a>
                        <a href="gallery-opened.html"><img src="css/images/gallery/5.jpg" alt=""/></a>
                    </div>
                </li>

                <li>
                    <div class="items2">
                        <a href="gallery-opened.html"><img src="css/images/gallery/6.jpg" alt=""/></a>
                        <a href="gallery-opened.html"><img src="css/images/gallery/7.jpg" alt=""/></a>
                        <a href="gallery-opened.html"><img src="css/images/gallery/9.jpg" alt=""/></a>
                        <a href="gallery-opened.html"><img src="css/images/gallery/10.jpg" alt=""/></a>
                        <a href="gallery-opened.html"><img src="css/images/gallery/8.jpg" alt=""/></a>
                    </div> 
                </li> -->
            </ul>
        </div>

        <div class="back"></div>
        <div class="bottom"></div>
        <div class="anchor"></div>
    </div>

<?php get_footer();