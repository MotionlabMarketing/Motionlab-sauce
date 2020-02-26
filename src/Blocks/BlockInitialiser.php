<?php


namespace Motionlab\Sauce\Blocks;


class BlockInitialiser
{

    private $blockProvider;

    public function __construct()
    {
        //We are going to use this to grab the list of registered blocks.
        $this->blockProvider = new BlockProvider();
        $this->initialiseBlocks();
    }

    private function initialiseBlocks() {

        foreach($this->blockProvider->getBlocks() as $blockName => $blockClass ) {
            (new $blockClass(null, false))->registerBlockACF();
        }

    }
}