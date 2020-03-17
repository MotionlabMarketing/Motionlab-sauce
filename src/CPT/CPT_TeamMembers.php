<?php

namespace Motionlab\Sauce\CPT;

class CPT_TeamMembers extends CPTBase
{

    // Set CPT options.
    protected $name       = "Team Members"; // Name of the CPT on Registration
    protected $group      = "Team Members";
    protected $singular   = "Team Member";
    protected $plural     = "Team Members";
    protected $dashicon   = "dashicons-groups";
    protected $taxonomies = [];

    public static $acf = array(
        'key' => 'group_5de532d716386',
        'title' => 'CPT - Team Member',
        'fields' => array(
            array(
                'key' => 'field_5df11ab216acf',
                'label' => 'Extra Information',
                'name' => 'team_member_extra_information',
                'type' => 'wysiwyg',
                'instructions' => 'Use this field to include extra details below the team member\'s job role, for example their GDC number.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'text',
                'media_upload' => 0,
                'toolbar' => 'full',
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'teammembers',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
            1 => 'excerpt',
            2 => 'comments',
        ),
        'active' => true,
        'description' => '',
    );

    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == strtolower(str_replace(' ', '', $this->name))) {
            return __DIR__ . "/single-teammembers.php";
        }

        return $single;
    }
}