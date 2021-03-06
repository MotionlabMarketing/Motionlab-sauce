<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Content: $this->blockConfiguration['standard_content_content']
Link URL: $button['standard_content_button']['url']
Link Title: $button['standard_content_button']['title']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <?php if($this->blockConfiguration['standard_content_contain_to_grid']):?>
    <div class="container">
        <?php endif; ?>
        <div class="lh4 wysiwyg measure-super-wide mx-auto">
            <?php echo $this->blockConfiguration['standard_content_content']; ?>
        </div>
        <?php
        if (!empty($this->blockConfiguration['standard_content_buttons'])) :
            foreach ($this->blockConfiguration['standard_content_buttons'] as $index => $button) : ?>
                <?php if(!empty($button['standard_content_button'])): ?>
                    <a href="<?php echo $button['standard_content_button']['url']; ?>" class="btn bg-secondary white rounded mt3"><?php echo $button['standard_content_button']['title']; ?></a>
                <?php endif; ?>
            <?php endforeach;
        endif; ?>
        <?php if($this->blockConfiguration['standard_content_contain_to_grid']):?>
    </div>
<?php endif; ?>
</section>