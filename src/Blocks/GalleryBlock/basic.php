<?php

/**
 * Build basic grid layout here
 */
?>

<div class="owl-carousel owl-theme carousel-<?php echo $this->getBlockPositionID(); ?>" data-aos="fade-in">
    <?php foreach ($this->blockConfiguration['gallery_images'] as $key => $image) : ?>
        <div class="item">
            <img src="<?php echo $image['gallery_images_image']['url']; ?>" alt="<?php echo $image['gallery_images_image']['alt']; ?>">
        </div>
    <?php endforeach; ?>
</div>

<script>
    jQuery(document).ready(function($) {
        $(".carousel-<?php echo $this->getBlockPositionID(); ?>").owlCarousel({
            nav: true,
            margin: 5,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                800: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1900: {
                    items: 5
                }
            }
        });
    });
</script>