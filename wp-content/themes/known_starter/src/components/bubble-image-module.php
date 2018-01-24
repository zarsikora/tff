<?php

$greyBg = get_sub_field('grey_background');
$image = get_sub_field('main_image');
$imagePos = get_sub_field('image_position');
$moduleTitle = get_sub_field('module_title');
$blockQuote = get_sub_field('block_quote');
$byline = get_sub_field('quote_byline');
$cta = get_sub_field('cta_option');



echo '<div id="bubble-image-module">';
  echo '<div id="inner" >';
    if($image){ ?>
      <div id="bubble-image-wrapper" class="<?php if($imagePos === 'Left'){echo 'left';}?>"> <?php
      echo wp_get_attachment_image($image, 'full');
      echo '</div> <!-- #bubble-image-wrapper -->';
    } ?>

    <div id="text-wrapper" class="<?php if($imagePos === 'Left'){echo 'right';}?>"> <?php

      if($moduleTitle){ ?>
        <p class="title"> <?php
        echo $moduleTitle;
        echo '</p>';
      }

      if($blockQuote){
        echo '<div id="block-quote">'. $blockQuote .'</div>';
      }

      if($byline){
        echo '<p id="byline">'. $byline .'</p>';
      }

      if($cta){
        include('button.php');
      }

    echo '</div><!-- #text-wrapper -->';
    echo '</div><!-- inner -->';

echo '</div> <!-- #bubble-image-module -->';

?>