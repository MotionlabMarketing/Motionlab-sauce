<?php
/**
 * The single template for testimonials.
 */

get_header();

?>

<main id="site-content" role="main">
    <p><?php echo get_the_title(); ?></p>
    <p><?php echo get_field('testimonial_content'); ?></p>
    <p><?php echo get_field('testimonial_reviewer_name'); ?> </p>
    <p><?php echo get_field('testimonial_date'); ?></p>
    <p><?php echo get_field('testimonial_star_rating'); ?></p>
</main><!-- #site-content -->

<?php get_footer(); ?>
