<?php

$image = get_the_post_thumbnail_url(get_the_id(), 'post_thumbnail');

?>
<div class="col col-12 md-col-4 p2 hover-zoom" data-mh="post">

    <div class="border <?php echo ($i % 2 == 0)? "bg-smoke":""; ?>">

        <a href="<?php echo get_the_permalink(); ?>" class="block bg-white" data-mh="post_image">
            <?php if (!empty($image)) : ?>
            <div class="bg-smoke overflow-hidden" style="height: 16rem;">
                <div style="height: 16rem; background-image: url('<?php echo $image; ?>');" class="zoom bg-cover"></div>
            </div>
            <?php endif; ?>
        </a>

        <div class="px4 py3">
            <a href="<?php echo get_the_permalink(); ?>"><h2 class="h4 bold" data-mh="post_title"><?php echo get_the_title(); ?></h2></a>
            <div class="wysiwyg" data-mh="post_content">
                <?php the_excerpt(); ?>
            </div>
        </div>

    </div>

</div>