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
