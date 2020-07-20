<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
// Button Link: $this->blockConfiguration['button_link'];
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="<?php echo $this->blockConfiguration['button_full_width'] == True ? '' : 'px4' ?> py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="<?php echo $this->blockConfiguration['button_full_width'] == True ? '' : 'container' ?>">

        <div class="<?php echo $this->blockConfiguration['button_enable_gaps'] == True ? 'mxn2' : '' ?> md-flex flex-wrap justify-center">

            <?php foreach ($this->blockConfiguration['button_button'] as $button) : ?>

                <div class="<?php echo $this->blockConfiguration['button_enable_gaps'] == True ? 'px2 md-mb3' : '' ?> <?php echo $this->blockConfiguration['button_odd_even'] == True ? 'col-12 md-col-4' : 'col-12 md-col-6' ?> ">
                    <a href="<?php echo $button['button_link']['url']; ?>" class="block bg-grey relative flex overflow-hidden hover-zoom hover-reveal" style="min-height:20rem;">
                        <div class="p3 flex items-end width-100">
                            <div class="absolute top-0 left-0 width-100 height-100 bg-darken-2 z1"></div>
                            <div class="absolute top-0 left-0 width-100 height-100 bg-darken-3 z1 reveal"></div>
                            <div class="absolute top-0 left-0 width-100 height-100 bg-cover bg-center zoom" style="background-image:url('<?php echo $button['button_image']['url']; ?>);"></div>
                            <div class="relative z2 flex space-between items-center width-100">
                                <span class="h3 bold white width-100"><?php echo $button['button_title']; ?></span>
                                <i class="fa fa-chevron-right white"></i>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>