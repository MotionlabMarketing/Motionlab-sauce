<?php

get_header();

?>

    <section class="">

        <main class="container clearfix py4">

            <div class="col col-12">
                <h1 class="h0 text-center">
                    <span>
                        <?php echo get_option('page_for_posts') ? get_the_title(get_option('page_for_posts')) : str_replace('Archives:' , '', get_the_archive_title()); ?>
                    </span>
                </h1>
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
