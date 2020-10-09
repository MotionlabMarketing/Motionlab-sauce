<?php

    $accreditations = array_slice($this->blockConfiguration['accreditations_accreditations'],0,5 );

?>

<section class="py3 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div class="container clearfix relative px4 flex items-center">

        <div class="col col-12 md-col-3" data-element="content-area">
            <?php echo $this->blockConfiguration['accreditation_content'];?>
        </div>

        <div class="col col-12 md-col-9 flex items-center flex-wrap justify-end">
            <?php foreach($accreditations as $accreditation): ?>
                <img src="<?php echo $accreditation['accreditation_image']['sizes']['block-accreditation-static']; ?>" alt="<?php echo $accreditation['accreditation_image']['alt']; ?>" class="m1" data-element="logo" />
            <?php endforeach;?>
        </div>

    </div>

</section>