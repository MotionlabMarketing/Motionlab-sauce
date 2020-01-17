<?php

get_header();

?>

<section class="">

    <main class="container clearfix py4">

        <div class="col col-12">
            <h1 class="h0 text-center"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
        </div>

        <div class="clearfix">
        <?php

            if (have_posts()) :
                $i = 0;
                while (have_posts()) : the_post();

                    include('template-parts/post.php');
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
