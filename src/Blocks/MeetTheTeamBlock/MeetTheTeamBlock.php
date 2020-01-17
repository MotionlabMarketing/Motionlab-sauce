<?php


namespace Motionlab\TogetherDentalGroup\Blocks\MeetTheTeamBlock;

use Motionlab\TogetherDentalGroup\Blocks\Block;

class MeetTheTeamBlock extends Block
{

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
