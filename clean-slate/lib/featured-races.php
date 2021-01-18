<?php
function featured(){
  $postID = new WP_Query(array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'fields' => 'ids',
      'posts_per_page' => 1
    )
  );
  return $postID->posts[0];
}
