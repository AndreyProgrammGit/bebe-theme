<?php
get_header();
?>

<!-- Blog -->
<article class="blog">
	<div class="items cf">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<div class="col-3">
			<a href="<?php the_permalink(); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-front'); ?>
            </a>
			<div class="info cf">
				<div class="time"><?php echo get_the_date(); ?></div>
				<a href="<?php the_permalink(); ?>" class="comments">
					<?php echo comments_number(); ?>
				</a>
			</div>
			<div class="text">
				<a href="<?php the_permalink(); ?>" class="caption"><?php the_title(); ?></a>
				<?php the_excerpt(); ?>
			</div>
			<div class="wave"></div>
		</div>
		<?php endwhile; endif; ?>
	</div>
</article>

<!-- Pagination -->
<article class="pagination">
	<?php $settings = [
			'prev_next' => false,
		];
		echo paginate_links($settings); ?>
</article>

<?php
get_footer();
