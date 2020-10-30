<?php
$bannerImage = $banner['banner_background_image'];
$buttons = $banner['banner_buttons'];
?>

<div class="relative clearfix <?php echo $this->blockConfiguration['banner_height']; ?>" data-element="slide" data-slide-type="standard">

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

    <div class="absolute top-0 left-0 right-0 bottom-0 width-100 z3 flex items-center <?php echo $banner['banner_content_alignment']; ?>">

        <div class="col-8 relative">

            <?php if (!empty($banner['banner_content'])) : ?>
                <div class="wysiwyg" data-mh="banner-content">
                    <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $banner['banner_content']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($banner['banner_buttons']) && !empty($banner['banner_buttons'])) : ?>
                <div data-element="buttons" data-button-alignment="<?php echo $banner['button_alignment']; ?>" class="mt4 <?php echo 'text-' . $banner['button_alignment']; ?>">
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