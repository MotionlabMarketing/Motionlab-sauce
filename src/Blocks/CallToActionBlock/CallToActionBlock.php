<?php

namespace Motionlab\Sauce\Blocks\CallToActionBlock;

use Motionlab\Sauce\Blocks\Block;

class CallToActionBlock extends Block
{

    private $callToAction;

    public function __construct($blockConfiguration, $initialize = true)
    {
        parent::__construct($blockConfiguration, false);
        if($blockConfiguration !== null){
            $this->setCallToAction($this->blockConfiguration['call_to_action']);
        }
        if($initialize){
            $this->init();
        }
    }

    public function init()
    {
        include(__DIR__ . '/block.php');
    }

    public function setCallToAction(int $post_id)
    {
        $this->callToAction = get_fields($post_id);
    }

    public static function unleash(int $post_id)
    {
        $instance = new CallToActionBlock(null,false);
        $instance->setCallToAction($post_id);
        $instance->init();
        return $instance;
    }

}
