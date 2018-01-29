<?php

$image = get_sub_field('image');
$address = get_sub_field('address');
$phone = get_sub_field('telephone');
$email = get_sub_field('email');

echo '<div id="contact-information-module">';
  echo '<div class="inner" >';
    if($image){
      echo '<div id="bubble-image-wrapper">';
      echo wp_get_attachment_image($image, 'full');
      echo '</div> <!-- #bubble-image-wrapper -->';
    }

    echo '<div id="text-wrapper">';

      echo '<p class="title">Contact Information</p>';

      if($address){
        echo '<div class="address">'. $address .'</div>';
      }

      if($phone){
        echo '<p class="phone">T: '. $phone .'</p>';
      }

      if($email){
        echo '<a class="email" href="mailto:'. $email .'">'. $email .'</a>';
      }

    echo '</div><!-- #text-wrapper -->';
    echo '</div><!-- inner -->';

echo '</div> <!-- #contact-information-module -->';


?>