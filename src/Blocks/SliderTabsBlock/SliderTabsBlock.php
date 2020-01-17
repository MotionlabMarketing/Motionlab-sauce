<?php


namespace Motionlab\TogetherDentalGroup\Blocks\SliderTabsBlock;

use Motionlab\TogetherDentalGroup\Blocks\Block;

class SliderTabsBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
        $this->registerImageSizes();
    }

    private function registerImageSizes() {
        //\add_image_size( 'location-block-image', 220, 180 );
    }
}