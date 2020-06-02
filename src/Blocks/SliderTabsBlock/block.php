<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
    Full Width: $this->blockConfiguration["full_width"]
    Slides: $this->blockConfiguration["slider_and_tabs_slides"]
    Each Slide includes:
        Title: $slide['slide_title']
        Background Image: $slide['slide_background_image']
        Content: $slide['slide_content']
        CTAs: $slide['slide_cta_panel'] (max 2)
            Each CTA includes:
                Title: $cta['cta_panel_title']
                Content: $cta['cta_panel_content']
                Icon: $cta['cta_panel_icon']
        Content Overlay: $slide["slide_content_oveylay"]
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
$row_index = get_row_index();
?>

<section class="slider-tabs-block bg-light-grey <?php echo ($this->blockConfiguration["full_width"]) ? "":"container"; ?>" data-block-name="slider-tabs-block" <?php echo $this->getAttributeString() ?>>

    <?php if (count($this->blockConfiguration["slider_and_tabs_slides"]) > 1): ?>
        <div class="" data-element="slider-tabs-block-<?php echo $row_index; ?>">
    <?php endif ;?>

        <?php if (count($this->blockConfiguration["slider_and_tabs_slides"]) > 0): ?>
            <?php foreach ($this->blockConfiguration["slider_and_tabs_slides"] as $key => $value) : ?>

                    <div class="bg-light-grey">

                        <div class="relative px4 py5 lg-min-height-v50 flex items-center justify-center" data-mh="slider-tab-slides" style="display: flex !important; min-height: 50vh;">

                            <div class="absolute top-0 left-0 width-100 height-100 z1 bg-cover xl-show <?php echo $this->blockConfiguration['slider_tabs_height']; ?>" style="background-image:url('<?php echo $value['slide_background_image']['sizes']['banner']; ?>'); background-position: 100% 50%;"></div>
                            <div class="absolute top-0 left-0 width-100 height-100 z1 bg-cover xl-hide <?php echo $this->blockConfiguration['slider_tabs_height']; ?>" style="background-image:url('<?php echo $value['slide_background_image']['sizes']['banner']; ?>'); background-position: 60% 100%;"></div>

                            <div class="container width-100 flex md-block items-center">
                                <div class="col-9 lg-col-6 relative z3" <?php echo ($value["slide_content_oveylay"])? 'style="background-color:rgba(255,255,255,0.5);"':''; ?>>

                                    <h2 class="h2 md-h1 dark-purple"><?php echo $value['slide_title']; ?></h2>
                                    <div class="content wysiwyg mb4" <?php echo ($value["slide_content_oveylay"])? 'style="color:rgb(58, 58, 58);"':''; ?>>
                                        <?php echo $value['slide_content']; ?>
                                    </div>


                                    <?php if (count($value['slide_cta_panel']) > 0) : ?>
                                    <div class="clearfix slider-banner-links mxn3">
                                        <?php foreach ($value['slide_cta_panel'] as $key => $cta) :
                                            $ctaUrl = ""; $ctaTitle = "";
                                            if ($cta['cta_panel_link']) {
                                                $ctaUrl = $cta['cta_panel_link']['url'];
                                                $ctaTitle = $cta['cta_panel_link']['title'];
                                            }
                                            ?>
                                            <div class="col col-12 lg-col-6 <?php echo ($key === 0) ? "md-mb0":""; ?>">
                                                <a href="<?php echo $ctaUrl; ?>" title="<?php echo $ctaTitle; ?>" class="block hover-bg-white p2 md-p3 rounded">
                                                    <div class="flex items-center">
                                                        <h3 class="mb0 md-mb2 h4 md-h3 hover-black flex items-center dark-purple"><?php echo $cta['cta_panel_title']; ?></h3>
                                                        <i class="ml2 mt1 fas fa-arrow-alt-circle-right dark-purple" aria-hidden="true"></i></div>
                                                    <p class="cta-content block h5 mb0"><?php echo $cta['cta_panel_content']; ?></p>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>

            <?php endforeach; ?>
        <?php endif; ?>

    <?php if (count($this->blockConfiguration["slider_and_tabs_slides"]) > 1): ?>
        </div>
    <?php endif ;?>

</section>

<?php if (count($this->blockConfiguration["slider_and_tabs_slides"]) > 1): ?>
<script>
jQuery(document).ready(function ($) {
    $('[data-element="slider-tabs-block-<?php echo $row_index; ?>"]').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        arrows: <?php echo $this->blockConfiguration['slider_tabs_arrows'] ? 'true' : 'false'; ?>,
        infinite: true,
        dots: true,
    });
});

</script>
<?php /* <style>
    [data-element="slider-tabs-block-<?php echo $row_index; ?>"] .slick-slide {
        display: flex !important;
    }
</style> */ ?>
<?php endif ;?>
