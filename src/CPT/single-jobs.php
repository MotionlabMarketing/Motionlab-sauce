<?php
/**
* The single template for jobs.
*/

get_header();

?>

<main id="site-content" role="main">

    <section class="px4 py5 bg-light-grey">
        <div class="container flex flex-column-reverse md-flex-row justify-between">
            <div class="">
                <h1 class="dark-purple h1"><?php echo get_field('job_role_title'); ?></h1>
                <?php if(get_field('job_role_salary')):?>
                    <p class="bold h3 black mt0 mb2 lh1">Salary: <?php echo get_field('job_role_salary'); ?></p>
                <?php endif;?>
                <?php if(get_field('job_location')):?>
                    <p class="bold h3 black mt0 mb2 lh1">Location: <?php echo get_field('job_location'); ?></p>
                <?php endif;?>
                <?php if(get_field('job_expiry_date')):?>
                    <p class="mt0 mb2">Expires: <?php echo get_field('job_expiry_date'); ?></p>
                <?php endif;?>
            </div>
            <div class="">
                <a href="#" class="btn btn-primary px4 bg-primary white h5 uppercase">Back</a>
            </div>
        </div>
    </section>

    <section class="px4 py5">
        <div class="container">
            <div class="lg-col-9 mx-auto">
                <?php echo get_field('job_role_description'); ?>
                <div class="mt5">
                    <?php
                        if ( class_exists( 'Ninja_Forms' ) ) {
                            Ninja_Forms()->display( get_field('job_submission_form')['id'] );
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

</main><!-- #site-content -->

<?php get_footer(); ?>
