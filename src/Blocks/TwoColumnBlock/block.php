<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
    Introduction: $this->blockConfiguration['two_columns_introduction']
    Left Column Content: $this->blockConfiguration['two_columns_left_column']
    Right Column Content: $this->blockConfiguration['two_columns_right_column']
    Content Alignment: $this->blockConfiguration['two_columns_center_content']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="block_2column clearfix px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="<?php echo $this->blockConfiguration['two_columns_grid_contain'] ? 'measure-super-wide mx-auto' : ''; ?>">
        <div class="container clearfix">
            
            <?php if (!empty($this->blockConfiguration['two_columns_introduction'])) : ?>
                <div class="<?php echo (!empty($this->blockConfiguration['two_columns_left_column']) || !empty($this->blockConfiguration['two_columns_right_column'])) ? "mb5" : ""; ?> wysiwyg">
                    <?php echo $this->blockConfiguration['two_columns_introduction']; ?>
                </div>
            <?php endif; ?>

            <div class="mxn4 <?php echo ($this->blockConfiguration['two_columns_center_content']  === true) ? "lg-flex items-center" : ""; ?>">
                <div class="col col-12 md-col-6 px4 relative mb4 md-mb0 wysiwyg">
                    <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $this->blockConfiguration['two_columns_left_column']); ?>
                </div>
                <div class="col col-12 md-col-6 px4 relative mb4 md-mb0 wysiwyg">
                    <?php echo preg_replace('/<p>(\s|&nbsp;)*<\/p>/im', '', $this->blockConfiguration['two_columns_right_column']); ?>
                </div>
            </div>
            
        </div>
    </div>
</section>