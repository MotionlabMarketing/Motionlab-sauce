<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
//Background Color: $this->blockConfiguration['background_colour'];
//Accreditations (repeated): $this->blockConfiguration['accreditations_accreditations'];
//In each accreditation:
// Image: $accreditation['accreditation_image']
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$randID = rand(0, 10000);
?>

<section class="py3 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?> " <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <?php if (!empty($this->blockConfiguration['accreditations_accreditations'])) : ?>
        <div data-element="accreditations-slider-<?php echo $randID; ?>">
            <?php foreach ($this->blockConfiguration['accreditations_accreditations'] as $accreditation) : ?>
                <div class="col col-3">
                    <img src="<?php echo $accreditation['accreditation_image']['url']; ?>" alt="<?php echo $accreditation['accreditation_image']['alt']; ?>" style="max-height: 6rem;">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>

<script>
    <?php //TODO; Respinciveness ;
    ?>
    jQuery(document).ready(function($) {
        $('[data-element="accreditations-slider-<?php echo $randID; ?>"]').slick({
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
<?php unset($randID);
