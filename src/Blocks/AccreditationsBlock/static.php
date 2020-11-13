<?php

$accreditations = array_slice($this->blockConfiguration['accreditations_accreditations'], 0, 20);
$randID = rand(0, 10000);
?>

<section class="py3 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="container clearfix relative px4 flex items-center">

        <div class="col col-12 md-col-3" data-element="content-area">
            <?php echo $this->blockConfiguration['accreditation_content']; ?>
        </div>

        <div class="col col-12 md-col-9 flex items-center flex-wrap justify-end" data-element="accreditations-slider-<?php echo $randID; ?>">
            <?php foreach ($accreditations as $accreditation) : ?>
                <div class="flex items-center justify-center">
                    <img src="<?php echo $accreditation['accreditation_image']['sizes']['block-accreditation-static']; ?>" alt="<?php echo $accreditation['accreditation_image']['alt']; ?>" class="m1" data-element="logo" />
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <script>
        <?php //TODO; Respinciveness ;
        ?>
        jQuery(document).ready(function($) {
            $('[data-element="accreditations-slider-<?php echo $randID; ?>"]').slick({
                speed: 5000,
                autoplay: true,
                autoplaySpeed: 0,
                cssEase: 'linear',
                slidesToShow: 5,
                slidesToScroll: 1,
                variableWidth: true,
                dots: false,
                prevArrow: false,
                nextArrow: false
            });
        });
    </script>
    <style>
        .slick-slider {
            margin-bottom: 0;
        }

        /* the slides */
        .slick-slide {
            margin: 0 27px;
        }

        /* the parent */
        .slick-list {
            margin: 0 -27px;
        }
    </style>
    <?php unset($randID); ?>
</section>