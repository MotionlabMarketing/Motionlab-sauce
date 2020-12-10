<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5 lg-mx0" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">
        <div class="flex justify-center">
            <h2><?php echo $this->title ?></h2>
        </div>
        <?php if(!is_array($this->taxonomyTerms) && get_class($this->taxonomyTerms) === WP_Error::class): ?>

            <p><?php echo 'An error occurred: "' . $this->taxonomy . '" is not a valid taxonomy.'?></p>

        <?php else: ?>
            <div class="owl-carousel owl-theme carousel-<?php echo $this->getBlockPositionID(); ?>">
                <?php foreach($this->taxonomyTerms as $term): ?>

                    <?php
                    $cptPermalink = get_category_link($term);
                    $cptAssociatedPage = get_field('partner_sector_associated_page', $term);
                    $outputLink = $cptPermalink;
                    if(isset($cptAssociatedPage) && $cptAssociatedPage !== "") :
                        $outputLink = $cptAssociatedPage;
                    endif;
                    ?>

                    <?php $icon = get_field('partner_sector_icon', $term) ?>
                    <div class="content" data-mh="category-panel">
                        <a href="<?php echo $outputLink; ?>">
                            <div data-mh="category-inner">
                                <?php if($icon): ?><img src="<?php echo $icon['sizes']['thumbnail']; ?>" /><?php endif; ?>
                            </div>
                            <p><?php echo $term->name; ?></p>
                            <?php /*<span><?php echo $term->count . ' ' . $this->pluralisation ; ?></span>*/ ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mx-auto text-center mt4">
                <?php if($this->withSearch): ?>
                    <?php
                        $cptPermalink = get_post_type_archive_link($this->postType);
                        if ($button_link = get_field('button_link')) {
                            $cptPermalink = $button_link;
                        }
                        $cptAssociatedPage = get_field('partner_sector_associated_page');
                        $outputLink = $cptPermalink;
                        if(isset($cptAssociatedPage) && $cptAssociatedPage !== "") :
                            $outputLink = $cptAssociatedPage;
                        endif;
                    ?>
                    <div data-element="buttons">
                        <a class="btn text-decoration-none btn-primary white bg-primary mx1" href="<?php echo $outputLink ?>" data-element="button">
                            <span><i class="far fa-search"></i></span>
                            <span><?php echo 'View All ' . ucwords($this->pluralisation) ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    jQuery(document).ready(function($) {

        let carouselCount = $(".carousel-<?php echo $this->getBlockPositionID(); ?> > div").length;

        $(".carousel-<?php echo $this->getBlockPositionID(); ?>").owlCarousel({
            nav: false,
            margin: 25,
            slideBy: 1,
            loop: false,
            responsive: {
                0: {
                    items: 1
                },
                1200: {
                    items: carouselCount < 4 ? carouselCount : 4
                },
            }
        });
    });
</script>
