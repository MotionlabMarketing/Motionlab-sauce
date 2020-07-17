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

<section class="px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="container clearfix relative">

        <h2><?php echo $this->blockConfiguration['faq_title']; ?></h2>
        <div class="wysiwyg text-center lg-max-width-50 mx-auto mb5">
            <?php echo $this->blockConfiguration['faq_introduction']; ?>
        </div>

        <?php foreach ((array) $this->blockConfiguration['faq_faqs'] as $item) : ?>

            <div data-accordion data-accordion-collection="<?php echo $this->getBlockPositionID(); ?>" data-accordion-status="closed">
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

</section>