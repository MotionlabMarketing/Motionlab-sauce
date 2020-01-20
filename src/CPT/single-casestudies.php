<?php
/**
 * The single template for case studies.
 */

get_header();
the_post();
?>

<main data-element="single-expertise">

    <div class="container clearfix pt5 pb6 px4 lg-px0 flex">

        <div class="col col-12 lg-col-8 lg-px4 mx-auto">

            <?php
            $banner_image = wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail');
            if (!empty($banner_image)) : ?>
                <img class="mb4 block width-100" src="<?php echo $banner_image; ?>" alt="<?php echo get_the_title(); ?>">
            <?php endif; ?>

            <div class="wysiwyg">

                <h1 class="h0 mb4"><?php echo get_the_title(); ?></h1>
                <?php if (!empty(get_field('case_study_location')->post_title)) : ?>
                <p><?php echo get_field('case_study_location')->post_title; ?> - <?php echo get_field('case_study_location')->guid;?></p>
                <?php endif; ?>

                <?php echo get_field('case_study_content'); ?>

                <p><?php //echo get_field('case_study_date');?></p>

            </div>

        </div>

    </div>

</main>

<?php
get_footer();
