<?php

namespace Motionlab\Sauce\Blocks;

class BlockPositionAuthority
{
    private static $instance;
    private $blockPosition = 1;
    private $pageId;

    private function __construct()
    {
        // disallow public instantiation
    }

    public static function instance() : BlockPositionAuthority
    {
        if(!isset(self::$instance)){
            self::$instance = new BlockPositionAuthority();
        }
        return self::$instance;
    }

    public function incrementBlockPosition()
    {
        $this->blockPosition ++;
    }

    public function getCurrentBlockPosition()
    {
        return $this->blockPosition;
    }

    public function resetBlockPosition()
    {
        $this->blockPosition = 1;
    }

    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    }

    public function getPageId()
    {
        return $this->pageId;
    }

}