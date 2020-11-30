<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5 lg-mx0" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">
        <div class="flex items-center justify-center">
            <h2><?php echo $this->title ?></h2>
        </div>
        <?php if (!is_array($this->taxonomyTerms) && get_class($this->taxonomyTerms) === WP_Error::class) : ?>

            <p><?php echo 'An error occurred: "' . $this->taxonomy . '" is not a valid taxonomy.' ?></p>

        <?php else : ?>
            <?php foreach ($this->taxonomyTerms as $term) : ?>
                <?php $icon = get_field('partner_sector_icon', $term) ?>

                <div class="col col-12 md-col-3 p2 mb3" data-mh="category-panel">
                    <div class="rounded overflow-hidden box-shadow">
                        <div class="px3 pt3 bg-white">
                            <div class="flex items-center justify-center mb3" data-mh="category-inner">
                                <?php if ($icon) : ?><img src="<?php echo $icon['sizes']['thumbnail']; ?>" /><?php endif; ?>
                            </div>
                            <p class="bold light-blue text-center"><?php echo $term->name; ?></p>
                        </div>
                        <div class="p3 bg-light-blue" data-mh="category-content">
                            <div class="wysiwyg white">
                                <?php if (!empty($term->description)) : ?>
                                    <?php echo $term->description; ?>
                                <?php else : ?>
                                    <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit eiusmod tempor incididunt dolor amet dolor sit amet, consec tetur adipiscing elit.</p>
                                <?php endif; ?>
                            </div>
                            <div class="post-button-wrapper mt4">
                                <a href="<?php echo get_term_link($term); ?>" class="post-button width-100">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="clearfix mx-auto text-center mt4">
                <?php if ($this->withSearch) : ?>
                    <?php $cptPermalink = get_post_type_archive_link($this->postType); ?>
                    <div data-element="buttons">
                        <a class="btn text-decoration-none btn-primary white bg-primary mx1" href="<?php echo $cptPermalink ?>" data-element="button">
                            <span><i class="far fa-search"></i></span>
                            <span><?php echo 'View All ' . ucwords($this->pluralisation) ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>