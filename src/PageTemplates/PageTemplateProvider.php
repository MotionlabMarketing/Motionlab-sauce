<?php

namespace Motionlab\TogetherDentalGroup\PageTemplates;

use Motionlab\TogetherDentalGroup\PageTemplates\Generic\GenericTemplate;
use Motionlab\TogetherDentalGroup\PageTemplates\Jobs\JobsTemplate;
use Motionlab\TogetherDentalGroup\PageTemplates\JobsListing\JobsListingTemplate;
use Motionlab\TogetherDentalGroup\PageTemplates\News\NewsTemplate;
use Motionlab\TogetherDentalGroup\PageTemplates\PracticeFinder\PracticeFinderTemplate;
use Motionlab\TogetherDentalGroup\PageTemplates\Team\TeamTemplate;
use Motionlab\TogetherDentalGroup\PageTemplates\Testimonials\TestimonialsTemplate;
use Motionlab\TogetherDentalGroup\PageTemplates\Treatments\TreatmentsTemplate;

class PageTemplateProvider
{
    public function __construct()
    {
        $this->bootstrap();
    }

    private function bootstrap()
    {
        (new GenericTemplate())->init();
        (new JobsTemplate())->init();
        (new JobsListingTemplate())->init();
        (new PracticeFinderTemplate())->init();
        (new TestimonialsTemplate())->init();
    }
}
