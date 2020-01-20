<?php


namespace Motionlab\Sauce\Blocks;


class BlockInitialiser
{
    public function __construct()
    {
        $this->initialiseBlocks();
    }

    private function initialiseBlocks() {
        $blockFolders = scandir(__DIR__);

        //Remove . and .. directory links
        unset($blockFolders[array_search('.', $blockFolders, true)]);
        unset($blockFolders[array_search('..', $blockFolders, true)]);

        //Loop over remaining folders to find acf.php for each block
        foreach($blockFolders as $bf) {
            if(file_exists(__DIR__ . "/$bf/acf.php")) {
                include __DIR__ . "/$bf/acf.php";
            }
        }
    }
}