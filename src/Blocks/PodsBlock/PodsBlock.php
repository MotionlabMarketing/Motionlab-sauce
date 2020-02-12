<?php


namespace Motionlab\Sauce\Blocks\PodsBlock;

use Motionlab\Sauce\Blocks\Block;

class PodsBlock extends Block
{
    public function init() {
        switch($this->blockConfiguration['pods_layout']) {
            case 'central':
                $this->layout = 'central';
                include(__DIR__ . '/central.php');
            default:
                include(__DIR__ . '/block.php');
        }
    }
}
