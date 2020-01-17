<?php


namespace Motionlab\Sauce\Blocks\BannerBlock;

use Motionlab\Sauce\Blocks\Block;

class BannerBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
    }
}