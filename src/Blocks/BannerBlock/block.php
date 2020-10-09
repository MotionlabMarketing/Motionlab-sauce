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

$bannerOverflow = "0";

if(isset($this->blockConfiguration['banner_overflow'])) {
    if (is_front_page() && $this->blockConfiguration['banner_overflow']) {
        $bannerOverflow = "margin-bottom: -20rem";
    } else if ($this->blockConfiguration['banner_overflow']) {
        $bannerOverflow = "margin-bottom: -12rem";
    }
}

?>

<section class="js-hero-slider" <?php echo $this->getAttributeString() ?> data-aos="fade-in" <?php echo ($bannerOverflow !== "0") ? "style='" . $bannerOverflow . "'" : ""; ?>>

    <?php foreach ($banners as $banner) : ?>

        <div class="banner-block <?php echo $this->blockConfiguration['banner_full_width'] == true ? '' : 'container' ?>">

            <div class="flex items-center px4 py5 relative <?php echo $this->blockConfiguration['banner_height']; ?>">

                <?php
                $bannerImage = $banner['banner_background_image'];
                $buttons = $banner['banner_buttons'];
                ?>

                <div class="absolute top-0 left-0 width-100 height-100 z1 bg-cover xl-show" style="background-image:url('<?php echo $bannerImage['sizes']['post-thumbnail']; ?>'); background-position: 80% 50%;"></div>
                <div class="absolute top-0 left-0 width-100 height-100 z1 bg-cover xl-hide" style="background-image:url('<?php echo $bannerImage['sizes']['large']; ?>'); background-position: <?php echo $banner['background_image_position_mobile']['horizontal']; ?>% <?php echo $banner['background_image_position_mobile']['vertical']; ?>%;"></div>

                <?php if ($banner['banner_overlay_opacity']) : ?>
                    <div class="absolute top-0 left-0 width-100 height-100 z2 <?php echo $banner['banner_overlay_opacity']; ?>" style="background-color:  <?php echo $banner['banner_overlay_colour'] ?>;"></div>
                <?php endif; ?>

                <div class="banner-block-content relative z3 <?php echo $this->blockConfiguration['banner_full_width'] == true ? 'container' : '' ?> flex lg-px7 <?php echo $banner['banner_content_alignment']; ?> items-center width-100" style="<?php echo $bannerOverflow; ?>">
                    <div class="col-12 md-col-6 relative js-match-height">
                        <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $banner['banner_content']); ?>
                        <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $banner['banner_content_html']); ?>
                        <?php if ($banner['banner_buttons']) : ?>
                            <div class="mxn1">
                                <?php foreach ($banner['banner_buttons'] as $button) : ?>
                                    <a href="<?php echo $button['button']['url']; ?>" class="btn btn-primary white bg-primary mx1">
                                        <span class="h4 mr2"><?php echo $button['icon'] ?></span>
                                        <?php echo $button['button']['title']; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>

    <?php endforeach; ?>

</section>