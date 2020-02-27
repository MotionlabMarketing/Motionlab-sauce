<?php
$post->category_id = get_post_meta($post->id, 'rank_math_primary_category', true);
$post->category_id = $post->category_id ? $post->category_id : wp_get_post_categories($post->ID)[0];
$post->category_primary = get_term($post->category_id);
?>

<article class="p3 mb4 hover-zoom" data-mh="post">

    <a href="<?php the_permalink(); ?>" class="block box-shadow zoom">

        <div class="bg-charcoal" data-mh="post-image">

            <?php

                $thumbnail_id = get_post_thumbnail_id($post->ID);
                $raw_thumbail = wp_get_attachment_metadata($thumbnail_id);
                $post_img_src = wp_get_attachment_image_src($thumbnail_id, 'blog-block-image')[0];
                $post_img_alt = (get_post_meta($thumbnail_id, '_wp_attachment_image_alt', TRUE)) ? "alt='" . get_post_meta($thumbnail_id, '_wp_attachment_image_alt', TRUE) . "'" : "";

            ?>

            <img
                src="<?php echo $post_img_src ?>"
                alt="<?php echo $post_img_alt ?>"
                class="post-thumbnail « width-100 block"
            />

        </div>

        <div class="px4 py4 black" data-mh="post-content">

            <p class="h5 ls1 uppercase mb2 black">
                <?php if (!empty($post->category_primary)) :
                    echo $post->category_primary->name;
                endif; ?>
            </p>
            <h5 class="h4 black mb0"><?php echo $post->post_title ?></h5>
            <?php if (!empty($post->post_excerpt)) : ?>
                <p class="mt2 mb0 inherit"><?php echo $post->post_excerpt ?></p>
            <?php endif; ?>

        </div>

    </a>

</article>