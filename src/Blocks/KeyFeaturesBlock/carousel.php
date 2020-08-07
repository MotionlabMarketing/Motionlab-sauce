<section class="clearfix px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container">
        <?php if (!empty($this->blockConfiguration['features_title'])) : ?>
            <h2 class="h1 text-center mb5"><?php echo $this->blockConfiguration['features_title']; ?></h2>
        <?php endif; ?>

        <div class="owl-carousel owl-theme carousel-<?php echo $this->getBlockPositionID(); ?>">
            <?php foreach ($this->blockConfiguration['features_feature'] as $feature) : ?>
                <div class="js-match-height bg-white p4 mb4 col-12 md-col-4 text-center width-100" style="border: .5rem solid #f2f2f2;" data-animation="zoom">
                    <div class="flex items-center justify-center mb4" data-mh="icon-height" style="">
                        <?php if ($feature['icon_type'] === 'custom') : ?>
                            <?php
                            if ($feature['icon_image']['subtype'] == "svg+xml") : ?>
                                <div data-element="svg-icon" style="max-height: 64px; max-width: 64px;">
                                    <?php echo file_get_contents(get_attached_file($feature['icon_image']['id'])); ?>
                                </div>
                            <?php else : ?>
                                <img src="<?php echo $feature['icon_image']['sizes']['medium']; ?>" alt="<?php echo $feature['icon_image']['alt']; ?>" style="max-height: 15rem;min-height: 15rem;">
                            <?php endif; ?>
                        <?php else : ?>
                            <span class="black h00 mb4"><?php echo $feature['feature_icon']; ?></span>
                        <?php endif; ?>
                    </div>

                    <p class="h4 black serif uppercase"><?php echo $feature['feature_title']; ?></p>

                    <div class="mx-auto px4" data-mh="keyFeatures-content">
                        <?php echo $feature['feature_content']; ?>
                    </div>

                    <?php if ($feature['feature_url'] && $feature['feature_url']['url'] != "") : ?>
                        <div>
                            <a href="<?php echo $feature['feature_url']['url']; ?>" class="btn mt4 border border-grey grey mx1 uppercase"><?php echo $feature['feature_url']['title']; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<script>
    jQuery(document).ready(function($) {

        let carouselCount = $(".carousel-<?php echo $this->getBlockPositionID(); ?> > div").length;

        $(".carousel-<?php echo $this->getBlockPositionID(); ?>").owlCarousel({
            nav: true,
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