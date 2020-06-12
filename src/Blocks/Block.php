<?php


namespace Motionlab\Sauce\Blocks;

use Motionlab\Sauce\Blocks\BlockPositionAuthority;

class Block
{

    public static $blockAcf = array();
    public $blockConfiguration = null;
    public $buid = null;

    protected $layout = 'block';

    public function __construct($blockConfiguration, $initialize = true)
    {
        $this->blockConfiguration = $blockConfiguration;
        $this->buid = uniqid();

        if ($initialize)
            $this->init();
    }

    public function getTaxonomyTerms($taxonomy, $hideEmpty = true)
    {
        $terms = get_terms($taxonomy, array(
            'hide_empty' => $hideEmpty,
        ));

        return $terms;
    }

    public function getAttachedTerms($taxonomy, $postID)
    {
        $terms = get_the_terms($postID, $taxonomy);
        return $terms;
    }

    public function getAttributeString()
    {
        $attributeString = 'data-block-id="%s" data-block-name="%s" data-block-position="%d" data-block-layout="%s" id="%s"';
        $position = BlockPositionAuthority::instance()->getCurrentBlockPosition();
        $name = static::class;
        $pageId = BlockPositionAuthority::instance()->getPageId();
        $id = $pageId . '-' . $position;
        return sprintf($attributeString, $id, $name, $position, $this->layout, $id);
    }

    public function getBlockPositionID()
    {
        return BlockPositionAuthority::instance()->getCurrentBlockPosition();
    }

    public static function registerBlockACF()
    {
        if (function_exists('acf_add_local_field_group')) :
            acf_add_local_field_group(static::$blockAcf);
        endif;
    }

    public static function getAcf()
    {
        return static::$blockAcf;
    }
}
