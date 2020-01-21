<?php

use Motionlab\Sauce\PageTemplates\JobsListing\JobsListingTemplate;
use Motionlab\Sauce\Blocks\JobVacanciesBlock\JobVacanciesBlock;

$templateController = new JobsListingTemplate();
$blocks = $templateController->getBlocks(get_the_id());

//Use the JobVacancies controller to bring in jobs.
$jobController = new JobVacanciesBlock(null, false);
$jobController->loadJobs();

//Use Job controller to fetch the taxonomies related for filtering
$jobTypes = $jobController->getTaxonomyTerms('job-types', false);
$positionTypes = $jobController->getTaxonomyTerms('position-types', false);

//Use template controller to load in locations for filtering.
$locations = $templateController->getLocations();

get_header();
?>

<div class="content-wrap">
    <?php $templateController->renderFlexibleContent(get_the_id()); ?>
</div>

<section class="px4 py5">

    <div class="container">

        <div class="flex mxn3">

            <div class="col-12 lg-col-9 mx-auto px3">

                <?php echo do_shortcode('[careers-search]'); ?>

                <?php if (count($jobController->getJobs()) <= 0) :?>
                    <div class="border-bottom border-light-grey hover-border-white transition">
                        <p class="mx-auto text-center">We currently have no job vacancies to show.</p>
                    </div>
                <?php endif; ?>

                <?php foreach ($jobController->getJobs() as $job) : ?>
                    <div class="border-bottom border-light-grey md-hover-border-white transition">
                        <a href="<?php echo $job['url']; ?>" class="md-flex space-between p3 md-hover-bg-light-grey rounded">
                            <div class="width-100">
                                <h3 class="mb2"><?php echo $job['title']; ?></h3>
                                <?php if (isset($job['location_name'])): ?>
                                    <p class="m0"><?php echo $job['location_name']; ?></p>
                                <?php else: ?>
                                    <?php echo \get_field('options_organisation_name', 'option');?>
                                <?php endif; ?>
                            </div>
                            <div class="" style="white-space:nowrap;">
                                <?php if (count($job['tags']) > 0) :?>
                                    <?php foreach ($job['tags'] as $tag) :?>
                                        <?php echo $tag . "<br/>"; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    View for more information
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="pagination my4">
            <?php echo \paginate_links(array(
                'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $jobController->maxPages
            )); ?>
        </div>


    </div>

</section>

<?php
get_footer();
