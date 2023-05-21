<?php 
    get_header();
?>

<article class="gallery">
    
    <div class="items1 cf">
        <?php global $query_string;
        
        query_posts($query_string . '&posts_per_page=10');
        ?>
        <?php $i = 0; while ( have_posts() ) : the_post(); $i++;?> 
            <?php if($i == 1 || $i == 6): ?>
                <a class="<?php echo $i?>" href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery-one');?></a>
            <?php elseif($i == 2 || $i == 5 || $i == 7 || $i == 8): ?>
                <a class="<?php echo $i?>" href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery-two');?></a>
            <?php elseif($i == 3 || $i == 4 ||$i == 9 || $i == 10) :?>
                <a class="<?php echo $i?>" href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery-third');?></a>
            <?php endif; ?>  
            
            <?php if($i == 5): ?>
                </div>
                <div class="items2 cf">
            <?php endif; ?>
        <?php endwhile; ?> 
    </div>

    <!-- <div class="items2 cf">
        <a href="gallery-opened.html"><img src="css/images/gallery/6.jpg" alt=""/></a>
        <a href="gallery-opened.html"><img src="css/images/gallery/7.jpg" alt=""/></a>
        <a href="gallery-opened.html"><img src="css/images/gallery/9.jpg" alt=""/></a>
        <a href="gallery-opened.html"><img src="css/images/gallery/10.jpg" alt=""/></a>
        <a href="gallery-opened.html"><img src="css/images/gallery/8.jpg" alt=""/></a>
    </div> -->


</article>

<!-- Pagination -->
<article class="pagination gall">
<?php $settings = [
			'prev_next' => false,
		];
echo paginate_links($settings); ?>
</article>

<?php
    get_footer();