<div class="relative overflow-hidden <?php echo $banner['background_colour']; ?> <?php echo $this->blockConfiguration['banner_full_width'] == true ? '' : ' container' ?>" data-element="slide" data-slide-type="featured">

    <?php
    // Include the background image
    $bannerImage = $banner['banner_background_image'];
    if (!empty($bannerImage)) :
    ?>
        <div class="absolute top-0 left-0 right-0 bottom-0 width-100 z1 bg-cover" style="background-image:url('<?php echo $bannerImage['url']; ?>');" data-element="background-image"></div>
    <?php endif; ?>

    <?php
    // Include the background overlay
    if (!empty($banner['banner_overlay_opacity']) && $banner['banner_overlay_opacity'] == true) : ?>
        <div class="absolute top-0 left-0 right-0 bottom-0 width-100 z2 <?php echo $banner['banner_overlay_opacity']; ?> reduced-height" style=" background-color: <?php echo $banner['banner_overlay_colour'] ?>;" data-element="overlay"></div>
    <?php endif; ?>

    <?php
    // Include the featured image that overflows the background
    $featuredImageSrc = $banner['banner_feature_image']['sizes']['large'];
    $featuredImageAlt = $banner['banner_feature_image']['alt'];

    if (!empty($featuredImageSrc)) : ?>
        <img src="<?php echo $featuredImageSrc; ?>" alt="<?php echo $featuredImageAlt; ?>" data-element="feature-image">
    <?php endif; ?>

    <div class="container flex items-center relative px4 <?php echo $this->blockConfiguration['banner_height']; ?>">

        <div class="col-12 md-col-6 py4 z4">
            <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $banner['banner_content']); ?>
            <?php
            // Include banner buttons
            if (isset($banner['banner_buttons']) && !empty($banner['banner_buttons'])) : ?>
                <div data-element="buttons" data-button-alignment="<?php echo $banner['button_alignment']; ?>" class="<?php echo $banner['banner_content_alignment'] == 'justify-center' ? 'text-center' : '' ?>">
                    <?php
                    if (!empty($banner['banner_buttons'])) :
                        foreach ($banner['banner_buttons'] as $index => $button) : ?>

                            <a data-element="button" data-button-style="<?php echo $button['button_type']; ?>" href="<?php echo $button['button']['url']; ?>">
                                <?php echo $button['button']['title']; ?>
                                <?php if (!empty($button['icon'])) : ?>
                                    <span class="h5 ml2"><?php echo $button['icon']; ?></span>
                                <?php endif; ?>
                            </a>

                    <?php endforeach;
                    endif; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

</div>