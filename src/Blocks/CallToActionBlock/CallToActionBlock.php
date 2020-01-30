<?php

namespace Motionlab\Sauce\Blocks\CallToActionBlock;

use Motionlab\Sauce\Blocks\Block;
use Motionlab\Sauce\CPT\CPT_CallToActions;

class CallToActionBlock extends Block
{

    public function __construct($blockConfiguration, $initialize = true)
    {
        parent::__construct($blockConfiguration, $initialize);
    }

    public function init()
    {
        include(__DIR__ . '/block.php');
    }

    public static function unleash(int $post_id)
    {
        $fields = get_fields($post_id);
        return new CPT_CallToActions($fields, true);
    }

}
