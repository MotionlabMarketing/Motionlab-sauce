<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Content: $this->blockConfiguration['standard_content_content']
Link URL: $button['standard_content_button']['url']
Link Title: $button['standard_content_button']['title']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<section class="px4 py5 text-center <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>">
    <div class="lh4 wysiwyg measure-super-wide mx-auto">
        <?php echo $this->blockConfiguration['standard_content_content']; ?>
    </div>
    <?php
        if(!empty($this->blockConfiguration['standard_content_buttons'])):
            foreach($this->blockConfiguration['standard_content_buttons'] as $index => $button):?>
        <a href="<?php echo $button['standard_content_button']['url'];?>" class="btn bg-secondary white rounded mt3"><?php echo $button['standard_content_button']['title'];?></a>
    <?php endforeach;
        endif; ?>
</section>
