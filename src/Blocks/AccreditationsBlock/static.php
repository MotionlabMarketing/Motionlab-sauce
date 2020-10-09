<?php

    $accreditations = array_slice($this->blockConfiguration['accreditations_accreditations'],0,5 );

?>

<section class="py3 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?> " <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <div>

        <div>
            <?php echo $this->blockConfiguration['accreditation_content'];?>
        </div>

        <div>
            <?php foreach($accreditations as $accreditation): ?>
                <img src="<?php echo $accreditation['accreditation_image']['sizes']['INSERT SIZE HERE']; ?>" />
            <?php endforeach;?>
        </div>

    </div>

</section>