<section class="relative bg-cover bg-center py4 px4" style="background-image: url('http://local.sashwindows.d3z.uk/app/uploads/2020/01/steinar-engeland-hmIFzdQ6U5k-unsplash.jpg');" data-element="download-booklet" <?php echo $this->getAttributeString() ?>>
    <div class="absolute top-0 left-0 right-0 bottom-0 bg-overlay width-100 height-100 z1"></div>

    <div class="container relative white py6 z2">
        <div class="lg-col-8">

            <h5 class="h2 mb2"><?php echo $this->callToAction['title'] ?></h5>
            <p class="mb0"><?php echo $this->callToAction['description'] ?></p>

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

            <p class="mb0 uppercase h6"><a href="#" class="white hover-black">Our Privacy Policy</a></p>

        </div>
    </div>
</section>