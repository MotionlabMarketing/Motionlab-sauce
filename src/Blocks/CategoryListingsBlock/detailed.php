<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> clearfix px4 py5 lg-mx0" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">
        <div class="flex items-center justify-center">
            <?php if (!empty(trim($this->title))): ?>
                <h2><?php echo $this->title ?></h2>
            <?php endif; ?>
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
                            <p class="bold light-blue text-center" data-mh="partner-title"><?php echo $term->name; ?></p>
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

                                <?php
                                $cptPermalink = get_post_type_archive_link($this->postType);
                                $cptAssociatedPage = get_field('partner_sector_associated_page', $term);
                                $outputLink = $cptPermalink;
                                if(isset($cptAssociatedPage) && $cptAssociatedPage !== "") :
                                    $outputLink = $cptAssociatedPage;
                                endif;
                                ?>

                                <a href="<?php echo $outputLink; ?>" class="post-button width-100">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>