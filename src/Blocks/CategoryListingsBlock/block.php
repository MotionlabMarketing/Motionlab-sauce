<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5 lg-mx0" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div>
        <h2><?php echo $this->title ?></h2>
        <?php if(!is_array($this->taxonomyTerms) && get_class($this->taxonomyTerms) === WP_Error::class): ?>

            <p><?php echo 'An error occurred: "' . $this->taxonomy . '" is not a valid taxonomy.'?></p>

        <?php else: ?>

            <?php foreach($this->taxonomyTerms as $term): ?>
                <?php $icon = get_field('term_icon', $term) ?>
                <div>
                    <a href="<?php get_term_link($term->name, $this->taxonomy) ?>">
                        <?php if($icon): ?><span>$icon</span><?php endif; ?>
                        <span><?php echo $term->name; ?></span>
                        <span><?php echo $term->count . ' ' . $this->pluralisation ; ?></span>
                    </a>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</section>
