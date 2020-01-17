<?php


namespace Motionlab\TogetherDentalGroup\Blocks\StandardContentBlock;

use Motionlab\TogetherDentalGroup\Blocks\Block;

class StandardContentBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
    }
}