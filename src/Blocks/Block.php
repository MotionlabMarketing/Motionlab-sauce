<?php


namespace Motionlab\TogetherDentalGroup\Blocks;

class Block
{
    public $blockConfiguration = null;
    public $buid = null;

    public function __construct( $blockConfiguration, $initialize = true ) {
        $this->blockConfiguration = $blockConfiguration;
        $this->buid = uniqid();

        if($initialize)
            $this->init();
    }

    public function getTaxonomyTerms($taxonomy, $hideEmpty = true) {
        $terms = get_terms( $taxonomy, array(
            'hide_empty' => $hideEmpty,
        ) );

        return $terms;
    }

    public function getAttachedTerms($taxonomy, $postID) {
        $terms = get_the_terms($postID, $taxonomy);
        return $terms;
    }
}