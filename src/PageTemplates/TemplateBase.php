<?php

namespace Motionlab\TogetherDentalGroup\PageTemplates;

use Motionlab\TogetherDentalGroup\Blocks\BlockProvider;

class TemplateBase
{

    private $blocks = null;

    public function init() {
        //Use this to collect any other information about the template.
        \add_filter('page_template', [$this, "generate"]);
        \add_filter('theme_page_templates', [$this, "load"], 10, 4);

        if(strpos($_SERVER['REQUEST_URI'], '/treatments/') !== FALSE) {
            \add_filter( 'rank_math/frontend/canonical', [$this, "checkForCanonical"], 10, 4 );
        }
    }

    public function checkForCanonical($canonical) {

        $httpPrefix = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';

        $canonicalURL = $httpPrefix . $_SERVER['SERVER_NAME'];
        $requestSplit = explode('/treatments', $_SERVER['REQUEST_URI']);
        $canonicalURL = $canonicalURL . "/treatments" . $requestSplit[1];

        //split the $canonicalURL to remove the practice name
        return $canonicalURL;
    }

    public function renderBlocks($post_id) {

        if($this->blocks == null) {
            $this->getBlocks($post_id);
        };

        foreach($this->blocks as $blockName => $blockSettings) {

        }

    }

    public function renderFlexibleContent($post_id) {

        if($this->blocks == null) {
            $this->getBlocks($post_id);
        }

        if(isset($this->blocks["generic_blocks"]) && count($this->blocks["generic_blocks"]) > 0) {

            $bp = new BlockProvider();

            foreach($this->blocks["generic_blocks"] as $layout) {

                $bp->load($layout);

            }
        }
    }

    public function getBlocks($post_id) {

        $this->blocks = \get_fields($post_id);

        return $this->blocks;
    }
}
