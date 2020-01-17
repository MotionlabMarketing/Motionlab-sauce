<?php


namespace Motionlab\Sauce\Blocks\ButtonBlock;

use Motionlab\Sauce\Blocks\Block;

class ButtonBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
    }
}