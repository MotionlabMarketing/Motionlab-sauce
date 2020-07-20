<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/
// Background Color: $this->blockConfiguration['background_colour'];
// Selected Case Studies: $this->blockConfiguration['case_studies_selected'];
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$caseStudies = $this->getCaseStudies();

?>

<section class="px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">

    <?php if (sizeof($caseStudies) > 1) : ?><div class="owl-carousel owl-theme carousel-<?php echo $this->getBlockPositionID(); ?>"> <?php endif; ?>
        <?php foreach ($caseStudies as $caseStudy) : ?>
            <div class="container">
                <article class="bg-white rounded overflow-hidden shadow md-flex">
                    <a href="#" class="overflow-hidden block md-col-6 hover-zoom">
                        <div class="bg-center bg-cover height-100 zoom" style="background-image:url('<?php echo $caseStudy['case_study_featured_image']; ?>')">
                            <div class="ratio-4-3"></div>
                        </div>
                    </a>
                    <div class="p4 pb5 md-py5 md-col-6 pb4 relative">
                        <div class="md-pl4 md-col-11">
                            <h4 class="h5 uppercase"><a href="#" class="secondary hover-black text-decoration-none">Case Study</a></h4>
                            <h3 class="lh2">
                                <a href="<?php echo $caseStudy['case_study_url']; ?>" class="text-decoration-none"><?php echo $caseStudy['case_study_title']; ?></a>
                            </h3>
                            <?php echo $caseStudy['case_study_introduction']; ?>
                        </div>
                        <a href="<?php echo $caseStudy['case_study_url']; ?>" class="uppercase secondary absolute h5 right-0 bottom-0 p4 text-decoration-none semi-bold hover-black">Read the study <i class="fa fa-chevron-right ml2"></i></a>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>

        <?php if (sizeof($caseStudies) > 1) : ?></div><?php endif; ?>

</section>

<script>
    jQuery(document).ready(function($) {

        if ($(".carousel-<?php echo $this->getBlockPositionID(); ?> > div").length > 1) {
            $(".carousel-<?php echo $this->getBlockPositionID(); ?>").owlCarousel({
                nav: true,
                margin: 5,
                slideBy: 1,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                }
            });
        }
    });
</script>