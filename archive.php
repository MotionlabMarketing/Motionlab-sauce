<?php

use Motionlab\Sauce\Components\Breadcrumbs;

get_header();

$breadcrumbs = new Breadcrumbs();

// set some category specific variables or grab defaults
if(is_category()){
    $term = get_term(get_queried_object()->term_id);
    $termIdentifier = $term->taxonomy.'_'.$term->term_id;
    $backgroundImageSrc = get_field('archive_background', $termIdentifier);
    $description = get_field('archive_description', $termIdentifier);
} else {
    $backgroundImageSrc = get_field('default_archive_background','options');
    $description = get_field('default_archive_description','options');
}

?>

    <section class="">

        <div class="col col-12 py6 relative bg-cover bg-center py4 px4 mb4" style="background-image: url('<?php echo $backgroundImageSrc; ?>');" data-element="download-booklet">
            <div class="absolute top-0 left-0 right-0 bottom-0 bg-overlay width-100 height-100 z1"></div>

            <div class="container relative z2 white py6">
                <h1 class="h0 text-center mb3 h2"><?php echo get_the_archive_title(); ?></h1>
                <?php if($description !== null): ?>
                    <p class="mb0 text-center h4 md-col-8 lg-col-6 mx-auto"><?php echo $description; ?></p>
                <?php endif; ?>
            </div>
        </div>

        <?php
        // Breadcrumbs
        //TODO: Please move this from the child to the master theme.
        $breadcrumbs->render();
        ?>

        <main class="container clearfix py4">

            <div class="clearfix">
                <?php

                if (have_posts()) :
                    $i = 0;
                    while (have_posts()) : the_post();

                        echo "<div class='col col-12 md-col-5 lg-col-4 md-hover-zoom'>";
                        include('template-parts/post.php');
                        echo "</div>";
                        $i++;

                    endwhile;
                endif;

                ?>
            </div>

            <div class="pagination my4">
                <?php echo paginate_links(); ?>
            </div>

        </main>

    </section>


<?php

get_footer();
