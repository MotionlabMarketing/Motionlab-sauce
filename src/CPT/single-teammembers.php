<?php
/**
 * The single template for team members.
 */

get_header();

?>

<main id="site-content" role="main">

    <?php $url = wp_get_attachment_url( get_post_thumbnail_id(), 'thumbnail' ); ?>
    <img alt="<?php echo get_the_title(); ?>" src="<?php echo $url ?>" />

    <p><?php echo get_the_title(); ?></p>
    <p><?php echo get_field('team_member_role'); ?></p>
    <p><?php echo get_field('team_member_phone_number'); ?></p>
    <p><?php echo get_field('team_member_email_address'); ?></p>
    <p><?php echo get_field('team_member_bio'); ?></p>

</main><!-- #site-content -->

<?php get_footer(); ?>
