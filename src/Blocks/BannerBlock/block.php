<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
// Full Width: $this->blockConfiguration['banner_full_width'];
// Background Height: $this->blockConfiguration['banner_height'];
// Background Image: $this->blockConfiguration['banner_background_image'];
// Background Image Positino: $this->blockConfiguration['banner_background_position'];
// Background Overlay: $this->blockConfiguration['banner_overlay_colour'];
// Background Overlay Opacity: $this->blockConfiguration['banner_overlay_opacity'];
// Content : $this->blockConfiguration['banner_content'];
// Content HTML : $this->blockConfiguration['banner_content_html'];
// Content Position : $this->blockConfiguration['banner_content_alignment'];
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/


$banners = $this->blockConfiguration['banner_banners'];

?>

<section class="clearfix overflow-hidden banner-slider <?php echo $this->blockConfiguration['banner_height']; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">


    <?php foreach ($banners as $key => $banner) : ?>

        <?php
        $layout = $banner['banner_layout_style'];

        switch ($layout) {
            case "feature-image":
                include('parts/layout-featured.php');
                break;
            case "standard":
                include('parts/layout-standard.php');
                break;
            default:
                include('parts/layout-standard.php');
        }
        ?>

    <?php endforeach; ?>

</section>

<section class="lg-hide js-hero-slider bg-light-grey banner-content-mobile">
    <?php foreach ($banners as $banner) : ?>
        <div class="p4 py6">
            <div class="container js-match-height-alt">
                <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', str_replace("h1", "h2", $banner['banner_content'])); ?>
                <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $banner['banner_content_html']); ?>
                <?php if ($banner['banner_buttons']) : ?>
                    <div class="mxn1">
                        <?php foreach ($banner['banner_buttons'] as $button) : ?>
                            <a href="<?php echo $button['button']['url']; ?>" class="btn btn-primary white bg-primary mx1">
                                <?php echo $button['button']['title']; ?>
                                <span class="h5 ml2"><?php echo $button['icon'] ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<script>
    jQuery(document).ready(function($) {
        $('.banner-slider').slick({
            arrows: true,
            // autoplay: true,
            // autoplaySpeed: 4000,
            dots: true,
            prevArrow: '<span class="slick-prev prev fal fa-chevron-left"></span>',
            nextArrow: '<span class="slick-next next fal fa-chevron-right"></span>',
            mobileFirst: true,
            slidesToShow: 1,
            cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)'
        });
    });
</script>
