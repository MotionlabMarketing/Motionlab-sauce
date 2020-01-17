<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
Selected Treatments: $this->blockConfiguration['treatments_selected']
Content: $this->blockConfiguration['treatments_content']
Background Image: $this->blockConfiguration['treatments_background_image']
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/


// @Karl shout me over when you do this block

?>

<section class="treatment_block bg-light-grey px4 py5 relative">

    <div class="absolute lg-show top-0 left-0 width-100 height-100 bg-cover" style="background-position: 50% 100%; background-image:url('<?php echo $this->blockConfiguration['treatments_background_image']['sizes']['large'];?>')"></div>

    <div class="container relative z2 flex items-center" style="min-height:28rem;">
        <div class="col-12 lg-col-6">
            <div class="treatment_block-content">
                <?php echo $this->blockConfiguration['treatments_content']; ?>
            </div>
            <div class="mxn4">
                <ul class="list-reset p0 m0 sm-flex flex-wrap mt4">
                    <?php foreach ($this->blockConfiguration['treatments_selected'] as $treatment):?>
                        <?php $treatmentTags = get_the_terms($treatment->ID, 'tags'); ?>
                        <li class="treatment_block-list_item_ col-12 sm-col-6 px4 border-box mb0">
                            <a href="<?php echo get_permalink($treatment->ID); ?>" class="border-bottom hover-rounded border-white text-decoration-none secondary block p2 relative hover-bg-white">
                                <?php if ($treatmentTags): ?>
                                    <?php foreach ($treatmentTags as $tag):?>
                                        <?php $tagClass = $tag->slug == "featured" ? "bg-primary" : "bg-secondary"; ?>
                                        <span class="treatment_block-tag <?php echo $tagClass; ?> uppercase white inline-block lh1 p1 rounded h6 semi-bold"><?php echo $tag->name; ?></span>
                                    <?php endforeach;?>
                                <?php else : ?>
                                    <span class="p1 mb3"></span>
                                <?php endif; ?>
                                <span class="block dark-purple"><?php echo $treatment->post_title; ?></span>
                                <i class="fa fa-chevron-right absolute bottom-0 p3 right-0"></i>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>

</section>
