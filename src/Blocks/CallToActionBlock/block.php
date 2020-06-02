<?php $this->setCallToAction($this->blockConfiguration['call_to_action']); ?>
<section class="footer-installer <?php echo $this->callToAction['background_colour'] ? $this->callToAction['background_colour']  : ''; ?> mb4" <?php echo $this->getAttributeString() ?>>

    <div class="content wysiwyg mx-auto relative <?php echo $this->callToAction['cta_bordered_content'] ? 'border border-lighten-10 cta-bordered' : ''; ?>">
        <img src="<?php echo $this->callToAction['cta_image']['sizes']['medium']; ?>" />

        <?php echo $this->callToAction['cta_content'] ?>

        <div data-element="buttons" data-button-alignment="<?php echo $this->callToAction['cta_button_alignment']; ?>">
            <?php
            if (!empty($this->callToAction['cta_buttons'])) :
                foreach ($this->callToAction['cta_buttons'] as $index => $button) : ?>

                    <a data-element="button" data-button-style="<?php echo $button['button_type']; ?>" href="<?php echo $button['button']['url']; ?>">
                        <?php echo $button['button']['title']; ?>
                        <?php if (!empty($button['icon'])) : ?>
                            <span class="h5 ml2"><?php echo $button['icon']; ?></span>
                        <?php endif; ?>
                    </a>

                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>