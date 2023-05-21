<?php 
/**
 *  Template name: Contact Template
 */
get_header(); ?>

<!-- Contacts -->

<?php while ( have_posts() ) : the_post(); ?>
<article class="contacts">

<div class="info-line cf">
    <div class="map">

        <?php
            // $address = get_post_meta(get_the_ID(), 'bebe_address', true);
            // $api_key_googlemap = get_post_meta(get_the_ID(), 'bebe_googleapi', true);
            // echo do_shortcode('[pw_map address="'.esc_attr($address).'" width="440px" height="380px" key="'.esc_attr($api_key_googlemap).'"]');
        ?>


        <iframe src="https://maps.google.com/maps?q=google+map+new+york&amp;ie=UTF8&amp;hq=&amp;hnear=%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA,+%D0%A1%D0%BE%D0%B5%D0%B4%D0%B8%D0%BD%D0%B5%D0%BD%D0%BD%D1%8B%D0%B5+%D0%A8%D1%82%D0%B0%D1%82%D1%8B+%D0%90%D0%BC%D0%B5%D1%80%D0%B8%D0%BA%D0%B8&amp;gl=md&amp;t=m&amp;z=10&amp;ll=40.714353,-74.005973&amp;output=embed"></iframe><br />
    </div>

    <?php the_content(); ?>

    <div class="contactos">
        <?php if(!empty(get_post_meta(get_the_ID(), 'bebe_address', true))): ?>
            <div class="adress">
                <div class="icon"></div>
                <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_address_label', true));?></h3>
                <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_address', true));?></p>
            </div>
        <?php endif; ?>
        <?php if(!empty(get_post_meta(get_the_ID(), 'bebe_phone', true))): ?>
        <div class="phone">
            <div class="icon"></div>
            <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_phone_label', true));?></h3>
            <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_address', true));?></p>
        </div>
        <?php endif; ?>
        <?php if(!empty(get_post_meta(get_the_ID(), 'bebe_email', true))): ?>
        <div class="email">
            <div class="icon"></div>
            <h3><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_email_label', true));?></h3>
            <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'bebe_email', true));?></p>
        </div>
        <?php endif; ?>
    </div>


</div>

<!-- -->

<div class="respond">
    <div class="top"> <h2>Get in touch with us</h2> </div>

    <form class="cf" method="post" id="respond-form">

        <div class="col-4">
            <input name="name" type="text" placeholder="Type your name"/>
        </div>

        <div class="col-4">
            <input name="email" type="text" placeholder="Type your email"/>
        </div>

        <div class="col-4">
            <input name="phone" type="text" placeholder="Type your phone"/>
        </div>

        <textarea name="subject" placeholder="Type your message"></textarea>

        <input class="submit" type="submit" value=""/>
    </form>

</div>

</article>
<?php endwhile; ?>
<?php get_footer(); ?>