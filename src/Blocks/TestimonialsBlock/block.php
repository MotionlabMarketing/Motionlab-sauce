<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Full Size: $this->blockConfiguration['testimonials_full_size']
Content: $this->blockConfiguration['testimonials_content']
Display Type: $this->blockConfiguration['testimonials_posts_to_display']
Selected Posts (only if display type is not latest): $this->blockConfiguration['testimonials_selected']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$testimonials = $this->getTestimonials();
?>

<section class="bg-white py5" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="container clearfix">
        
        <?php if (!empty($this->blockConfiguration['testimonials_content'])) : ?>
            <div class="wysiwyg" data-element="content-area">
                <?php echo $this->blockConfiguration['testimonials_content']; ?>
            </div>
        <?php endif; ?>

        <div class="js-testimonial-carousel-default « pb4">

            <?php foreach ($testimonials as $testimonial) : ?>
                <div>
                    <div class="flex items-center justify-center">
                        <article class="col-12 md-col-6 p4">
                            <?php echo strip_empty_tags($testimonial['content']); ?>
                        </article>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('.js-testimonial-carousel-default').slick({
                centerMode: true,
                arrows: false,
                infinite: true,
                dots: true,
                slidesToShow: 1
            });
        });
    </script>
</section>