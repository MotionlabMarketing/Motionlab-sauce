<?php


namespace Motionlab\Sauce\Blocks\LocationFinderBlock;

use Motionlab\Sauce\Blocks\Block;

class LocationFinderBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
        $this->registerImageSizes();
    }

    private function registerImageSizes() {
        \add_image_size( 'location-block-image', 220, 180 );
    }
}