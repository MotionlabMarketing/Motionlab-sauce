<?php

namespace Motionlab\Sauce\Blocks\BreadcrumbsBlock;

use Motionlab\Sauce\Blocks\Block;
use Motionlab\Sauce\Components\Breadcrumbs;

class BreadcrumbsBlock extends Block
{

    public function init()
    {
        $crumbs = new Breadcrumbs();
        $crumbs->render();
    }

    // added for consistency
    public static function unleash()
    {
        $crumbs = new Breadcrumbs();
        $crumbs->render();
    }

}