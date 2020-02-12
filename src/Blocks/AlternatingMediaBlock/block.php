<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
    Content: $this->blockConfiguration['alternating_media_content']
    Image: $this->blockConfiguration['alternating_media_image']
    Padding: $this->blockConfiguration['alternating_media_padding']
    Image Position: $this->blockConfiguration['alternating_media_image_position']
    Background Colour: $this->blockConfiguration['alternating_media_background_colour']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
$buttons = $this->blockConfiguration['alternating_media_buttons'];
?>

<section class="px4 <?php echo $this->blockConfiguration['alternating_media_padding'] == true ? 'py5' : '' ?> <?php echo $this->blockConfiguration['alternating_media_background_colour']; ?>"  <?php echo $this->getAttributeString() ?>>
    <div class="container">
        <div class="mxn3 md-flex <?php echo $this->blockConfiguration['alternating_media_image_position'] == 'left' ? '' : 'flex-row-reverse' ?> ">
            <div class="col-12 px3 min-height-100">
                <div class="bg-cover bg-center height-100 img-rounded" style="background-image:url('<?php echo $this->blockConfiguration['alternating_media_image']['sizes']['medium_large']; ?>');">
                    <div class="ratio-4-3"></div>
                </div>
            </div>
            <div class="col-12 px3">
                <div class="pt4 md-p4 md-py5 wysiwyg">
                    <?php echo $this->blockConfiguration['alternating_media_content'];?>
                    <?php if ($buttons):?>
                    <div class="mxn1">
                        <?php foreach ($buttons as $button): ?>
                        <a href="<?php echo $button['button']['url'];?>" class="btn text-decoration-none btn-primary white bg-primary mx1">
                            <?php echo $button['button']['title'];?>
                            <?php if (!empty($button['icon'])) : ?>
                                <span class="h5 ml2"><?php echo $button['icon'];?></span>
                            <?php endif; ?>
                        </a>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
