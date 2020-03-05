<?php

get_header();

?>

<section class="">

    <main class="container clearfix py4">

        <div class="col col-12">
            <h1 class="text-center">
                <?php if(isset($_GET['s'])) { echo "Site Search"; } else { echo get_the_title(get_option('page_for_posts')); } ?>
            </h1>
            <div class="page-search">
                <?php get_search_form(); ?>
            </div>
        </div>

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
