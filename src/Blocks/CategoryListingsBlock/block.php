<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5 lg-mx0" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="clearfix relative container">

        <h2 class="block-categories-title"><?php echo $this->title ?></h2>

        <?php if (!is_array($this->taxonomyTerms) && get_class($this->taxonomyTerms) === WP_Error::class) : ?>

            <p class="block-categories-error « text-center h3 bold py5 px5 bg-smoke"><?php echo 'An error occurred: "' . $this->taxonomy . '" is not a valid taxonomy.' ?></p>

        <?php else : ?>
            <div class="mxn2">
                <?php foreach ($this->taxonomyTerms as $term) : ?>
                    <?php $icon = get_field('term_icon', $term) ?>
                    <div class="block-categories-pod « col col-4 md-col-2">
                        <a href="<?php echo get_term_link($term->name, $this->taxonomy) ?>" class="block-categories-link" data-mh="pod-height" <?php echo (!empty(get_field('partner_sector_associated_image', $term))) ? "style='background-image: url(" . get_field('partner_sector_associated_image', $term)['url'] . ");'" : ""; ?>>

                            <?php if (!empty(get_field('partner_sector_icon', $term))) : ?>
                                <div class="block-categories-icon-wrapper" data-mh="pod-height-icon">
                                    <span class="block-categories-icon">
                                        <img src="<?php echo get_field('partner_sector_icon', $term)['url']; ?>" alt="<?php echo get_field('partner_sector_icon', $term)['alt']; ?>">
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div class="block-categories-name-wrapper" data-mh="pod-height-title">
                                <p class="block-categories-name"><?php echo $term->name; ?></p>
                            </div>
                            <p class="block-categories-count"><?php echo $term->count . ' ' . $this->pluralisation; ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>

                <?php if ($this->withSearch) : ?>
                    <?php $cptPermalink = get_post_type_archive_link($this->postType); ?>
                    <div class="block-categories-pod block-categories-pod-search « col col-4 md-col-2">
                        <a href="<?php echo $cptPermalink ?>" class="block-categories-link" data-mh="pod-height">
                            <div class="block-categories-icon-wrapper">
                                <span class="block-categories-icon"><i class="fas fa-search"></i></span>
                            </div>
                            <div class="block-categories-name-wrapper">
                                <p class="block-categories-name"><?php echo 'View All ' . ucwords($this->pluralisation) ?></p>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif; ?>
    </div>

</section>