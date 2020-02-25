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
        include(__DIR__ . '/block.php');
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
