<div class="banner-block banner-featured <?php echo $this->blockConfiguration['banner_full_width'] == true ? '' : 'container' ?>">
    <div class="flex px4 relative <?php echo $this->blockConfiguration['banner_height']; ?>">

        <?php
        // Include the background image
        $bannerImage = $banner['banner_background_image'];
        if (!empty($bannerImage)) :
        ?>
            <div class="absolute top-0 left-0 width-100 z1 bg-cover xl-show reduced-height" style="background-image:url('<?php echo $bannerImage['sizes']['post-thumbnail']; ?>'); background-position: 80% 50%;"></div>
        <?php endif; ?>

        <?php
        // Include the background overlay
        if (!empty($banner['banner_overlay_opacity']) && $banner['banner_overlay_opacity'] == true) : ?>
            <div class="absolute top-0 left-0 width-100 z2 <?php echo $banner['banner_overlay_opacity']; ?> reduced-height" style=" background-color: <?php echo $banner['banner_overlay_colour'] ?>;"></div>
        <?php endif; ?>

        <?php
        // Include the content
        ?>
        <div class="relative z2 flex width-100">

            <div class="container width-100 height-100 flex flex-wrap">

                <div class="col col-12 md-col-6 flex items-center relative justify-center md-justify-center py4 md-pl-5 md-py0 padding-correction">

                    <?php
                    // Include banner content 
                    ?>
                    <div class="slide-content-padding relative wysiwyg text-center md-text-left">
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
                <div class="col col-12 md-col-6 flex relative">
                    <?php
                    // Include the featured image that overflows the background
                    $featuredImageSrc = $banner['banner_feature_image']['sizes']['large'];
                    $featuredImageAlt = $banner['banner_feature_image']['alt'];

                    if (!empty($featuredImageSrc)) : ?>
                        <img src="<?php echo $featuredImageSrc; ?>" alt="<?php echo $featuredImageAlt; ?>" class="featured-image mx-auto right-0 md-absolute bottom-0 width-100">
                    <?php endif; ?>
                </div>

            </div>

        </div>

    </div>
</div>