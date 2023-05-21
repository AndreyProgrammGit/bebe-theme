<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bebe
 */

?>
	<?php 
		global $bebe_options;

	?>

</section>
    <!-- Footer Section -->
    <footer>

        <section>
            <div class="center-align cf">

                <!-- Some Info  -->
                <div class="col-6 float-left">
                    <div class="col-5 information">
                        <h3>Information</h3>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-footer',
									'menu_id'        => 'footer-menu',
									'menu_class'     => 'cf',
									// 'container'      => 'nav'
								)
							);
						?>
                    </div>
                    <div class="col-7 contacts">
                        <h3>Contacts</h3>
                        <?php if($bebe_options['phone']) { ?><span class="tel"><strong><?php echo esc_attr($bebe_options['phone']); ?></strong></span><?php } ?>
                        <?php if($bebe_options['email']) { ?><a href="mailto:<?php esc_html__($bebe_options['email']); ?>"><span class="mail"><?php echo esc_attr($bebe_options['email']); ?></a></span><?php } ?>
                        <?php if($bebe_options['location']) { ?><span><?php echo esc_attr($bebe_options['location']); ?></span><?php } ?>
                        <ul>
						<?php if($bebe_options['fb']) { ?> <li class="facebook"><a href="<?php echo $bebe_options['fb']; ?>"></a></li><?php } ?>
						<?php if($bebe_options['insta']) { ?> <li class="instagram"><a href="<?php echo $bebe_options['insta']; ?>"></a></li><?php } ?>
						<?php if($bebe_options['pin']) { ?> <li class="pinterest"><a href="<?php echo $bebe_options['pin']; ?>"></a></li><?php } ?>
						<?php if($bebe_options['twi']) { ?> <li class="twitter"><a href="<?php echo $bebe_options['twi']; ?>"></a></li><?php } ?>
						<?php if($bebe_options['yt']) { ?> <li class="youtube"><a href="<?php echo $bebe_options['yt']; ?>"></a></li><?php } ?>
                        </ul>
                    </div>
                </div>

                <!-- Form -->
                <div class="form float-right">
                    <form class="cf" method="post" id="contact-form">
                        <input id="name" name="name" type="text" placeholder="Name"/>
                        <input id="email" name="email" type="text" placeholder="Email"/>
                        <textarea id="message" name="subject" placeholder="Message"></textarea>
                        <input id="submit" type="submit" value="Send"/>
                    </form>
                </div>

            </div>

            <!-- Bottom Line -->
            <div class="bottom-line">
                <a class="top" href="#top">TOP</a>

                <div class="center-align cf">
                    <div class="left">&copy;<?php echo $bebe_options['copyrights']; ?></div>
                    <div class="right">
						<?php if($bebe_options['footerlogo']['url']){ ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url($bebe_options['footerlogo']['url']); ?>" class="footer_logo" alt="">
						</a>
						<?php }?>
					</div>
                </div>
            </div>

        </section>


        <!-- Background Awesomeness -->
        <div id="footer-white"></div>
        <div id="footer-yellow"></div>

        <!-- Clouds -->
        <div id="footer-cloud1"></div>
        <div id="footer-cloud2"></div>

        <!-- Birds -->
        <div id="footer-bird1"></div>
        <div id="footer-bird2"></div>
        <div id="footer-bird3"></div>

        <!-- Waves -->
        <div class="waves">
            <div id="footer-wave1"></div>
            <div id="bui"></div>
            <div id="footer-wave2"></div>
        </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>
