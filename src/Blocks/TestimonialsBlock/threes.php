<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Full Size: $this->blockConfiguration['testimonials_full_size']
Content: $this->blockConfiguration['testimonials_content']
Display Type: $this->blockConfiguration['testimonials_posts_to_display']
Selected Posts (only if display type is not latest): $this->blockConfiguration['testimonials_selected']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$testimonials = $this->getTestimonials();
//$this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey';
?>

<section class="bg-white py5" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="container clearfix">

        <?php if (!empty($this->blockConfiguration['testimonials_content'])) : ?>
            <div class="wysiwyg" data-element="content-area">
                <?php echo $this->blockConfiguration['testimonials_content']; ?>
            </div>
        <?php endif; ?>

        <div class="js-testimonial-carousel-new pb4">

            <?php
            $i = 1;
            $numTestimonials = count($testimonials);
            ?>

            <?php foreach ($testimonials as $testimonial) : ?>
                    <article class="col col-12 md-col-4 p4">
                        <?php echo strip_empty_tags($testimonial['content']); ?>
                    </article>
            <?php endforeach; ?>

        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('.js-testimonial-carousel-new').slick({
                centerMode: false,
                arrows: false,
                infinite: false,
                dots: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
        });
    </script>
</section>