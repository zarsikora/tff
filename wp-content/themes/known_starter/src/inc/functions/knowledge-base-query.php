<?php

function knowledge_base_query() {

  $offset = $_GET['offset'];
  $current_pages = ($offset * 6)+6;

  $data = array(
    'currentPages' => $current_pages,
    'offset' => $offset
  );

  $args = array(
    'post_type' => 'resource',
     'orderby' => 'date',
     'order' => 'DESC',
     'posts_per_page' => 6,
     'offset' => ($offset*6),
     //'post__not_in' => $featuredPostIds,
     'post_status' => 'publish'
  );

  $resourcequery = new WP_Query( $args );

  $total = $resourcequery->found_posts;

    if ( $resourcequery->have_posts() ) :

      $i = 0;

      while( $resourcequery->have_posts() ): $resourcequery->the_post();

        //setup_postdata($resourcequery);
        $image = get_field('cover_photo');
        $title = get_the_title();
        $permalink = get_permalink();
        $pdf = get_field('pdf');
        $totalCounter = 0;
        $total = wp_count_posts('resource')->publish;

        if($i == 0){
          $html .= '<div class="row">';
        }

        $html .= '<div class="article-wrapper">';
        $html .= '<a href="'. $permalink .'">';
        if($image){
          $html .= wp_get_attachment_image($image);
        };
        $html .= '</a>';
        $html .= '<div class="text-wrapper">';
        $html .= '<p class="header">'. $title .'</p>';

        $html .= '<div class="button">';
        $html .= '<a href="'. $permalink .'">';
          if($pdf){
            $html .= 'Download PDF';
          } else {
            $html .= 'Read Article';
          }
        $html .= '</a>';
        $html .= '</div><!-- .button -->';

        $html .= '</div> <!-- .text-wrapper -->';
        $html .= '</div> <!-- .article-wrapper -->';
        $i++;
        $totalCounter++;

        if($i === 3 || $totalCounter === $total){
          $html .= '</div><!-- .row -->';
          $i = 0;
        }

      endwhile; // resourcequery have posts

    endif;

    $data['html'] = $html; // sets html as json object

  echo json_encode($data); //turns php array into json string which js will change into js object

  wp_reset_postdata();

  exit();

}
add_action('wp_ajax_nopriv_knowledge_base_query', 'knowledge_base_query');
add_action('wp_ajax_knowledge_base_query', 'knowledge_base_query');

?>
