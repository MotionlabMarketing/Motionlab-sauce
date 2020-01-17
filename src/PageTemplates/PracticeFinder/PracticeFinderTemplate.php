<?php

namespace Motionlab\Sauce\PageTemplates\PracticeFinder;

use Motionlab\Sauce\PageTemplates\TemplateBase;

class PracticeFinderTemplate extends TemplateBase
{

    private $locations;
    public $latLng = ['lat' => '52.3555', 'lng' => '-1.174300'];
    public $searchTypeString = "search";

    public function init() {
        //Use this to collect any other information about the template.
        \add_filter('page_template', [$this, "generate"]);
        \add_filter('theme_page_templates', [$this, "load"], 10, 4);
        \add_filter('wp_head', [$this, 'addGoogleMapsScript'], 10, 4);
    }

    public function load($post_templates, $wp_theme, $post, $post_type) {
        $post_templates['practice-finder-template.php'] = __('Practice Finder');

        return $post_templates;
    }

    public function generate( $page_template ) {
        if(get_page_template_slug() == "practice-finder-template.php") {
            $page_template = __DIR__ . "/template.php";
        }

        return $page_template;
    }

    public function addGoogleMapsScript() {
        echo '<script async defer src="https://maps.googleapis.com/maps/api/js?key='.GOOGLE_MAPS_KEY.'&callback=initMap"> </script>';
    }

    public function searchByPostcode() {
        $locations = $this->getLocations();

        //Get entered postcode (if set) and sort location results
        if(isset($_GET['p'])) {
            if( $this->isPostcodeValid( $_GET['p'] ) ) {
                $postcodeData = json_decode($this->fetchPostcodeInformation($_GET['p']));
                if($postcodeData->status == 200) {

                    $coords = array('lat' => $postcodeData->result->latitude, 'lng' => $postcodeData->result->longitude);
                    $this->latLng = $coords;
                    $locations = $this->sortByDistance($locations, $coords);
                    $this->searchTypeString = "postcode";
                }
            } else {
                return $this->searchByTown( $_GET['p'], $locations );
            }
        }

        return $this->getLocationMaps($locations);
    }

    public function searchByTown( $town = NULL , $locations = NULL ) {
        $placesData = json_decode($this->fetchPlacesInformation($_GET['p']));

        if($placesData->status == 200 && count( $placesData->result ) > 0 ) {
            $coords = array('lat' => $placesData->result[0]->latitude, 'lng' => $placesData->result[0]->longitude);
            $this->latLng = $coords;
            $locations = $this->sortByDistance($locations, $coords);
            $this->searchTypeString = "search";
        }

        return $this->getLocationMaps($locations);
    }

    public function isPostcodeValid($postcode)
    {
        $postcode = preg_replace('/\s/', '', $postcode);

        $postcode = strtoupper($postcode);

        if(preg_match("/^[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}$/",$postcode)
            || preg_match("/^[A-Z]{1,2}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{2}$/",$postcode)
            || preg_match("/^GIR0[A-Z]{2}$/",$postcode))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function getLocationMaps( $locations ) {
        $folderName = "mapimagecache";
        $folderPath = wp_upload_dir()['basedir']."/".$folderName;
        $maxCacheAge = 7776000; //90 days
        $minFileSize = 500; //to make sure an image has been saved

        if( !is_dir( $folderPath ) ) {
            mkdir( $folderPath, 0777 );
        }

        foreach( $locations as &$location ) {
            $apiUrl = "https://maps.googleapis.com/maps/api/staticmap?center=".urlencode( $location['name']." ".$location['postcode'] )."&zoom=".GOOGLE_MAPS_PRACTICE_FINDER_ZOOM."&size=600x400&maptype=roadmap&markers=color:purple%7Clabel:T%7C".urlencode($location['name']." ".$location['postcode'])."&style=feature:poi|visibility:off&key=".GOOGLE_MAPS_KEY_CURL;
            $filename = md5($apiUrl).".png";
            $fullPath = $folderPath."/".$filename;
            $age = time() - filemtime( $fullPath );

            if( !is_file($fullPath)
                || ( is_file($fullPath) &&
                    ( ( $age > $maxCacheAge )
                        || filesize( $fullPath ) < $minFileSize ) ) ) {
                file_put_contents( $folderPath."/".$filename, file_get_contents( $apiUrl ) );
            }

            $location['map'] = $filename;
            $location['mapUrl'] = wp_upload_dir()['baseurl']."/".$folderName."/".$filename;
        }

        return $locations;
    }

    private function getLocations() {
        $args = array(
            'post_type' => 'locations',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $query = new \WP_Query($args);

        $locations = [];
        foreach($query->posts as $location) {
            $_location =  [];
            $_location['name'] = \get_the_title($location->ID);
            $_location['lat'] = \get_field('location_latitude', $location->ID);
            $_location['lng'] = \get_field('location_longitude', $location->ID);
            $_location['address'] = \get_field('location_address', $location->ID);
            $_location['postcode'] = \get_field('location_postcode', $location->ID);
            $_location['email'] = \get_field('location_email_address', $location->ID);
            $_location['phone'] = \get_field('location_phone_number', $location->ID);
            $_location['website'] = \get_field('location_website_url', $location->ID);
            $_location['opening_times'] = \get_field('location_opening_times', $location->ID);

            $locations[] = $_location;
        }

        return $locations;
    }

    private function fetchPlacesInformation ($postcode) {
        $base_url = PLACES_URL;
        $full_url = $base_url . "?q=" . urlencode(trim(str_replace(" ","",$postcode)));

        $ch = curl_init($full_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    private function fetchPostcodeInformation ($postcode) {
        $base_url = POSTCODES_URL;
        $full_url = $base_url . urlencode(trim(str_replace(" ","",$postcode)));

        $ch = curl_init($full_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    private function sortByDistance($installers, $latlng) {

        $coords = $latlng;
        $returnInstallers = array();
        $distances = array();

        foreach($installers as $installer) {
            $distance = $this->distance($coords['lat'], $coords['lng'], $installer['lat'], $installer['lng']);
            if($distance <= 0) {
                $distance = 0;
            }
            $installer['distance'] = $distance;
            $returnInstallers[] = $installer;
            $distances[] = $distance;
        }

        array_multisort($distances, SORT_ASC, $returnInstallers);
        return $returnInstallers;
    }

    private function distance($lat1, $lon1, $lat2, $lon2) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad(floatval($lat1))) * sin(deg2rad(floatval($lat2))) +  cos(deg2rad(floatval($lat1))) * cos(deg2rad(floatval($lat2))) * cos(deg2rad(floatval($theta)));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.153;
        return round($miles,2);
    }
}