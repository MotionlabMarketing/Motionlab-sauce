<section class="px4 py3 <?php echo $this->blockConfiguration['background_colour'] ? $this->blockConfiguration['background_colour']  : ''; ?>" <?php echo $this->getAttributeString() ?> data-aos="fade-in">
    <div class="container clearfix relative">
        <?php
            switch($this->blockConfiguration['title_tag']) :
                case 'h2':
                    echo "<h2 class='h2 ".$this->blockConfiguration['title_alignment']." heading'>" . $this->blockConfiguration['title_content'] . "</h2>";
                    break;
                case 'h3':
                    echo "<h3 class='h3 ".$this->blockConfiguration['title_alignment']." heading'>" . $this->blockConfiguration['title_content'] . "</h3>";
                    break;
                case 'h4':
                    echo "<h4 class='h4 ".$this->blockConfiguration['title_alignment']." heading'>" . $this->blockConfiguration['title_content'] . "</h4>";
                    break;
                case 'h5':
                    echo "<h5 class='h5 ".$this->blockConfiguration['title_alignment']." heading'>" . $this->blockConfiguration['title_content'] . "</h5>";
                    break;
                case 'h6':
                    echo "<h6 class='h6 ".$this->blockConfiguration['title_alignment']." heading'>" . $this->blockConfiguration['title_content'] . "</h6>";
                    break;
                default:
                    echo "<h2 class='h2 ".$this->blockConfiguration['title_alignment']." heading'>" . $this->blockConfiguration['title_content'] . "</h2>";
                    break;
            endswitch;
        ?>
    </div>
</section>
