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

<section class="clearfix overflow-hidden" <?php echo $this->getAttributeString() ?> data-aos="fade-in">


    <div class="banner-slider">
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
    </div>

    <script>
        jQuery(document).ready(function($) {
            $('.banner-slider').slick({
                dots: true,
                arrows: true,
                // autoplay: true,
                // autoplaySpeed: 6000,
                prevArrow: '<span class="slick-prev prev fal fa-chevron-left"></span>',
                nextArrow: '<span class="slick-next next fal fa-chevron-right"></span>',
                mobileFirst: true,
                slidesToShow: 1,
                cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)'
            });
        });
    </script>
</section>