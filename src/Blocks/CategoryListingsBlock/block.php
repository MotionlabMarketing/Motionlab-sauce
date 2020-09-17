<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5 lg-mx0" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">
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

            <?php if($this->withSearch): ?>
                <?php $taxonomy = get_taxonomy($this->taxonomy); ?>
                <div>
                    <a href="<?php $taxonomy->url ?>">
                        <span>Search Icon</span>
                        <span><?php echo 'View All ' . ucwords($this->pluralisation) ?></span>
                    </a>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>
</section>
