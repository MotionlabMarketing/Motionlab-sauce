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

            <?php if (!empty($this->blockConfiguration['blog_title'])) : ?>
                <h2 class="text-center h1"><?php echo $this->blockConfiguration['blog_title'] ?></h2>
            <?php endif; ?>

            <div class="mxn3 flex flex-wrap">
                <?php foreach ($this->posts as $p) :
                    $p->category_id = get_post_meta($p->ID, 'rank_math_primary_category', true);
                    $p->category_id = $p->category_id ? $p->category_id : wp_get_post_categories($p->ID)[0];
                    $p->category_primary = get_term($p->category_id);
                ?>
                    <article class="p3 col-12 md-col-4 rounded md-hover-zoom mb3">
                        <div class="post bg-white shadow overflow-hidden zoom">
                            <a href="<?php echo get_the_permalink($p->ID); ?>" class="post-image overflow-hidden block">
                                <div class="bg-charcoal overflow-hidden bg-cover bg-center" style="height: 16rem; background-image: url('<?php echo $p->featuredImage; ?>');"></div>
                            </a>
                            <div class="post-content js-match-height py3 px4">
                                <?php if (!empty($p->category_primary)) : ?>
                                    <p class="post-category h5 ls1 uppercase mb2 black">
                                        <?php echo $p->category_primary->name; ?>
                                    </p>
                                <?php endif; ?>
                                <?php if (!empty($p->title)) : ?>
                                    <h5 class="post-title h4 black mb0" data-mh="post-title"><?php echo $p->title; ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($p->excerpt)) : ?>
                                    <p class="post-excerpt lh3 h5 mt0 ml0 mr0"><?php echo wp_trim_words($p->excerpt, 22, '...'); ?></p>
                                <?php endif; ?>
                                <!--DEVELOPER: Please add the control here -->
                                <div class="post-button-wrapper">
                                    <a href="<?php echo get_the_permalink($p->ID); ?>" class="post-button btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

            </div>
            <?php if (!empty($this->blockConfiguration['blog_footer_button']['url'])) : ?>
                <div class="blog-buttons text-center mt4">
                    <a href="<?php echo $this->blockConfiguration['blog_footer_button']['url']; ?>" class="blog-button btn btn-secondary h4"><?php echo $this->blockConfiguration['blog_footer_button']['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>

    </section>
<?php endif; ?>