<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Title : $this->blockConfiguration['faq_title']; - Text
Introduction: $this->blockConfiguration['faq_introduction']; - WYSIWYG
FAQs: $this->blockConfiguration['faq_faqs']; - Repeater
    Each FAQ contains:
        faq_faqs_question - WYSIWYG
        faq_faqs_answer - WYSIWYG
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$backgroundPosition = "";
if (isset($this->blockConfiguration['banner_background_image_position']) && !empty($this->blockConfiguration['banner_background_image_position']))
    $backgroundPosition = $this->blockConfiguration['banner_background_image_position'];

$backgroundImage = "";
if (isset($this->blockConfiguration['banner_background_image']) && !empty($this->blockConfiguration['banner_background_image']))
    $backgroundImage = "style='background-image: url(" . $this->blockConfiguration['banner_background_image']['url'] . "); background-size: cover;'";

?>

<section class="px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?> <?php echo $backgroundPosition; ?> bg-cover height-100 zoom" <?php echo $this->getAttributeString() ?> <?php echo $backgroundImage; ?> data-aos="fade-in">
    <div class="container clearfix relative flex flex-column <?php echo $this->blockConfiguration['faq_alignment']; ?>">

        <div class="col col-12 md-<?php echo $this->blockConfiguration['faq_width']; ?>">

            <?php if (!empty($this->blockConfiguration['faq_title'])): ?>
                <h2 class="flex justify-center md-justify-start"><?php echo $this->blockConfiguration['faq_title']; ?></h2>
            <?php endif; ?>
            <?php if (!empty($this->blockConfiguration['faq_introduction'])): ?>
                <div class="wysiwyg text-center lg-max-width-50 mx-auto mb5">
                    <?php echo $this->blockConfiguration['faq_introduction']; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($this->blockConfiguration['faq_faqs'])) : ?>
                <div class="accordion mt-6">

                    <?php foreach ($this->blockConfiguration['faq_faqs'] as $key => $row) : ?>
                        <div data-accordion-collection="<?= get_the_id() ?>" data-accordion-active="<?php echo $key != 0 ? 'display: false;' : 'true'; ?>" class="w-100 py-3 cursor-pointer <?php echo $key != 0 ? '' : 'toggle-open'; ?>">

                            <div class="acc-head">
                                <label for="" class="h4">
                                    <?php echo $row['faq_faqs_question']; ?>
                                </label>
                                <div class="acc-indicator plus">
                                    <span class="h"></span>
                                    <span class="v"></span>
                                </div>
                            </div>
                            <div class="acc-body text-left" style="<?php echo $key != 0 ? 'display: none;' : ''; ?>">

                                <div class="body-content clearfix">

                                    <?php if(isset($row['faq_faqs_content_type']) && !empty($row['faq_faqs_content_type'])):?>
                                        <?php if($row['faq_faqs_content_type'] == "standard"): ?>
                                            <?php echo $row['faq_faqs_answer']; ?>
                                        <?php else: ?>
                                            <?php include(__DIR__ . "/partials/_table-content.php") ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php echo $row['faq_faqs_answer']; ?>
                                    <?php endif; ?>
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