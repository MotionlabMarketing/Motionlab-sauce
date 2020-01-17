<?php

use \Motionlab\Sauce\PageTemplates\Testimonials\TestimonialsTemplate;

$templateController = new TestimonialsTemplate();
$blocks = $templateController->getBlocks(get_the_id());
get_header();


?>

<div class="content-wrap">
    <?php $templateController->renderFlexibleContent(get_the_id()); ?>

    <section class="px4 py5 bg-white">

        <div class="container">

            <div class="md-col-9 mx-auto mtn4">
                <?php foreach($templateController->getTestimonials() as $testimonial): ?>
                    <div class="col-12 p3 rounded overflow-hidden shadow mt4">
                        <div class="mb3">
                            <?php for($i = 0; $i < $testimonial['star_rating']; $i++) :?>
                                <i class="fa fa-star dark-purple"></i>
                            <?php endfor; ?>
                        </div>
                        <h3 class="lh2 bold"><?php echo $testimonial['title']; ?></h3>
                        <div class=""><?php echo strip_empty_tags($testimonial['content']);?></div>
                        <p class="bold dark-purple mb0"><?php echo $testimonial['reviewer']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section>

</div>

<?php
get_footer();
