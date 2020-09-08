<?php
$post->category_id = get_post_meta($post->id, 'rank_math_primary_category', true);
$post->category_id = $post->category_id ? $post->category_id : isset(wp_get_post_categories($post->ID)[0]) ? wp_get_post_categories($post->ID)[0] : '';
$post->category_primary = get_term($post->category_id);
?>

<article class="p3 mb4 hover-zoom" data-mh="post">

    <a href="<?php the_permalink(); ?>" class="block box-shadow zoom">

        <div class="bg-charcoal" data-mh="post-image">

            <?php

            $thumbnail_id = get_post_thumbnail_id($post->ID);

            if($thumbnail_id) {
                $raw_thumbail = wp_get_attachment_metadata($thumbnail_id);
                $post_img_src = wp_get_attachment_image_src($thumbnail_id, 'blog-block-image')[0];
                $post_img_alt = (get_post_meta($thumbnail_id, '_wp_attachment_image_alt', TRUE)) ? get_post_meta($thumbnail_id, '_wp_attachment_image_alt', TRUE) : "";
            } else {
                $post_img_array = get_field('options_archive_defaults','option');
                $post_img_src = $post_img_array['default_archive_background']['sizes']['post-thumbnail'];
                $post_img_alt = $post_img_array['default_archive_background']['alt'];
            }

            ?>

            <img
                    src="<?php echo $post_img_src ?? 'https://via.placeholder.com/600x400?text=Default archive background' ?>"
                    alt="<?php echo $post_img_alt ?>"
                    class="post-thumbnail « width-100 block"
            />

        </div>

        <div class="px4 py4 black" data-mh="post-content">

            <p class="h5 ls1 uppercase mb2 black">
                <?php if (!empty($post->category_primary) && !isset($post->category_primary->errors)) :
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