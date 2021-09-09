<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
    Content: $this->blockConfiguration['alternating_media_content']
    Image: $this->blockConfiguration['alternating_media_image']
    Padding: $this->blockConfiguration['alternating_media_padding']
    Image Position: $this->blockConfiguration['alternating_media_image_position']
    Background Colour: $this->blockConfiguration['alternating_media_background_colour']
    Contain To Grid: $this->blockConfiguration['alternating_media_contain_to_grid'] TODO
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
$buttons = $this->blockConfiguration['alternating_media_buttons'];
?>

<section class="px4 xl-px0 <?php echo $this->blockConfiguration['alternating_media_padding'] == true ? 'py5' : '' ?> <?php echo $this->blockConfiguration['alternating_media_background_colour']; ?>" data-media-side="<?php echo $this->blockConfiguration['alternating_media_image_position'] == 'left' ? 'left' : 'right' ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <?php if (!empty($this->blockConfiguration['alternating_media_contain_to_grid'])) : ?>
        <div class="container">
        <?php endif; ?>

        <div class="clearfix">
            <div class="<?php echo $this->blockConfiguration['alternating_media_image_position'] == 'left' ? 'left' : 'right' ?> col col-12 md-col-6 bg-cover bg-center" data-element="alternating_media-panel_image" data-mh="alternating_media_panels" style="background-image:url('<?php echo $this->blockConfiguration['alternating_media_image']['sizes']['medium_large']; ?>');"></div>
            <div class="left col col-12 md-col-6 py5 md-px6 md-p5 flex items-center justifiy-center" data-element="alternating_media-panel_content" data-mh="alternating_media_panels">
                <div class="wysiwyg width-100">
                    <?php echo $this->blockConfiguration['alternating_media_content']; ?>

                    <?php if ($buttons) : ?>
                        <div class="mxn1" data-element="buttons">
                            <?php foreach ($buttons as $button) : ?>
                                <a href="<?php echo $button['button']['url']; ?>" class="btn text-decoration-none btn-primary white bg-primary mx1" data-element="button">
                                    <?php echo $button['button']['title']; ?>
                                    <?php if (!empty($button['icon'])) : ?>
                                        <span class="h5 ml2"><?php echo $button['icon']; ?></span>
                                    <?php endif; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <?php if (!empty($this->blockConfiguration['alternating_media_contain_to_grid'])) : ?>
        </div>
    <?php endif; ?>
</section>