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

<section class="px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : '';
                        echo " " . $this->blockConfiguration['banner_background_image_position'] . " "; ?> <?php echo $this->blockConfiguration['banner_background_image_position']; ?> bg-cover height-100 zoom" <?php echo $this->getAttributeString() ?> style="background-image:url('<?php echo $this->blockConfiguration['banner_background_image']['url']; ?>')" data-aos="fade-in">
    <div class="container clearfix relative flex flex-column <?php echo $this->blockConfiguration['faq_alignment']; ?>">

        <div class="col <?php echo $this->blockConfiguration['faq_width']; ?>">

            <h2><?php echo $this->blockConfiguration['faq_title']; ?></h2>
            <div class="wysiwyg text-center lg-max-width-50 mx-auto mb5">
                <?php echo $this->blockConfiguration['faq_introduction']; ?>
            </div>

            <?php if (!empty($this->blockConfiguration['faq_faqs'])) : ?>
                <div class="accordion mt-6">

                    <?php foreach ($this->blockConfiguration['faq_faqs'] as $key => $row) : ?>
                        <div data-accordion-collection="<?= get_the_id() ?>" data-accordion-active="false" class="w-100 py-3 cursor-pointer">

                            <div class="acc-head">
                                <label for="" class="h4">
                                    <?php echo $row['faq_faqs_question']; ?>
                                </label>
                                <div class="acc-indicator plus">
                                    <span class="h"></span>
                                    <span class="v"></span>
                                </div>
                            </div>
                            <div class="acc-body text-left" style="display: none;">

                                <div class="body-content">
                                    <?php echo $row['faq_faqs_answer']; ?>
                                </div>

                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

            <?php if(isset($this->blockConfiguration['faq_footer_button']) && !empty($this->blockConfiguration['faq_footer_button']['url'])) : ?>
                <div class="faq-button-wrapper">
                    <a href="<?php echo $this->blockConfiguration['faq_footer_button']['url']; ?>" class="faq-button btn" target="<?php echo $this->blockConfiguration['faq_footer_button']['target']; ?>"><?php echo $this->blockConfiguration['faq_footer_button']['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>

</section>