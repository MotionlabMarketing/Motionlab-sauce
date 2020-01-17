<?php


namespace Motionlab\TogetherDentalGroup\Blocks;

use Motionlab\TogetherDentalGroup\Blocks\AccreditationsBlock\AccreditationsBlock;
use Motionlab\TogetherDentalGroup\Blocks\BannerBlock\BannerBlock;
use Motionlab\TogetherDentalGroup\Blocks\BlogBlock\BlogBlock;
use Motionlab\TogetherDentalGroup\Blocks\ButtonBlock\ButtonBlock;
use Motionlab\TogetherDentalGroup\Blocks\CaseStudiesBlock\CaseStudiesBlock;
use Motionlab\TogetherDentalGroup\Blocks\FormBlock\FormBlock;
use Motionlab\TogetherDentalGroup\Blocks\JobVacanciesBlock\JobVacanciesBlock;
use Motionlab\TogetherDentalGroup\Blocks\KeyFeaturesBlock\KeyFeaturesBlock;
use Motionlab\TogetherDentalGroup\Blocks\LocationBlock\LocationBlock;
use Motionlab\TogetherDentalGroup\Blocks\LocationFinderBlock\LocationFinderBlock;
use Motionlab\TogetherDentalGroup\Blocks\SliderTabsBlock\SliderTabsBlock;
use Motionlab\TogetherDentalGroup\Blocks\SpacerBlock\SpacerBlock;
use Motionlab\TogetherDentalGroup\Blocks\StandardContentBlock\StandardContentBlock;
use Motionlab\TogetherDentalGroup\Blocks\TabsBlock\TabsBlock;
use Motionlab\TogetherDentalGroup\Blocks\TestimonialsBlock\TestimonialsBlock;
use Motionlab\TogetherDentalGroup\Blocks\TreatmentsBlock\TreatmentsBlock;
use Motionlab\TogetherDentalGroup\Blocks\FullTreatmentsBlock\FullTreatmentsBlock;
use Motionlab\TogetherDentalGroup\Blocks\TwoColumnBlock\TwoColumnBlock;
use Motionlab\TogetherDentalGroup\Blocks\AlternatingMediaBlock\AlternatingMediaBlock;
use Motionlab\TogetherDentalGroup\Blocks\MeetTheTeamBlock\MeetTheTeamBlock;

class BlockProvider
{

    protected $blocks = [
        'accreditations' => AccreditationsBlock::class,
        'alternating_media' => AlternatingMediaBlock::class,
        'banner' =>  BannerBlock::class,
        'blog'  => BlogBlock::class,
        'button' => ButtonBlock::class,
        'case_studies' => CaseStudiesBlock::class,
        'form' => FormBlock::class,
        'job_vacancies' => JobVacanciesBlock::class,
        'key_features' => KeyFeaturesBlock::class,
        'location' => LocationBlock::class,
        'location_finder' => LocationFinderBlock::class,
        'meet_the_team' => MeetTheTeamBlock::class,
        'slider_and_tabs' => SliderTabsBlock::class,
        'spacer' => SpacerBlock::class,
        'standard_content' => StandardContentBlock::class,
        'tabs' => TabsBlock::class,
        'testimonials' => TestimonialsBlock::class,
        'treatments' => TreatmentsBlock::class,
        'treatments_full' => FullTreatmentsBlock::class,
        'two_columns' => TwoColumnBlock::class,
    ];

    public function load(array $layout) {

        $layoutName = null;
        if(isset($layout["acf_fc_layout"]))
            $layoutName = $layout["acf_fc_layout"];

        if(isset($this->blocks[$layoutName])){
            new $this->blocks[$layoutName]($layout);
        } else {
            echo "Missing block : " . $layoutName;
        }


    }
}
