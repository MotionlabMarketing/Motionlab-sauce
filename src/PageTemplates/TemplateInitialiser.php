<?php


namespace Motionlab\Sauce\PageTemplates;


class TemplateInitialiser
{
    public function __construct()
    {
        $this->initialiseTemplateFields();
    }

    private function initialiseTemplateFields() {
        $templateFolders = scandir(__DIR__);

        //Remove . and .. directory links
        unset($templateFolders[array_search('.', $templateFolders, true)]);
        unset($templateFolders[array_search('..', $templateFolders, true)]);

        //Loop over remaining folders to find acf.php for each block
        foreach($templateFolders as $tf) {
            if(file_exists(__DIR__ . "/$tf/acf.php")) {
                include __DIR__ . "/$tf/acf.php";

                if(function_exists('loadTemplateACF')) {
                    loadTemplateACF($templateACF);
                }

            }
        }
    }
}