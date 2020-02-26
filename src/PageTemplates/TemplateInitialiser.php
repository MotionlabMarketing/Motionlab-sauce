<?php


namespace Motionlab\Sauce\PageTemplates;

use Motionlab\Sauce\PageTemplates\Generic\GenericTemplate;
use Motionlab\Sauce\PageTemplates\Jobs\JobsTemplate;
use Motionlab\Sauce\PageTemplates\JobsListing\JobsListingTemplate;
use Motionlab\Sauce\PageTemplates\LocationFinder\LocationFinderTemplate;
use Motionlab\Sauce\PageTemplates\News\NewsTemplate;
use Motionlab\Sauce\PageTemplates\Team\TeamTemplate;
use Motionlab\Sauce\PageTemplates\Testimonials\TestimonialsTemplate;
use Motionlab\Sauce\PageTemplates\Treatments\TreatmentsTemplate;

class TemplateInitialiser
{

    private static $templates = [
        'generic' => GenericTemplate::class,
        'jobs' => JobsTemplate::class,
        'jobs_listing' => JobsListingTemplate::class,
        'location_finder' => LocationFinderTemplate::class,
        'news' => NewsTemplate::class,
        'team' => TeamTemplate::class,
        'testimonials' => TestimonialsTemplate::class,
        'treatments' => TreatmentsTemplate::class
    ];

    public function __construct()
    {
        $this->initialiseTemplateFields();
    }

    private static function initialiseTemplateFields() {
        $templateFolders = scandir(__DIR__);

        //Remove . and .. directory links
        unset($templateFolders[array_search('.', $templateFolders, true)]);
        unset($templateFolders[array_search('..', $templateFolders, true)]);

        foreach(self::$templates as $key => $template) {
            if($key == "generic") {
                $template = new $template();
                $template->loadTemplateACF();
            }
        }

//        //Loop over remaining folders to find acf.php for each block
//        foreach($templateFolders as $tf) {
//            if(file_exists(__DIR__ . "/$tf/acf.php")) {
//                include_once __DIR__ . "/$tf/acf.php";
//
//                if(function_exists('loadTemplateACF')) {
//                    loadTemplateACF($templateACF);
//                }
//
//            }
//        }
    }
}