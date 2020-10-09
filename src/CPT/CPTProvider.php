<?php


namespace Motionlab\Sauce\CPT;

class CPTProvider
{

    protected static $customPostTypes = [
        'CallToActions' => CPT_CallToActions::class,
        'CaseStudies' => CPT_CaseStudies::class,
        'TeamMembers' => CPT_TeamMembers::class,
        'Testimonials' => CPT_Testimonials::class,
        'Jobs' => CPT_Jobs::class,
        'Locations' => CPT_Locations::class,
        'Packages' => CPT_Packages::class,
    ];

    public function __construct()
    {
        // not doing things here
    }

    public function bootstrap()
    {
        $this->registerCustomPostTypes();
    }

    private function registerCustomPostTypes()
    {
        foreach(self::$customPostTypes as $customPostType){
            $cptInstance = new $customPostType();
            $this->loadACF($cptInstance);
            $this->registerHooks($cptInstance);
        }
    }

    private function loadACF($cptInstance) {
        if(method_exists($cptInstance, 'registerACF')) {
            $cptInstance->registerACF();
        }
    }

    private function registerHooks($cptInstance) {
        if(method_exists($cptInstance, 'registerHooks')) {
            $cptInstance->registerHooks();
        }
    }

    public static function orverrideCptClass(string $key, string $className)
    {
        self::$customPostTypes[$key] = $className;
    }

}