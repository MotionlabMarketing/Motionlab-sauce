<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
// Background Color: $this->blockConfiguration['background_colour'];
// Display Type: $this->blockConfiguration['blog_display_type'];
// Selected Posts: $this->blockConfiguration['blog_selected'];
// Content: $this->blockConfiguration['blog_content'];
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<?php if (!empty($this->posts)): ?>
<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5 lg-mx0"  <?php echo $this->getAttributeString() ?>>

    <div class="container">

        <h2 class="text-center h1"><?php echo $this->blockConfiguration['blog_title'] ?></h2>

        <div class="mxn3 js-article-slider">
            <?php foreach ($this->posts as $p): ?>
                <article class="col col-4 px3">
                    <a href="<?php echo get_the_permalink($p->ID); ?>" class="block hover-zoom overflow-hidden">
                        <img src="<?php echo $p->featuredImage; ?>" alt="" class="zoom block">
                    </a>

                    <div class="mtn7 bg-white relative z3 py5 pr5 js-match-height" style="max-width:80%;">

                        <a href="<?php echo get_the_permalink($p->ID); ?>" class="block black hover-primary">
                            <h2 class="h3 bold"><?php echo get_the_title($p->ID)?></h2>
                        </a>
                        <?php $excerpt = get_the_excerpt($p->ID); ?>
                        <p class="lh3 h5 mt0 ml0 mr0"><?php echo wp_trim_words( $excerpt, 22, '...' ); ?></p>
                    </div>
                    <a href="<?php echo get_the_permalink($p->ID); ?>" class="btn btn-secondary hover-bg-primary">Read More</a>
                </article>
            <?php endforeach; ?>
        </div>
        <?php if (!empty($this->blockConfiguration['blog_footer_button']['url'])) : ?>
        <div class="text-center mt5">
            <a href="<?php echo $this->blockConfiguration['blog_footer_button']['url']; ?>" class="btn btn-secondary h4"><?php echo $this->blockConfiguration['blog_footer_button']['title']; ?></a>
        </div>
        <?php endif; ?>
    </div>

</section>
<?php endif; ?>
