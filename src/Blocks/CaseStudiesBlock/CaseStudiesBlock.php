<?php


namespace Motionlab\Sauce\Blocks\CaseStudiesBlock;

use Motionlab\Sauce\Blocks\Block;

class CaseStudiesBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
    }

    private function getCaseStudy() {

        $postID = $this->blockConfiguration['case_studies_selected'];

        $caseStudy = \get_fields($postID);

        //Pull out the location information from the selected case study location.
        $tempPractice = array();
        if($caseStudy['case_study_practice']) {
            $tempPractice['practice_name'] = $caseStudy['case_study_practice']->post_title;
            $tempPractice['practice_link'] = \get_field('location_website_url', $caseStudy['case_study_practice']->ID);
        }

        $caseStudy['case_study_practice'] = $tempPractice;
        $caseStudy['case_study_featured_image'] = \wp_get_attachment_image_url(\get_post_thumbnail_id($postID), 'medium_large');
        $caseStudy['case_study_title'] = \get_the_title($postID);
        $caseStudy['case_study_url'] = \get_permalink($postID);

        return $caseStudy;

    }
}