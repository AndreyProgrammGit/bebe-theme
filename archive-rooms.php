<?php 
get_header();
?>

<article class="rooms">

    <!-- -->
    <?php
        $posts_per_page = '6';
        if(isset($bebe_options['roomscount'])){
            $posts_per_page = $bebe_options['roomscount'];
        }
        $args = [
            'post_type' => 'rooms',
            'posts_per_page' => $posts_per_page,
        ];
        $i = 0;

        $rooms_post = new WP_Query($args);
    ?>  
    <div class="line cf">
    <?php if ( $rooms_post->have_posts() ) :  while ( $rooms_post->have_posts() ) : $rooms_post->the_post(); $i++;?>
            <div class="col-6">
                <div class="col-6 text">
                    <h3><a href="rooms-opened.html"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                    <a class="more" href="<?php the_permalink(); ?>">More></a>
                </div>
                <div class="col-6 img">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'rooms-photo'); ?>
                </div>
            </div>
    <?php $count = $rooms_post->found_posts;
        
        if($i < $count & ($i % 2) === 0){
            echo '</div><div class="line cf">'; 
        }
    ?> 
    <?php endwhile; endif; ?>
    </div>
</article>

<!-- Pagination -->
<article class="pagination">
<?php $settings = [ 'prev_next' => false, ];
echo paginate_links($settings); ?>
</article>


<?php
get_footer();