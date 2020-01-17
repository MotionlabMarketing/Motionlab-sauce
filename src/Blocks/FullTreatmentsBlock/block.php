<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
No settings. This will list all treatments and group them by category.
treatments_full_title
TODO:// Update these setting please.
~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

?>

<section class="clearfix full-treatment-block bg-light-grey px4 py5">
    <div class="container">

        <h2 class="width-100 text-center dark-purple h0 mb5"><?php echo $this->blockConfiguration['treatments_full_title']; ?></h2>

        <div class="mxn4 flex flex-wrap">

        <?php $a = 1; foreach ($this->getTreatmentsByTerm() as $treatment_sector => $treatments): ?>
        <div class="col col-12 sm-col-6 lg-col-4 xl-col-3 mb5 px4" data-mh="treatment-boxes">
            <h2 class="mb3 h2 dark-purple" data-mh="full-treatement-title"><a href="<?php echo $treatments['taxonomy']['page_link']; ?>" class="dark-purple hover-primary"><?php echo $treatment_sector; ?></a></h2>
            <p class="h5 black" data-mh="full-treatement-description"><?php echo $treatments['taxonomy']['description']; ?></p>

            <div class="clearfix">
            <?php $i = 0; foreach ($treatments['treatments'] as $key => $treatment): ?>
                <div class="">
                    <a href="<?php echo $treatment['link']; ?>" class="flex items-center justify-between border-bottom hover-rounded border-primary text-decoration-none secondary block p2 relative hover-bg-white">
                        <div>
                            <?php foreach ($treatment['tags'] as $tag) :?>
                                <span class="treatment_block-tag bg-primary uppercase white inline-block lh1 p1 rounded h6 semi-bold"><?php echo $tag; ?></span>
                            <?php endforeach; ?>
                            <span class="block dark-purple"><?php echo $treatment['name']; ?></span>
                        </div>
                        <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i>
                    </a>
                </div>
            <?php  $i++; endforeach; ?>
            </div>
        </div>
        <?php $a++; endforeach; ?>

        </div>

    </div>
</section>
