<?php

namespace Motionlab\Sauce\PageTemplates;

use Motionlab\Sauce\PageTemplates\Generic\GenericTemplate;
use Motionlab\Sauce\PageTemplates\Jobs\JobsTemplate;
use Motionlab\Sauce\PageTemplates\JobsListing\JobsListingTemplate;
use Motionlab\Sauce\PageTemplates\LocationFinder\LocationFinderTemplate;
use Motionlab\Sauce\PageTemplates\Testimonials\TestimonialsTemplate;

class PageTemplateProvider
{

    protected static $pageTemplates = [
        'generic'           => GenericTemplate::class,
        'jobs'              => JobsTemplate::class,
        'jobs_listing'      => JobsListingTemplate::class,
        'location_finder'   => LocationFinderTemplate::class,
        'testimonials'      => TestimonialsTemplate::class
    ];

    public function __construct()
    {

    }

    public function bootstrap()
    {
        $this->registerPageTemplates();
    }

    private function registerPageTemplates()
    {
        foreach(self::$pageTemplates as $pageTemplate){
            $pageTemplateInstance = new $pageTemplate();
            $pageTemplateInstance->init();
        }
    }

    public static function overrideTemplate(string $key, string $className)
    {
        self::$customPostTypes[$key] = $className;
    }
}
