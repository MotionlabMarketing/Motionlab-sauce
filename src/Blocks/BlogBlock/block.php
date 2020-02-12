<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
// Background Color: $this->blockConfiguration['background_colour'];
// Display Type: $this->blockConfiguration['blog_display_type'];
// Selected Posts: $this->blockConfiguration['blog_selected'];
// Content: $this->blockConfiguration['blog_content'];
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/



?>

<?php if (!empty($this->posts)): ?>
<section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5"  <?php echo $this->getAttributeString() ?>>

    <div class="container">

        <h2 class="text-center h1"><?php echo $this->blockConfiguration['blog_title'] ?></h2>

        <div class="mxn3 flex flex-wrap md-flex-nowrap">
            <?php foreach ($this->posts as $p):?>
                <article class="bg-white col-12 mx3 rounded overflow-hidden shadow hover-zoom mb4 md-mb0">
                    <a href="<?php echo $p->permalink ?>" class="overflow-hidden block">
                        <div class="bg-smoke overflow-hidden" style="height: 16rem;">
                            <div style="height: 16rem; background-image: url('<?php echo $p->featuredImage; ?>');" class="zoom bg-cover bg-bottom-right"></div>
                        </div>
                    </a>
                    <div class="js-match-height py3 px4">
                        <h4 class="grey h5"><?php echo date('l jS F Y', strtotime($p->date)); ?></h4>
                        <h3 class="lh2 mb2">
                            <a href="<?php echo $p->permalink ?>" class="text-decoration-none"><?php echo $p->title ?></a>
                        </h3>
                        <p class="lh3 h5 mt0 ml0 mr0"><?php echo wp_trim_words( $p->excerpt, 22, '...' ); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

    </div>

</section>
<?php endif; ?>