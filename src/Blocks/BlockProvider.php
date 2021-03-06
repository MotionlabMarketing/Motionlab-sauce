<?php


namespace Motionlab\Sauce\Blocks;

use Motionlab\Sauce\Blocks\AccreditationsBlock\AccreditationsBlock;
use Motionlab\Sauce\Blocks\BackgroundColour\BackgroundColour;
use Motionlab\Sauce\Blocks\BannerBlock\BannerBlock;
use Motionlab\Sauce\Blocks\BlogBlock\BlogBlock;
use Motionlab\Sauce\Blocks\BreadcrumbsBlock\BreadcrumbsBlock;
use Motionlab\Sauce\Blocks\ButtonBlock\ButtonBlock;
use Motionlab\Sauce\Blocks\CallToActionBlock\CallToActionBlock;
use Motionlab\Sauce\Blocks\CaseStudiesBlock\CaseStudiesBlock;
use Motionlab\Sauce\Blocks\CategoryListingsBlock\CategoryListingsBlock;
use Motionlab\Sauce\Blocks\FAQBlock\FAQBlock;
use Motionlab\Sauce\Blocks\FormBlock\FormBlock;
use Motionlab\Sauce\Blocks\GalleryBlock\GalleryBlock;
use Motionlab\Sauce\Blocks\JobVacanciesBlock\JobVacanciesBlock;
use Motionlab\Sauce\Blocks\KeyFeaturesBlock\KeyFeaturesBlock;
use Motionlab\Sauce\Blocks\LocationBlock\LocationBlock;
use Motionlab\Sauce\Blocks\LocationFinderBlock\LocationFinderBlock;
use Motionlab\Sauce\Blocks\PackagesBlock\PackagesBlock;
use Motionlab\Sauce\Blocks\PodsBlock\PodsBlock;
use Motionlab\Sauce\Blocks\SiteOptions\SiteOptions;
use Motionlab\Sauce\Blocks\SliderTabsBlock\SliderTabsBlock;
use Motionlab\Sauce\Blocks\SpacerBlock\SpacerBlock;
use Motionlab\Sauce\Blocks\SpecificationsBlock\SpecificationsBlock;
use Motionlab\Sauce\Blocks\StandardContentBlock\StandardContentBlock;
use Motionlab\Sauce\Blocks\TabsBlock\TabsBlock;
use Motionlab\Sauce\Blocks\TestimonialsBlock\TestimonialsBlock;
use Motionlab\Sauce\Blocks\TitleBlock\TitleBlock;
use Motionlab\Sauce\Blocks\TwoColumnBlock\TwoColumnBlock;
use Motionlab\Sauce\Blocks\AlternatingMediaBlock\AlternatingMediaBlock;
use Motionlab\Sauce\Blocks\MeetTheTeamBlock\MeetTheTeamBlock;

class BlockProvider
{

    private static $blocks = [
        'faqs' => FAQBlock::class, //This is first alphabetically as the block has been renamed as "Accordion"
        'accreditations' => AccreditationsBlock::class,
        'alternating_media' => AlternatingMediaBlock::class,
        'banner' =>  BannerBlock::class,
        'blog'  => BlogBlock::class,
        'breadcrumbs' => BreadcrumbsBlock::class,
        'button' => ButtonBlock::class,
        'call_to_action' => CallToActionBlock::class,
        'case_studies' => CaseStudiesBlock::class,
        'category_listings' => CategoryListingsBlock::class,
        'form' => FormBlock::class,
        'gallery' => GalleryBlock::class,
        'job_vacancies' => JobVacanciesBlock::class,
        'key_features' => KeyFeaturesBlock::class,
        'location' => LocationBlock::class,
        'location_finder' => LocationFinderBlock::class,
        'meet_the_team' => MeetTheTeamBlock::class,
        'packages' => PackagesBlock::class,
        'pods' => PodsBlock::class,
        'slider_and_tabs' => SliderTabsBlock::class,
        'spacer' => SpacerBlock::class,
        'specifications' => SpecificationsBlock::class,
        'standard_content' => StandardContentBlock::class,
        'tabs' => TabsBlock::class,
        'testimonials' => TestimonialsBlock::class,
        'title' => TitleBlock::class,
        'two_columns' => TwoColumnBlock::class,

        'background_colour' => BackgroundColour::class,
        'site_options' => SiteOptions::class,
    ];

    private static $helperBlocks = [

    ];

    public function load(array $layout) {

        $layoutName = null;
        if(isset($layout["acf_fc_layout"]))
            $layoutName = $layout["acf_fc_layout"];

        if(isset(self::$blocks[$layoutName])){
            new self::$blocks[$layoutName]($layout);
        } else {
            echo "Missing block : " . $layoutName;
        }


    }

    /**
     * @param string $blockSlug
     * @param Block $classOverride
     *
     * This will be used to overwrite Sauce blocks with blocks in the child theme. This should be called with
     * the slug of the block to be replaced (list of blocks in $this->blocks) and the class of the block.
     */
    public static function overrideBlockClass(string $blockSlug, string $classOverride) {

        if($classOverride === "")
            return 0;

        $returnFlag = 1; //Added new
        if(isset(self::$blocks[$blockSlug]))
            $returnFlag = 2; // Edited existing

        self::$blocks[$blockSlug] = $classOverride;

        return $returnFlag;

    }

    public function getBlocks() {
        return self::$blocks;
    }
}
