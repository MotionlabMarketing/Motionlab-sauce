<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
    // Background Color: $this->blockConfiguration['background_colour'];
    // Form Title: $this->blockConfiguration['form_title'];
    // Form Sub-Title: $this->blockConfiguration['form_subtitle'];
    // Form : $this->blockConfiguration['form_form'];
    // Footer Message : $this->blockConfiguration['form_footer_message'];
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5" <?php echo $this->getAttributeString() ?>>
    <div class="container text-center">
        <h2 class="h1 dark-purple"><?php echo $this->blockConfiguration['form_title'];?></h2>
        <p><?php echo $this->blockConfiguration['form_subtitle']; ?></p>
        <div class="mx-auto" style="max-width:60rem;">
            <?php
                // LOAD FORM INTO THE PAGE.
                if ( class_exists( 'Ninja_Forms' ) ) {
                    Ninja_Forms()->display( $this->blockConfiguration['form_form']['id'] );
                }
            ?>
        </div>
    </div>
</section>
