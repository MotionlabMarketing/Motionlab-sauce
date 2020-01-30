<?php


namespace Motionlab\Sauce\Blocks;

use Motionlab\Sauce\Blocks\AccreditationsBlock\AccreditationsBlock;
use Motionlab\Sauce\Blocks\BannerBlock\BannerBlock;
use Motionlab\Sauce\Blocks\BlogBlock\BlogBlock;
use Motionlab\Sauce\Blocks\ButtonBlock\ButtonBlock;
use Motionlab\Sauce\Blocks\CallToActionBlock\CallToActionBlock;
use Motionlab\Sauce\Blocks\CaseStudiesBlock\CaseStudiesBlock;
use Motionlab\Sauce\Blocks\FormBlock\FormBlock;
use Motionlab\Sauce\Blocks\JobVacanciesBlock\JobVacanciesBlock;
use Motionlab\Sauce\Blocks\KeyFeaturesBlock\KeyFeaturesBlock;
use Motionlab\Sauce\Blocks\LocationBlock\LocationBlock;
use Motionlab\Sauce\Blocks\LocationFinderBlock\LocationFinderBlock;
use Motionlab\Sauce\Blocks\SliderTabsBlock\SliderTabsBlock;
use Motionlab\Sauce\Blocks\SpacerBlock\SpacerBlock;
use Motionlab\Sauce\Blocks\StandardContentBlock\StandardContentBlock;
use Motionlab\Sauce\Blocks\TabsBlock\TabsBlock;
use Motionlab\Sauce\Blocks\TestimonialsBlock\TestimonialsBlock;
use Motionlab\Sauce\Blocks\TwoColumnBlock\TwoColumnBlock;
use Motionlab\Sauce\Blocks\AlternatingMediaBlock\AlternatingMediaBlock;
use Motionlab\Sauce\Blocks\MeetTheTeamBlock\MeetTheTeamBlock;

class BlockProvider
{

    protected $blocks = [
        'accreditations' => AccreditationsBlock::class,
        'alternating_media' => AlternatingMediaBlock::class,
        'banner' =>  BannerBlock::class,
        'blog'  => BlogBlock::class,
        'button' => ButtonBlock::class,
        'call_to_action' => CallToActionBlock::class,
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
