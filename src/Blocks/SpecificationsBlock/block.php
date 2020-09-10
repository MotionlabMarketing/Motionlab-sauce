<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Block Title : $this->blockConfiguration['specifications_title'];
Block Introduction : $this->blockConfiguration['specifications_introduction'];

Image Title : $this->blockConfiguration['specifications_image_title'];
Image : $this->blockConfiguration['specifications_image'];

Left Content : $this->blockConfiguration['specifications_left_column_content'];
Right Content : $this->blockConfiguration['specifications_right_column_content'];
*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section <?php echo $this->getAttributeString() ?>>
    <div class="container clearfix px4 py6">

        <div class="col-12 text-center mb6">
            <?php if (!empty($this->blockConfiguration['specifications_title'])) : ?>
                <h2><?php echo $this->blockConfiguration['specifications_title']; ?></h2>
            <?php endif; ?>
            <?php if (!empty($this->blockConfiguration['specifications_introduction'])) : ?>
                <div class="wysiwyg md-max-width-70 mx-auto">
                    <?php echo $this->blockConfiguration['specifications_introduction']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col col-12 md-col-4 p4">
            <div class="inner">
                <?php if (!empty($this->blockConfiguration['specifications_image_title'])) : ?>
                    <h3 class="mb3 bold dark-blue"><?php echo $this->blockConfiguration['specifications_image_title']; ?></h3>
                <?php endif; ?>
                <?php if (!empty($this->blockConfiguration['specifications_image'])) : ?>
                    <img src="<?php echo $this->blockConfiguration['specifications_image']['sizes']['large']; ?>" alt="<?php echo $this->blockConfiguration['specifications_image']['alt']; ?>">
                <?php endif; ?>
            </div>
        </div>
        <div class="col col-12 md-col-4 p2">
            <?php if (!empty($this->blockConfiguration['specifications_left_column_title'])) : ?>
                <h3 class="mb3 bold dark-blue"><?php echo $this->blockConfiguration['specifications_left_column_title']; ?></h3>
            <?php endif; ?>
            <div class="inner column-content text-left bg-smoke p4">
                <?php if (!empty($this->blockConfiguration['specifications_left_column_content'])) : ?>
                    <?php echo $this->blockConfiguration['specifications_left_column_content']; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col col-12 md-col-4 p2">
            <?php if (!empty($this->blockConfiguration['specifications_right_column_title'])) : ?>
                <h3 class="mb3 bold dark-blue"><?php echo $this->blockConfiguration['specifications_right_column_title']; ?></h3>
            <?php endif; ?>
            <div class="inner column-content text-left bg-smoke p4">
                <?php if (!empty($this->blockConfiguration['specifications_right_column_content'])) : ?>
                    <?php echo $this->blockConfiguration['specifications_right_column_content']; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>