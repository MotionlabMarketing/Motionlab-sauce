<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Intro : $this->blockConfiguration['gallery_intro']; - WYSIWYG
Layout: $this->blockConfiguration['gallery_layout']; - Select
Images: $this->blockConfiguration['gallery_images']; - Repeater
    Each Image includes
        $image['gallery_images_image'];

~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="px4 py5" <?php echo $this->getAttributeString() ?>>

    <div class="wysiwyg">
        <?php echo $this->blockConfiguration['gallery_intro']; ?>
    </div>

    <?php
        switch($this->blockConfiguration['gallery_layout']) {
            case 'alternating':
                include(__DIR__ . '/alternating.php');
                break;
            default:
                include(__DIR__ . '/basic.php');
                break;
        }
    ?>

</section>