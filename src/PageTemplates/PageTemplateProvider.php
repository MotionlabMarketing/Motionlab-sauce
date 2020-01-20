<?php

namespace Motionlab\Sauce\PageTemplates;

use Motionlab\Sauce\PageTemplates\Generic\GenericTemplate;
use Motionlab\Sauce\PageTemplates\Jobs\JobsTemplate;
use Motionlab\Sauce\PageTemplates\JobsListing\JobsListingTemplate;
use Motionlab\Sauce\PageTemplates\News\NewsTemplate;
use Motionlab\Sauce\PageTemplates\LocationFinder\LocationFinderTemplate;
use Motionlab\Sauce\PageTemplates\Team\TeamTemplate;
use Motionlab\Sauce\PageTemplates\Testimonials\TestimonialsTemplate;
use Motionlab\Sauce\PageTemplates\Treatments\TreatmentsTemplate;

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
        (new LocationFinderTemplate())->init();
        (new TestimonialsTemplate())->init();
    }
}
