<?php
/*
 * Get Race event details by post ID and return all values needed
 * for the listing page
 * */

if(!function_exists('get_race_listing')) {
    function get_race_listing($id)
    {
        return array (
            'image' => get_image_sizes($id),
            'location' => get_address(get_field('province', $id), get_field('city', $id) ),
           	'distance' => show_distance_field(get_distance_field($id, 'distance')),
            'register' => get_field('register', $id),
            'cancelled' => get_field('is_cancelled', $id),
            'sold_out' => get_field('sold_out', $id),
            'date' => get_schedule($id),
            'title' => get_the_title($id),
            'post' => get_permalink($id),
            'type' => get_post_type($id)
        );
    }
}

if(!function_exists('show_distance_field')) {
  function show_distance_field($distances, $seperator = "|") {
		if(empty($distance)){return false;}
		$str = '';
		$loop = 0;
		foreach($distances as $distance){
			if($loop == 0){
				$str .= "{$distance} ";
			} else {
				$str .= "{$seperator} {$distance} ";
			}
			$loop++;
		}
		return $str;
	}
}

if(!function_exists('get_distance_field')) {
  function get_distance_field($id , $field = 'distance') {
		$data = [];
		$counter = 1;
		while($counter <= 10){
			$distance = get_field("{$field}_{$counter}", $id);
			if(!empty($distance)){ array_push($data, $distance);}
			$counter++;
		}
		return $data;
	}
}

if(!function_exists('get_schedule')){
  function get_schedule($id){
    if(get_field('date_scheduled', $id) && get_field('event_date', $id)){
        $data = date("M d Y",strtotime(get_field('event_date', $id)));
    } else {
      $data = 'Not scheduled';
    }
    return $data;
  }
}

if(!function_exists('get_address')){
  function get_address($prov = array('label'=> ''), $city = ''){

    return "{$city} {$prov['label']}";
  }
}


/* Private Page Details */
if(!function_exists('get_race_details')) {
    function get_race_details($post)
    {
        return array(
          'ID' => $post->ID,
          'post' => get_permalink($id),
          'title' => $post->post_title,
          'date' => check_date(get_field('event_date', $id)),
          'updated' => date('M d Y', strtotime($post->post_modified)),
          'status' => check_isset($post->post_status),
          'image' => check_isset(has_post_thumbnail($post->ID)),
          'category' => check_isset(get_the_category($post->ID)),
          'content' => check_isset($post->post_content),
          'excerpt' => check_isset($post->post_excerpt),
          'distance' => check_isset(get_distance_field($id, 'distance')),
          'location' => check_isset(get_address(get_field('province', $id), get_field('city', $id))),
          'contact' => check_isset(get_field('contact_info', $id)),
          'facebook' => check_isset(get_field('facebook_link', $id), true),
          'twitter' => check_isset(get_field('twitter_link', $id), true),
          'instagram' => check_isset(get_field('instagram_link', $id), true),
          'register' => check_isset(get_url_only(get_field('register', $id)), true),
          'website' => check_isset(get_url_only(get_field('website', $id)), true),
          'featured' => check_isset_rev(get_field('is_featured', $id)),
          'cancelled' => check_isset_rev(get_field('is_cancelled', $id)),
          'sold_out' => check_isset_rev(get_field('sold_out', $id)),
        );
    }
}

if(!function_exists('check_isset')) {
  function check_isset($val, $link = false) {
    if(!empty($val)){
        switch ($val){
          case ($val === 'draft' || $val === 'pending'):
          $span = '<span class="yellow"></span>';
          break;
          default:
          if($link){
            $span = '<a href="'.$val.'" class="green" target="_blank"></a>';
          }else {
            $span = '<span class="green"></span>';
          }
        }
      return $span;
    }
    return '<span class="red"></span>';
  }
}

if(!function_exists('check_date')){
  function check_date($field){
    if(empty($field)){return '';}
    $date = strtotime($field);

    $event = date('M d Y', $date);


    if($date >= date('U')){
      return '<span class="white-text">'.$event.'</span>';
    }
    return '<span class="yellow-text">'.$event.'</span>';
  }
}

if(!function_exists('check_isset_rev')) {
  function check_isset_rev($val, $link = false) {
    if(!empty($val)){
      return '<span class="yellow"></span>';
    }
    return '<span class="green"></span>';
  }
}

if(!function_exists('get_url_only')) {
  function get_url_only($val) {
    if(!empty($val)){
      return $val['url'];
    }
  }
}
