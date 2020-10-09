<div class="banner-block <?php echo $this->blockConfiguration['banner_full_width'] == true ? '' : 'container' ?>">

    <div class="flex items-center px4 py6 relative <?php echo $this->blockConfiguration['banner_height']; ?>">

        <?php
        $bannerImage = $banner['banner_background_image'];
        $buttons = $banner['banner_buttons'];
        ?>
        <div class="absolute top-0 left-0 width-100 height-100 z1 bg-cover xl-show" style="background-image:url('<?php echo $bannerImage['sizes']['post-thumbnail']; ?>'); background-position: 80% 50%;"></div>

        <?php if ($banner['banner_overlay_opacity']) : ?>
            <div class="absolute top-0 left-0 width-100 height-100 z2 <?php echo $banner['banner_overlay_opacity']; ?>" style="background-color:  <?php echo $banner['banner_overlay_colour'] ?>;"></div>
        <?php endif; ?>

        <div class="flex <?php echo $banner['banner_content_alignment']; ?> width-100">

            <div class="col-9 md-col-6 relative z3">

                <div class="relative wysiwyg" data-mh="banner-content">
                    <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $banner['banner_content']); ?>
                </div>

                <?php if (isset($banner['banner_buttons']) && !empty($banner['banner_buttons'])) : ?>
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

</div>