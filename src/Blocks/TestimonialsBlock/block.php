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

<section class="bg-light-grey py5" <?php echo $this->getAttributeString() ?>>
    <div class="js-testimonial-carousel pb4">

        <?php foreach ($testimonials as $testimonial) : ?>
            <article class="bg-white col-12 mx3 rounded overflow-hidden shadow mb4 md-mb0">
                <div class="js-match-height p4 text-center flex items-center justify-center flex-column">
                    <h3 class="lh2 bold"><?php echo $testimonial['title']; ?></h3>
                    <div class=""><?php echo strip_empty_tags($testimonial['content']);?></div>
                    <p class="bold dark-purple mb0"><?php echo $testimonial['reviewer']; ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
