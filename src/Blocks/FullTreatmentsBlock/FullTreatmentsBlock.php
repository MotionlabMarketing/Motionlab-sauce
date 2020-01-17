<?php


namespace Motionlab\Sauce\Blocks\FullTreatmentsBlock;

use Motionlab\Sauce\Blocks\Block;

class FullTreatmentsBlock extends Block
{
    private $treatments = [];

    public function init() {
        if(!empty($this->blockConfiguration['treatments_full_limit_categories'])) {
            include(__DIR__ . '/block.php');
        } else {
            include(__DIR__ . '/block-full-listing.php');
        }
    }

    public function getTreatmentsByTerm() {

        $_sectors = $this->getTaxonomyTerms('treatment-sectors', true);
        $sectors = [];
        if(!empty($this->blockConfiguration['treatments_full_limit_categories'])) {
            foreach($this->blockConfiguration['treatments_full_limit_categories'] as $selectedSector) {
                $sec = get_term_by('id', $selectedSector, 'treatment-sectors');
                $sectors[] = $sec;
            }
        } else {
            $sectors = $_sectors;
        }

        foreach($sectors as $sector) {

            $this->treatments[$sector->name] = [];

            $this->treatments[$sector->name]['treatments'] = [];
            $this->treatments[$sector->name]['taxonomy'] = [];

            $sectorImage = \get_field( 'treatment_sector_image', $sector);
            $sectorImage = $sectorImage['sizes']['medium'];

            $this->treatments[$sector->name]['taxonomy']['image'] = $sectorImage;
            $this->treatments[$sector->name]['taxonomy']['description'] = $sector->description;
            $this->treatments[$sector->name]['taxonomy']['page_link'] = \get_field( 'treatment_sector_page', $sector);

            $args = array(
                'post_type' => 'treatments',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'treatment-sectors',
                        'field' => 'slug',
                        'terms' => array( $sector->slug )
                    )
                )
            );

            $query = new \WP_Query($args);

            if(is_object($query) && $query->posts) {
                foreach($query->posts as $treatment) {
                    $_treatment = [];
                    $_treatment['name'] = \get_the_title($treatment->ID);
                    $_treatment['link'] = \get_the_permalink($treatment->ID);

                    $tags = $this->getAttachedTerms('tags', $treatment->ID);

                    $_treatment['tags'] = [];
                    if(is_array($tags)) {
                        foreach($tags as $tag) {
                            $_treatment['tags'][] = $tag->name;
                        }
                    }

                    $this->treatments[$sector->name]['treatments'][] = $_treatment;
                }
            }
        }

        return $this->treatments;
    }
}
