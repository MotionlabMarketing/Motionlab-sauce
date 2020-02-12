<?php


namespace Motionlab\Sauce\Blocks;

use Motionlab\Sauce\Blocks\BlockPositionAuthority;

class Block
{
    public $blockConfiguration = null;
    public $buid = null;

    protected $layout = 'block';

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

    public function getAttributeString()
    {
        $attributeString = 'data-block-id="%s" data-block-name="%s" data-block-position="%d" data-block-layout="%s"';
        $position = BlockPositionAuthority::instance()->getCurrentBlockPosition();
        $name = self::class;
        $pageId = BlockPositionAuthority::instance()->getPageId();
        $id = $pageId.'-'.$position;
        return sprintf($attributeString, $id, $name, $position, $this->layout);
    }
}