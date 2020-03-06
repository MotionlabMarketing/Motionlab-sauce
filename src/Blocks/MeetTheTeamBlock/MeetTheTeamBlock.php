<?php


namespace Motionlab\Sauce\Blocks\MeetTheTeamBlock;

use Motionlab\Sauce\Blocks\Block;

class MeetTheTeamBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5df0c4f993f2e',
        'title' => 'Block - Meet The Team',
        'fields' => array(
            array(
                'key' => 'field_5dfb9f54a546c',
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
                'key' => 'field_f6a5c009a6f20',
                'label' => 'Layout',
                'name' => 'meet_the_team_layout',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'filterable-list' => 'Filterable List',
                    'team-with-content' => 'Team with Content',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5df0c60d4793f',
                'label' => 'Title',
                'name' => 'team_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_bb46b59f0af50',
                'label' => 'Content',
                'name' => 'team_content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_f6a5c009a6f20',
                            'operator' => '==',
                            'value' => 'team-with-content',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_58b0893866862',
                'label' => 'Page Link',
                'name' => 'team_page_link',
                'type' => 'link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_0274dba9b347b',
                'label' => 'Selected Team Members',
                'name' => 'team_members_selected',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_f6a5c009a6f20',
                            'operator' => '==',
                            'value' => 'team-with-content',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'teammembers',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                    1 => 'taxonomy',
                ),
                'elements' => '',
                'min' => 0,
                'max' => 6,
                'return_format' => 'object',
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

    private $teamMembers = [];

    public function init()
    {
        $this->loadTeamMembers();
        switch($this->blockConfiguration['meet_the_team_layout']) {
            case 'team-with-content':
                include(__DIR__ . '/team-with-content.php');
                break;
            default:
                include(__DIR__ . '/block.php');
        }
    }

    private function loadTeamMembers()
    {
        $teamMembers = new \WP_Query(array(
            'post_type' => 'teammembers',
            'post_status' => 'publish',
            'posts_per_page' => -1
        ));

        $membersToPrint = [];
        foreach ($teamMembers->posts as $post) {
            $member = [];

            $member["name"] = \get_the_title($post->ID);
            $member["details"] = \get_field('team_member_extra_information', $post->ID);

            $role = \get_the_terms($post->ID, "roles");
            if ($role && $role[0]) {
                $role = $role[0]->name;
            }
            $member["role"] = $role;

            $image = \wp_get_attachment_image_url(\get_post_thumbnail_id($post->ID), 'thumbnail');

            if ($image) {
                $member["image"] = $image;
            } else {
                $member["image"] = \get_template_directory_uri() . "/dist/images/avatar.png";
            }

            $membersToPrint[] = $member;
        }

        $this->teamMembers = $membersToPrint;
    }

    public function getTeamMembers() {
        return $this->teamMembers;
    }
}
