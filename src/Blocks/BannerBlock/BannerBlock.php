<?php


namespace Motionlab\TogetherDentalGroup\Blocks\BannerBlock;

use Motionlab\TogetherDentalGroup\Blocks\Block;

class BannerBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
    }
}