<?php
/*
 * Alternating gallery (1 large, 2 small) layout to go here.
 */
?>

<div class="owl-carousel owl-theme carousel-grid carousel-<?php echo $this->getBlockPositionID(); ?> carousel-grid" style="margin-right: -10px;" data-aos="fade-in">

    <?php
    $sub = 0;
    $count = count($this->blockConfiguration['gallery_images']);
    foreach ($this->blockConfiguration['gallery_images'] as $key => $image) : ?>

        <?php
        if ($key % 3 == 0) : ?>
            <div>
                <div class="img-wrapper relative bg-cover bg-center tall" style="background-image: url('<?php echo $image['gallery_images_image']['url']; ?>');"></div>
            </div>
        <?php else : ?>
            <?php if ($sub == 0) : ?>
                <div class="spacing">
                    <div class="img-wrapper relative bg-cover bg-center" style="background-image: url('<?php echo $image['gallery_images_image']['url']; ?>');"></div>
                <?php $sub++;
            else : ?>
                    <div class="img-wrapper relative bg-cover bg-center" style="background-image: url('<?php echo $image['gallery_images_image']['url']; ?>');"></div>
                </div>
            <?php $sub = 0;
            endif; ?>
        <?php endif; ?>

    <?php endforeach; ?>
</div>

<script>
    jQuery(document).ready(function($) {
        $(".carousel-<?php echo $this->getBlockPositionID(); ?>").owlCarousel({
            nav: true,
            margin: 5,
            slideBy: 2,
            loop: true,
            responsive: {
                0: {
                    items: 2
                },
                1200: {
                    items: 4
                },
            }
        });
    });
</script>