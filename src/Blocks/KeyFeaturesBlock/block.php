<?php
/*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*
    Background Color: $this->blockConfiguration['background_colour'];
    Features: $this->blockConfiguration['features_feature'];
    Each feature contains:
        Icon: $feature['feature_icon']
        Type (standard/custom): $feature['icon_type']
        Icon Image: $feature['icon_image']
        Content: $feature['feature_content']
*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*|Block Settings|~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*~*/

    switch($this->blockConfiguration['features_layout']){
        case 'carousel':
            include(__DIR__ . '/carousel.php');
            break;
        default:
            include(__DIR__ . '/standard.php');
            break;
    }

?>