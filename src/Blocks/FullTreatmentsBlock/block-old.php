<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
No settings. This will list all treatments and group them by category.
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

?>

<section class="full-treatment-block px4 py5">
    <div class="container">
        <?php $i = 0; foreach ($this->getTreatmentsByTerm() as $treatment_sector => $treatments): ?>
            <?php if ($i % 2 == 0): ?>
                <div class="mxn3 md-flex flex-row-reverse md-py5 js-match-height">
                    <div class="col-12 px3 min-height-100">
                        <div class="bg-cover bg-center height-100" style="background-image:url('<?php echo $treatments['taxonomy']['image'] ? $treatments['taxonomy']['image'] : \get_template_directory_uri() . "/dist/images/news-thumbnail-default.jpg"; ;?>');">
                            <div class="ratio-4-3"></div>
                        </div>
                    </div>
                    <div class="col-12 px3">
                        <div class="pt4 md-p4 md-py5 wysiwyg">
                            <h2 class="mb3 h3"><a href="<?php echo $treatments['taxonomy']['page_link']; ?>"><?php echo $treatment_sector; ?></a></h2>
                            <p><?php echo $treatments['taxonomy']['description']; ?></p>

                            <?php foreach ($treatments['treatments'] as $treatment): ?>
                                <a href="<?php echo $treatment['link']; ?>" class="border-bottom hover-rounded border-light-grey text-decoration-none secondary block p2 relative hover-bg-light-grey">
                                    <?php foreach ($treatment['tags'] as $tag) :?>
                                        <span class="treatment_block-tag bg-primary uppercase white inline-block lh1 p1 rounded h6 semi-bold"><?php echo $tag; ?></span>
                                    <?php endforeach; ?>
                                    <span class="block dark-purple"><?php echo $treatment['name']; ?></span>
                                    <i class="fa fa-chevron-right absolute bottom-0 p3 right-0" aria-hidden="true"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="mxn3 md-flex pmd-y5 js-match-height">
                    <div class="col-12 px3 min-height-100">
                        <div class="bg-cover bg-center height-100" style="background-image:url('<?php echo $treatments['taxonomy']['image'] ? $treatments['taxonomy']['image'] : \get_template_directory_uri() . "/dist/images/news-thumbnail-default.jpg"; ;?>');">
                            <div class="ratio-4-3"></div>
                        </div>
                    </div>
                    <div class="col-12 px3">
                        <div class="pt4 md-p4 md-py5 wysiwyg">
                            <h2 class="mb3 h3"><a href="<?php echo $treatments['taxonomy']['page_link']; ?>"><?php echo $treatment_sector; ?></a></h2>
                            <p><?php echo $treatments['taxonomy']['description']; ?></p>
                            <?php foreach ($treatments['treatments'] as $treatment): ?>
                                <a href="<?php echo $treatment['link']; ?>" class="border-bottom hover-rounded border-light-grey text-decoration-none secondary block p2 relative hover-bg-light-grey">
                                    <?php foreach ($treatment['tags'] as $tag) :?>
                                        <span class="treatment_block-tag bg-primary uppercase white inline-block lh1 p1 rounded h6 semi-bold"><?php echo $tag; ?></span>
                                    <?php endforeach; ?>
                                    <span class="block dark-purple"><?php echo $treatment['name']; ?></span>
                                    <i class="fa fa-chevron-right absolute bottom-0 p3 right-0" aria-hidden="true"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php $i++; endforeach; ?>

    </div>
</section>
