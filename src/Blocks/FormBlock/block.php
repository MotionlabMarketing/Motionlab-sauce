<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
// Background Color: $this->blockConfiguration['background_colour'];
// Form Title: $this->blockConfiguration['form_title'];
// Form Sub-Title: $this->blockConfiguration['form_subtitle'];
// Form : $this->blockConfiguration['form_form'];
// Footer Message : $this->blockConfiguration['form_footer_message'];
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container text-center">
        <?php if (!empty($this->blockConfiguration['form_title'])): ?>
            <div class="flex justify-center">
                <h2 class="h1 dark-purple mb2"><?php echo $this->blockConfiguration['form_title']; ?></h2>
            </div>
        <?php endif; ?>
        <?php if (!empty($this->blockConfiguration['form_subtitle'])): ?>
            <p class="mx-auto md-max-width-70 mt-2"><?php echo $this->blockConfiguration['form_subtitle']; ?></p>
        <?php endif; ?>
        <div class="mx-auto" style="max-width:60rem;">
            <?php
            // LOAD FORM INTO THE PAGE.
            if (class_exists('Ninja_Forms')) {
                Ninja_Forms()->display($this->blockConfiguration['form_form']['id']);
            }
            ?>
        </div>
    </div>
</section>