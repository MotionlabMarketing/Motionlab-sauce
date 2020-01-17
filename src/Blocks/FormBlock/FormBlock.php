<?php


namespace Motionlab\Sauce\Blocks\FormBlock;

use Motionlab\Sauce\Blocks\Block;

class FormBlock extends Block
{
    public function init() {
        include(__DIR__ . '/block.php');
    }
}