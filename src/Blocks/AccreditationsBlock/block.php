<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
//Background Color: $this->blockConfiguration['background_colour'];
//Accreditations (repeated): $this->blockConfiguration['accreditations_accreditations'];
//In each accreditation:
// Image: $accreditation['accreditation_image']
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="<?php echo $this->blockConfiguration['button_full_width'] == true ? '' : 'px4' ?> py3 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?> " <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="" data-element="accreditations-slider-<?php echo $row_index; ?>">
        <?php foreach ($this->blockConfiguration['accreditations_accreditations'] as $accreditation) : ?>
            <div class="col col-3">
                <img src="<?php echo $accreditation['accreditation_image']['url']; ?>" alt="<?php echo $accreditation['accreditation_image']['alt']; ?>" style="max-height: 6rem;">
            </div>
        <?php endforeach; ?>
    </div>

</section>

<script>
    <?php //TODO; Respinciveness ;
    ?>
    jQuery(document).ready(function($) {
        $('[data-element="accreditations-slider-<?php echo $row_index; ?>"]').slick({
            initialSlide: 1,
            slidesToShow: 5,
            slidesToScroll: 1,
            speed: 8000,
            autoplay: true,
            autoplaySpeed: 0,
            cssEase: 'linear',
            pauseOnHover: false
        });
    });
</script>