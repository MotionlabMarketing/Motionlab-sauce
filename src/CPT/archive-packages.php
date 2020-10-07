<?php
/**
 * The archive template for packages.
 */

get_header();
the_post();
?>

    <main data-element="archive-packages">

        <div class="container clearfix pt5 pb6 px4 lg-px0 flex">

            <div class="col col-12 lg-col-8 lg-px4 mx-auto">

                <?php \Motionlab\Sauce\Blocks\PackagesBlock\PackagesBlock::unleash('full'); ?>

            </div>

        </div>

    </main>

<?php
get_footer();
