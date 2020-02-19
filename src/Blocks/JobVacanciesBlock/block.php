<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
    Background Color: $this->blockConfiguration['background_colour'];
    Latest or Selected: $this->blockConfiguration['job_vacancies_latest_or_selected'];
    If Selected:
        Selected Vacancies: $this->blockConfiguration['job_vacancies_selected_vacancies'];
*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

$this->loadJobs(5);
?>

<section class="px4 py5 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?>>

    <div class="container">

        <h2 class="h1 text-center mb4 lg-mb5">Latest Vacancies</h2>

        <div class="mb5 lg-col-9 mx-auto">

            <?php if (count($this->getJobs()) <= 0) :?>
                <p class="mx-auto text-center">We currently have no job vacancies to show.</p>
            <?php endif; ?>

            <?php foreach ($this->getJobs() as $job): ?>
                <div class="border-bottom border-light-grey hover-border-white transition">
                    <a href="<?php echo $job['url']; ?>" class="flex space-between p3 hover-bg-light-grey rounded">
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

        <div class="text-center">
            <a href="<?php echo get_site_url() . "/careers/full-job-listing/"; ?>" class="btn btn-primary white bg-primary mx1">
                View all Vacancies
                <span class="h4 ml2"><i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i></span>
            </a>
        </div>

    </div>

</section>
