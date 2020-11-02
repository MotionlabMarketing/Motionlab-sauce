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
$uid = uniqid();
?>

<section class="clearfix overflow-hidden" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="<?php echo $this->blockConfiguration['banner_full_width'] == true ? '' : 'container ' ?>">
        <div class="banner-slider-<?php echo $uid;?>">
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
    </div>

    <?php if ($layout = $banner['banner_layout_style'] == "feature-image") : ?>
        <script>
            jQuery(document).ready(function($) {
                $('.banner-slider-<?php echo $uid;?>').slick({
                    dots: true,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    mobileFirst: true,
                    slidesToShow: 1,
                    cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)'
                });
            });
        </script>
    <?php else : ?>
        <script>
            jQuery(document).ready(function($) {
                $('.banner-slider-<?php echo $uid;?>').slick({
                    dots: false,
                    arrows: true,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    prevArrow: '<span data-slider-arrow="left"><i class="fal fa-chevron-left"></i></span>',
                    nextArrow: '<span data-slider-arrow="right"><i class="fal fa-chevron-right"></i></span>',
                    mobileFirst: true,
                    slidesToShow: 1,
                    cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)'
                });
            });
        </script>
    <?php endif; ?>
</section>