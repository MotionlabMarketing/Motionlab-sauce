<?php


namespace Motionlab\Sauce\Blocks\JobVacanciesBlock;

use Motionlab\Sauce\Blocks\Block;
use Carbon\Carbon;

class JobVacanciesBlock extends Block
{

    private $jobs = [];
    public $maxPages = 1;

    public function init() {
        //Load in jobs before we render the template.
        include(__DIR__ . '/block.php');
    }

    public function loadJob($jobID) {

    }

    public function getJobs() {
        return $this->jobs;
    }

    //Load jobs into class
    public function loadJobs() {

        $page = get_query_var( 'paged' ) ?? 1;

        $queryArgs = array(
            'post_type' => 'jobs',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'paged' => $page,
            'meta_key' => 'job_expiry_date',
            'tax_query' => array(
                'relation' => 'AND'
            ),
            'meta_query' => array(
                'relation' => 'AND'
            )
        );

        //Exclude expired jobs
        $queryArgs['meta_query'][] = array(
            'relation' => 'OR',
            array(
                'key' => 'job_expiry_date',
                'value' => date('Ymd'),
                'type' => 'DATE',
                'compare' => '>='
            ),
            array(
                'key' => 'job_expiry_date',
                'value' => "",
                'compare' => "="
            ),
        );

        //Filter by Position Type
        if(isset($_GET['pt']) && $_GET['pt'] != "") {
            $queryArgs['tax_query'][] = array(
                'taxonomy' => 'position-types',
                'field' => 'slug',
                'terms' => array($_GET['pt'])
            );
        }

        //Filter by Job Type
        if(isset($_GET['jt']) && $_GET['jt'] != "") {
            $queryArgs['tax_query'][] = array(
                'taxonomy' => 'job-types',
                'field' => 'slug',
                'terms' => array($_GET['jt'])
            );
        }

        //Filter by location
        if(isset($_GET['lid']) && $_GET['lid'] != "") {
           $queryArgs['meta_query'][] = array(
               'key' => 'job_location',
               'value' => $_GET['lid'],
               'compare' => '='
           );
        }

        $jobs = new \WP_Query($queryArgs);

        if(is_object($jobs) && $jobs->posts) {

            $this->maxPages = $jobs->max_num_pages;

            foreach($jobs->posts as $job) {

                $_job = [];
                $_job['title'] = \get_field('job_role_title', $job->ID);
                $_job['url'] = \get_permalink($job->ID);

                $locationID = \get_field('job_location', $job->ID);
                if($locationID) {
                    $_job['location_name'] = \get_the_title($locationID);
                    $_job['location_url'] = \get_field('location_website_url', $locationID);
                }

                $_job['tags'] = [];
                $tags = \get_the_terms($job->ID, 'job-types');
                foreach($tags as $tag) {
                    $_job['tags'][] = $tag->name;
                }

                $this->jobs[] = $_job;
            }
        }
    }
}