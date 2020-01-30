<?php


namespace Motionlab\Sauce\CPT;

class CPTProvider
{

    public function __construct()
    {
        $this->bootstrap();
    }

    /* Initialize all global CPTs - if a CPT should only register on the master site, add their declaration to registerMasterSitePostTypes() */
    private function bootstrap()
    {
        new CPT_CallToActions();
        new CPT_CaseStudies();
        new CPT_TeamMembers();
        new CPT_Testimonials();
        new CPT_Jobs();
        new CPT_Locations();
    }

}