<?php

use Motionlab\Sauce\Components\Breadcrumbs;

get_header();

$breadcrumbs = new Breadcrumbs();
?>

    <section class="">

        <?php //TODO: BG - Background Image from Category Page ?>
        <div class="col col-12 py6 relative bg-cover bg-center py4 px4 mb4" style="background-image: url('http://local.sashwindows.d3z.uk/app/uploads/2020/01/steinar-engeland-hmIFzdQ6U5k-unsplash.jpg');" data-element="download-booklet">
            <div class="absolute top-0 left-0 right-0 bottom-0 bg-overlay width-100 height-100 z1"></div>

            <div class="container relative z2 white py6">
                <?php //TODO: Hook this up plz. Cat Title & Description ?>
                <h1 class="h0 text-center mb3 h2">Category Title</h1>
                <p class="mb0 text-center h4 md-col-8 lg-col-6 mx-auto">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>

            </div>
        </div>
        </div>

        <?php
        // Breadcrumbs
        //TODO: Please move this from the child to the master theme.
        $breadcrumbs->render(get_stylesheet_directory().'/src/template_parts/breadcrumbs.php');
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
