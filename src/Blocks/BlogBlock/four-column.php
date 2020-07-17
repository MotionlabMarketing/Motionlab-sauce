<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
// Background Color: $this->blockConfiguration['background_colour'];
// Display Type: $this->blockConfiguration['blog_display_type'];
// Selected Posts: $this->blockConfiguration['blog_selected'];
// Content: $this->blockConfiguration['blog_content'];
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
?>

<?php if (!empty($this->posts)) : ?>
    <section class="<?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : 'bg-light-grey'; ?> px4 py5 lg-mx0" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

        <div class="container">

            <h2 class="text-center h1"><?php echo $this->blockConfiguration['blog_title'] ?></h2>

            <div class="mxn3 flex flex-wrap">
                <?php foreach ($this->posts as $p) :
                    $p->category_id = get_post_meta($p->ID, 'rank_math_primary_category', true);
                    $p->category_id = $p->category_id ? $p->category_id : wp_get_post_categories($p->ID)[0];
                    $p->category_primary = get_term($p->category_id);
                ?>
                    <article class="p3 col-12 md-col-3 rounded hover-zoom mb3">
                        <div class="bg-white shadow overflow-hidden zoom">
                            <a href="<?php echo get_the_permalink($p->ID); ?>" class="overflow-hidden block">
                                <div class="bg-charcoal overflow-hidden bg-cover bg-center" style="height: 16rem; background-image: url('<?php echo $p->featuredImage; ?>');"></div>
                            </a>
                            <div class="js-match-height py3 px4">
                                <?php if (!empty($p->category_primary)) : ?>
                                    <p class="h5 ls1 uppercase mb2 black">
                                        <?php echo $p->category_primary->name; ?>
                                    </p>
                                <?php endif; ?>
                                <?php if (!empty($p->title)) : ?>
                                    <h5 class="h4 black mb0"><?php echo $p->title; ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($p->excerpt)) : ?>
                                    <p class="lh3 h5 mt0 ml0 mr0"><?php echo wp_trim_words($p->excerpt, 22, '...'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

            </div>
            <?php if (!empty($this->blockConfiguration['blog_footer_button']['url'])) : ?>
                <div class="text-center mt4">
                    <a href="<?php echo $this->blockConfiguration['blog_footer_button']['url']; ?>" class="btn btn-secondary h4"><?php echo $this->blockConfiguration['blog_footer_button']['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>

    </section>
<?php endif; ?>