<?php
/**
 * The single template for treatments.
 */

get_header();

$genericTemplate = new \Motionlab\Sauce\PageTemplates\Generic\GenericTemplate();

?>

<main id="site-content" role="main">
    <?php
        $_blocks = $genericTemplate->getBlocks(get_the_id());
        //We use this to check the first index for serialized data. If it is serialized then there
        //is an issue with the ACF (or it has been copied using WPMCC) and we want to not render here
        $firstIndex = $_blocks["generic_blocks"][0];

        $firstKey = array_keys($firstIndex)[0];

        if(!is_serialized($firstIndex[$firstKey])) {
            $genericTemplate->renderFlexibleContent(get_the_id());
        } else {

            $tuid = get_field('treatment_uid', get_the_id());

            define('LOADED_BLOG_ID', get_current_blog_id());

            switch_to_blog(get_network()->site_id);
                //get content by uid
                $findPostByUID = new WP_Query(array(
                    'post_type' => 'treatments',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'meta_key' => 'treatment_uid',
                    'meta_value' => $tuid
                ));

                if($findPostByUID->post_count > 0) {
                    $_post = $findPostByUID->posts[0];

                    $genericTemplate->getBlocks($_post->ID);
                    $genericTemplate->renderFlexibleContent($_post->ID);
                }

            restore_current_blog();
        }
    ?>
</main><!-- #site-content -->

<?php get_footer(); ?>
