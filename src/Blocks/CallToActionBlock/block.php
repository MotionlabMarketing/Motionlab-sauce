
<?php
    $featuredImageUrl = get_the_post_thumbnail_url($this->blockConfiguration['call_to_action'], 'large');
?>

<section class="relative bg-cover bg-center py4 px4" style="background-image: url('<?php echo $featuredImageUrl; ?>');" data-element="download-booklet" <?php echo $this->getAttributeString() ?>>
    <div class="absolute top-0 left-0 right-0 bottom-0 bg-overlay width-100 height-100 z1"></div>

    <div class="container relative white py6 z2">
        <div class="lg-col-8">

            <h5 class="h2 mb2"><?php echo $this->callToAction['title'] ?></h5>
            <div class="wysiwyg"><?php echo $this->callToAction['description'] ?></div>

            <?php if($this->callToAction['type'] === 'form'): ?>
                <div class="pt5 pb3">
                    <?php
                    // LOAD FORM INTO THE PAGE.
                    if ( class_exists( 'Ninja_Forms' ) ) {
                        Ninja_Forms()->display(  $this->callToAction['form']['id']  );
                    }
                    ?>
                </div>
            <?php endif; ?>

            <p class="mb0 uppercase h6"><a href="<?php echo $this->callToAction['privacy_policy']; ?>" class="white hover-black">Our Privacy Policy</a></p>

        </div>
    </div>
</section>