<?php

    /*  Possible breadcrumbs classes:
     *
     *  mlsbc-home
     *  mlsbc-single
     *  mlsbc-category
     *  mlsbc-post-type
     *  mlsbc-page
     *  mlsbc-parent-page
     */

?>

<?php if(isset($crumbs)): ?>
    <div class="px4 xl-px0">
        <div class="container">
            <div class="clearfix mt3 mb3 h5">
                <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="list-reset">

                    <?php
                        $len = count($crumbs);
                        $i = 1;
                        foreach($crumbs as $crumb):
                    ?>
                            <li itemprop="itemListElement" itemscope class="left <?php echo $crumb['class'] ?>"
                                itemtype="https://schema.org/ListItem">
                                <!-- Method 1 (preferred) -->
                                <a itemprop="item" href="<?php echo $crumb['href'] ?>" class="grey hover-black">
                                    <span itemprop="name"><?php echo $crumb['label'] ?></span></a>
                                <meta itemprop="position" content="<?php echo $i; ?>" />
                            </li>

                            <span class="left inline-block mx2">›</span>
                    <?php
                            $i++;
                            if($i == $len) break;
                        endforeach;
                    ?>

                    <li itemprop="itemListElement" itemscope  class="left <?php echo $crumbs[$len-1]['class'] ?>"
                        itemtype="https://schema.org/ListItem">
                        <span itemprop="name" class="opacity grey"><?php echo $crumbs[$len-1]['label'] ?></span>
                        <meta itemprop="position" content="<?php echo $i; ?>" />
                    </li>

                </ol>
            </div>    
        </div>
    </div>
<?php endif; ?>
