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

<section class="bg-light-grey py5" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="container clearfix">
        <div class="js-testimonial-carousel-new pb4">

            <?php
            $i = 1;
            $numTestimonials = count($testimonials);
            ?>

            <?php foreach ($testimonials as $testimonial) : ?>
                <?php if(($i + 2) % 3 == 0): ?>
                    <div>
                <?php endif; ?>
                <article class="col col-12 md-col-4 p4">
                    <?php echo strip_empty_tags($testimonial['content']); ?>
                </article>
                <?php if(($i) % 3 == 0 || $i == $numTestimonials): ?>
                    </div>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function($) {
        $('.js-testimonial-carousel-new').slick({
            centerMode: true,
            arrows: false,
            infinite: true,
            dots: true,
            slidesToShow: 1
        });
    });
</script>