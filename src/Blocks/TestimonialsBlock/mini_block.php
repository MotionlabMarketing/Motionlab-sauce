<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Full Size: $this->blockConfiguration['testimonials_full_size']
Content: $this->blockConfiguration['testimonials_content']
Display Type: $this->blockConfiguration['testimonials_posts_to_display']
Selected Posts (only if display type is not latest): $this->blockConfiguration['testimonials_selected']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$testimonials = $this->getTestimonials();

?>

<section class="bg-secondary" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <ul class="js-webticker">
        <?php foreach ($testimonials as $key => $testimonial) : ?>
            <li data-update="item<?php echo $key; ?>">
                <p class="white m0 h5 regular mx4">
                    <span class="mr2">
                        <?php for ($i = 0; $i < $testimonial['star_rating']; $i++) : ?>
                            <i class="fa fa-star"></i>
                        <?php endfor; ?>
                    </span>
                    <?php echo $testimonial['title'] . " - " . $testimonial['reviewer']; ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
</section>