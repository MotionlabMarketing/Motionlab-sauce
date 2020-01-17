<?php


namespace Motionlab\Sauce\CPT;

class CPTProvider
{

    public function __construct()
    {
        $this->bootstrap();
    }

    /* Initialize CPTs here that should only be available on the master site */
    private function registerMasterSitePostTypes() {

    }

    /* Initialize all global CPTs - if a CPT should only register on the master site, add their declaration to registerMasterSitePostTypes() */
    private function bootstrap()
    {
        new CPT_CaseStudies();
        new CPT_TeamMembers();
        new CPT_Testimonials();
        new CPT_Treatments();
        new CPT_Jobs();
        new CPT_Locations();

        if(function_exists("get_network")) {
            if(\get_network()->site_id == \get_current_blog_id()) {
                $this->registerMasterSitePostTypes();
            }
        }
    }

}