<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Title : $this->blockConfiguration['faq_title']; - Text
Introduction: $this->blockConfiguration['faq_introduction']; - WYSIWYG
FAQs: $this->blockConfiguration['faq_faqs']; - Repeater
    Each FAQ contains:
        faq_faqs_question - WYSIWYG
        faq_faqs_answer - WYSIWYG
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; echo " " . $this->blockConfiguration['banner_background_image_position'] . " "; ?> <?php echo $this->blockConfiguration['banner_background_image_position']; ?> bg-cover height-100 zoom" <?php echo $this->getAttributeString() ?> style="background-image:url('<?php echo $this->blockConfiguration['banner_background_image']['url']; ?>')" data-aos="fade-in">
    <div class="container clearfix relative flex flex-column <?php echo $this->blockConfiguration['faq_alignment'];?>">

        <div class="col <?php echo $this->blockConfiguration['faq_width']; ?>">

            <h2><?php echo $this->blockConfiguration['faq_title']; ?></h2>
            <div class="wysiwyg text-center lg-max-width-50 mx-auto mb5">
                <?php echo $this->blockConfiguration['faq_introduction']; ?>
            </div>

            <?php foreach ((array) $this->blockConfiguration['faq_faqs'] as $item) : ?>

                <div class="" data-accordion data-accordion-collection="<?php echo $this->getBlockPositionID(); ?>" data-accordion-status="closed">
                    <div class="acc-head">
                        <label for="" class="bold h4">
                            <?php echo $item['faq_faqs_question']; ?>
                        </label>
                        <div class="acc-indicator">
                            <span class="h"></span>
                            <span class="v"></span>
                        </div>
                    </div>

                    <div class="acc-body">

                        <?php echo $item['faq_faqs_answer']; ?>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

</section>