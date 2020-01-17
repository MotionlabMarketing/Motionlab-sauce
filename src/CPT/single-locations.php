<?php
/**
 * The single template for locations.
 */

get_header();

?>

<main id="site-content" role="main">
    <p><?php echo get_the_title(); ?></p>
    <p><?php echo get_field('location_practice_type'); ?></p>
    <p><?php echo get_field('location_treatments'); ?> </p>
    <p><?php echo get_field('location_accessibility'); ?></p>
    <p><?php echo get_field('location_phone_number'); ?></p>
    <p><?php echo get_field('location_email_address'); ?></p>
    <p><?php echo get_field('location_website_url'); ?></p>
    <p><?php echo get_field('location_address'); ?></p>
    <p><?php echo get_field('location_postcode'); ?></p>
    <p><?php echo get_field('location_latitude'); ?></p>
    <p><?php echo get_field('location_longitude'); ?></p>
    <p><?php echo get_field('location_content'); ?></p>
</main><!-- #site-content -->

<?php get_footer(); ?>
