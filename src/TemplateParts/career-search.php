<?php
use Motionlab\TogetherDentalGroup\Blocks\JobVacanciesBlock\JobVacanciesBlock;
use Motionlab\TogetherDentalGroup\PageTemplates\JobsListing\JobsListingTemplate;

$templateController = new JobsListingTemplate();
$jobController = new JobVacanciesBlock(null, false);

//Use Job controller to fetch the taxonomies related for filtering
$jobTypes = $jobController->getTaxonomyTerms('job-types', false);
$positionTypes = $jobController->getTaxonomyTerms('position-types', false);

//Use template controller to load in locations for filtering.
$locations = $templateController->getLocations();

?>

<form class="bg-light-grey p3 rounded mb5 box-shadow" action="<?php echo get_site_url() . "/careers/full-job-listing"; ?>" method="get">
    <div class="mxn2 md-flex">
        <div class="px2 col-12 md-col-6 mb3 md-mb0">
            <select class="select width-100 slim <?php echo $fontSize; //Defined in shortcode hook (Theme.php)?>" name="pt">
                <option value="">Position</option>
                <?php foreach ($positionTypes as $positionType) : ?>
                    <option <?php echo $_GET['pt'] == $positionType->slug ? "selected='selected'" : ""; ?> value="<?php echo $positionType->slug; ?>"><?php echo $positionType->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="px2 col-12 mb3 md-mb0">
            <select class="select width-100 <?php echo $fontSize; //Defined in shortcode hook (Theme.php)?>" name="lid" <?php echo \get_current_blog_id() == \get_network()->site_id ? '' : 'disabled="disabled"'; ?>">
            <option value="">Location</option>
            <?php foreach ($locations as $location) : ?>
                <option <?php echo $_GET['lid'] == $location['id'] ? "selected='selected'" : ""; ?> value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="px2 col-12 md-col-6 mb3 md-mb0">
            <select class="select width-100 <?php echo $fontSize; //Defined in shortcode hook (Theme.php)?>" name="jt">
                <option value="">Contract</option>
                <?php foreach ($jobTypes as $jobType) : ?>
                    <option <?php echo $_GET['jt'] == $jobType->slug ? "selected='selected'" : ""; ?> value="<?php echo $jobType->slug; ?>"><?php echo $jobType->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary px4 bg-primary white <?php echo $fontSize == "" ? "h5" : $fontSize; ?> uppercase col-4 mx2">Search</button>
    </div>
</form>
