<?php


namespace Motionlab\Sauce\Blocks\StandardContentBlock;

use Motionlab\Sauce\Blocks\Block;

class StandardContentBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
    }
}