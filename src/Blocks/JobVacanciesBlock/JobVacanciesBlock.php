<?php


namespace Motionlab\Sauce\Blocks\JobVacanciesBlock;

use Motionlab\Sauce\Blocks\Block;
use Carbon\Carbon;

class JobVacanciesBlock extends Block
{

    public static $blockAcf = array(
        'key' => 'group_5df0cf742b128',
        'title' => 'Block - Job Vacancies',
        'fields' => array(
            array(
                'key' => 'field_5dfb9d18513f8',
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
                'key' => 'field_5df0cf8e2ae5e',
                'label' => 'Latest or Selected',
                'name' => 'job_vacancies_latest_or_selected',
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
                    'latest' => 'Latest',
                    'selected' => 'Selected',
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
                'key' => 'field_5df0cfb92ae5f',
                'label' => 'Selected Vacancies',
                'name' => 'job_vacancies_selected_vacancies',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5df0cf8e2ae5e',
                            'operator' => '==',
                            'value' => 'selected',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'jobs',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                    1 => 'taxonomy',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'id',
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