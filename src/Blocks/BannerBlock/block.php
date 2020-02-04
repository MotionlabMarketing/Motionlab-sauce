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
$bannerImage = $this->blockConfiguration['banner_background_image'];
$buttons = $this->blockConfiguration['banner_buttons'];

$banners = $this->blockConfiguration['banner_banners'];

?>

<?php foreach($banners as $banner) : ?>

    <?php //@Chris here you need to loop over the banners and put each one in markup.
    //          'banner_full_width' and 'banner_height' will stay the same but all of the
    //          settings specific to a banner will need to be pulled in from the repeater
    //          using similar code to this: get_field('banner_overlay_opacity', $banner->ID); ?>

<?php endforeach; ?>

<section class="banner-block relative <?php echo $this->blockConfiguration['banner_full_width'] == true ? '' : 'container' ?> px4 py5 <?php echo $this->blockConfiguration['banner_height']; ?> flex items-center">

    <div class="absolute top-0 left-0 width-100 height-100 z1 bg-cover xl-show" style="background-image:url('<?php echo $bannerImage['sizes']['2048x2048'];?>'); background-position: 80% 50%;"></div>
    <div class="absolute top-0 left-0 width-100 height-100 z1 bg-cover xl-hide" style="background-image:url('<?php echo $bannerImage['sizes']['2048x2048'];?>'); background-position: <?php echo $this->blockConfiguration['background_image_position_mobile']['horizontal'];?>% <?php echo $this->blockConfiguration['background_image_position_mobile']['vertical'];?>%;"></div>

    <?php if ($this->blockConfiguration['banner_overlay_colour']):?>
        <div class="absolute top-0 left-0 width-100 height-100 z2 <?php echo $this->blockConfiguration['banner_overlay_opacity']; ?>" style="background-color: <?php echo $this->blockConfiguration['banner_overlay_colour'];?>;"></div>
    <?php endif;?>


    <div class="banner-block-content relative z3 <?php echo $this->blockConfiguration['banner_full_width'] == true ? 'container' : '' ?> flex <?php echo $this->blockConfiguration['banner_content_alignment']; ?> items-center width-100">
        <div class="col-9 lg-pl5 md-col-6 relative banner-content-holder">
            <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $this->blockConfiguration['banner_content']); ?>
            <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $this->blockConfiguration['banner_content_html']); ?>
            <?php if ($buttons):?>
                <div class="mxn1">
                    <?php foreach ($buttons as $button): ?>
                        <a href="<?php echo $button['button']['url'];?>" class="btn btn-primary white bg-primary mx1">
                            <span class="h4 mr2"><?php echo $button['icon'] ?></span>
                            <?php echo $button['button']['title'];?>
                        </a>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </div>

    <?php if (!empty($this->blockConfiguration['banner_offer_roundel']['sizes']['roundel'])) : ?>
        <div class="container absolute bottom-0 right-0 left-0">
            <img class="roundel lg-absolute" src="<?php echo $this->blockConfiguration['banner_offer_roundel']['sizes']['roundel']; ?>" alt="<?php echo $this->blockConfiguration['banner_offer_roundel']['alt']; ?>">
        </div>
    <?php endif; ?>

</section>

<section class="lg-hide p4 bg-light-grey || banner-content-mobile">
    <div class="container">
        <?php echo $this->blockConfiguration['banner_content']; ?>
        <?php echo $this->blockConfiguration['banner_content_html']; ?>
        <?php if ($buttons):?>
            <div class="mxn1">
                <?php foreach ($buttons as $button): ?>
                    <a href="<?php echo $button['button']['url'];?>" class="btn btn-primary white bg-primary mx1">
                        <?php echo $button['button']['title'];?>
                        <span class="h5 ml2"><?php echo $button['icon'] ?></span>
                    </a>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</section>
