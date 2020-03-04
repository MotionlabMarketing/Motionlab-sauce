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
    ];

    public function __construct()
    {
        // not doing things here
    }

    public function bootstrap()
    {
        $this->registerCustomPostTypes();
//        $this->registerCustomPostTypesAcf();
    }

    private function registerCustomPostTypes()
    {
        foreach(self::$customPostTypes as $customPostType){
            $cptInstance = new $customPostType();
            $this->loadACF($cptInstance);
        }
    }

    private function loadACF($cptInstance) {
        if(method_exists($cptInstance, 'registerACF')) {
            $cptInstance->registerACF();
        }
    }

    private function registerCustomPostTypesAcf() {
        include __DIR__ . '/cpt-acf.php';
    }

    public static function orverrideCptClass(string $key, string $className)
    {
        self::$customPostTypes[$key] = $className;
    }

}