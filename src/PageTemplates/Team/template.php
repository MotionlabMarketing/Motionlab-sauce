<?php

use Motionlab\Sauce\PageTemplates\Team\NewsTemplate;

$templateController = new NewsTemplate();
$blocks = $templateController->getBlocks(get_the_id());

get_header();
?>

<div>
    <h1>Team Template</h1>
</div>

<?php
get_footer();


