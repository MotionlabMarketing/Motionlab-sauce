<?php $this->setCallToAction($this->blockConfiguration['call_to_action']); ?>
<section data-element="cta" data-boxed="<?php echo (isset($this->callToAction['cta_boxed_content'])) ? $this->callToAction['cta_boxed_content'] : false; ?>" data-type="<?php echo (isset($this->callToAction['cta_slimline']) ? $this->callToAction['cta_slimline'] : ""); ?>" class="relative <?php echo $this->callToAction['background_colour'] ? $this->callToAction['background_colour']  : ''; ?> <?php echo $this->callToAction['background_image_position']; ?> mb4" <?php echo $this->getAttributeString() ?> data-aos="fade-in" <?php echo ($this->callToAction['background_image']) ? "style='background-image: url(" . $this->callToAction['background_image']['url'] . "); background-size: cover;'" : ""; ?>>
    <?php if ($this->callToAction['background_colour']) : ?>
        <div class="absolute top-0 left-0 right-0 bottom-0 width-100 height-100 <?php echo $this->callToAction['overlay_opacity']; ?>" style="max-width: none;background-color: <?php echo $this->callToAction['overlay_colour']; ?>"></div>
    <?php endif; ?>

    <div class="content mx-auto relative z1 <?php echo $this->callToAction['cta_bordered_content'] ? 'bordered' : ''; ?>">
        <?php if (!empty($this->callToAction['cta_image']['sizes']['medium'])): ?>
            <img src="<?php echo $this->callToAction['cta_image']['sizes']['medium']; ?>" />
        <?php endif; ?>

        <div class="wysiwyg">
            <?php echo str_ireplace(array('<h1>', '</h1>'), array('<h2>', '</h2>'), $this->callToAction['cta_content']); ?>
        </div>

        <?php
        if (!empty($this->callToAction['cta_buttons'])) : ?>
            <div data-element="buttons" data-button-alignment="<?php echo $this->callToAction['cta_button_alignment']; ?>">
                <?php foreach ($this->callToAction['cta_buttons'] as $index => $button) : ?>

                    <a data-element="button" data-button-style="<?php echo $button['button_type']; ?>" href="<?php echo $button['button']['url']; ?>">
                        <?php echo $button['button']['title']; ?>
                        <?php if (!empty($button['icon'])) : ?>
                            <span class="h5 ml2"><?php echo $button['icon']; ?></span>
                        <?php endif; ?>
                    </a>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>
