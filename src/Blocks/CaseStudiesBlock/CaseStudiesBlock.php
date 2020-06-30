<?php


namespace Motionlab\Sauce\Blocks\CaseStudiesBlock;

use Motionlab\Sauce\Blocks\Block;

class CaseStudiesBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5dd6c4c7e7407',
        'title' => 'Block - Case Studies',
        'fields' => array(
            array(
                'key' => 'field_5dfb9c1357743',
                'label' => 'Background Colour',
                'name' => 'background_colour',
                'type' => 'clone',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'clone' => array(
                    0 => 'group_5dfb879fe9a51',
                ),
                'display' => 'seamless',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ),
            array(
                'key' => 'field_5dd6c4d303952',
                'label' => 'Selected',
                'name' => 'case_studies_selected',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'casestudies',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 1,
                'return_format' => 'object',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => false,
        'description' => '',
    );

    public function init() {
        include(__DIR__ . '/block.php');
    }

    private function getCaseStudies() {

        $postIDs = $this->blockConfiguration['case_studies_selected'];

        $caseStudies = [];

        foreach($postIDs as $postID) {
            $caseStudy = \get_fields($postID);

            //Pull out the location information from the selected case study location.
            $tempLocation = array();
            if($caseStudy['case_study_location']) {
                $tempLocation['location_name'] = $caseStudy['case_study_location']->post_title;
                $tempLocation['location_link'] = \get_field('location_website_url', $caseStudy['case_study_location']->ID);
            }

            $caseStudy['case_study_location'] = $tempLocation;
            $caseStudy['case_study_featured_image'] = \wp_get_attachment_image_url(\get_post_thumbnail_id($postID), 'medium_large');
            $caseStudy['case_study_title'] = \get_the_title($postID);
            $caseStudy['case_study_url'] = \get_permalink($postID);

            $caseStudies[] = $caseStudy;
        }

        return $caseStudies;

    }
}