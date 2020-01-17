<?php


namespace Motionlab\TogetherDentalGroup\Blocks\LocationBlock;

use Motionlab\TogetherDentalGroup\Blocks\Block;

class LocationBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
    }

    private function getLocationDetails($locationID) {

        $location = [];

        if($locationID) {
            $location['name'] = \get_the_title($locationID);
            $location['address'] = \get_field('location_address', $locationID);
            $location['postcode'] = \get_field('location_postcode', $locationID);
            $location['opening_times'] = \get_field('location_opening_times', $locationID);
            $location['email'] = \get_field('location_email_address', $locationID);
            $location['phone'] = \get_field('location_phone_number', $locationID);
        } else {
            $location['name'] = \get_field('options_practice_name', 'option');
            $location['address'] = \get_field('options_practice_address', 'option');
            $location['postcode'] = \get_field('options_practice_postcode', 'option');
            $location['opening_times'] = \get_field('option_opening_hours', 'option');
            $location['email'] = \get_field('options_contact_email', 'option');
            $location['phone'] = \get_field('options_contact_phone', 'option');
        }

        return $location;
    }
}