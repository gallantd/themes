<?php
/*
 * Get Race event details by post ID and return all values needed
 * for the listing page
 * */

if(!function_exists('getRaceEvents')) {
    function getRaceEvents($id)
    {
        return array (
            'img' => get_field('race_image', $id),
            'location' => getAddress(get_field('province', $id), get_field('city', $id) ),
            'distance' => get_field('distance', $id),
            'register' => get_field('register', $id),
            'cancelled' => get_field('is_cancelled', $id),
            'date' => getSchedule($id),
            'title' => get_the_title($id),
            'post' => get_permalink($id)
        );
    }
}

if(!function_exists('getRaceSettings')) {
    function getRaceSettings($id)
    {
        return array (
            'img' => get_field('race_image', $id),
            'color' => get_field('register_link', $id),
            'cancelled' => get_field('is_cancelled', $id),
            'register' => get_field('register', $id),
        );
    }
}

if(!function_exists('getRaceEvent')) {
    function getRaceEvent($id)
    {
        return array (
          'location' => getAddress(get_field('province', $id), get_field('city', $id) ),
          'distance' => get_field('distance', $id),
          'race fee' => get_field('registration_cost', $id),
          'date' => getSchedule($id),
          'contact' => get_field('contact_info', $id),
          'required gear' => get_field('required_gear', $id),
          'start time' => get_field('start_time', $id),
          'elevation' => get_field('elevation', $id),
          'register' => get_field('register', $id),
          'website' => get_field('website', $id),
        );
    }
}

if(!function_exists('getURL')) {
  function getURL($site , $key = 'website'){
    if(empty($site['url'])){return false;}
      $title = !empty($site['title'])?$site['title'] : $site['url'];
      $target = !empty($site['targe']) ?!empty($site['targe']) : '_blank';
        return '<a href="'.$site['url'].'" class="text-link" target="'.$target.'">'.$title.'</a>';
  }
}

if(!function_exists('getSchedule')){
  function getSchedule($id){
    if(get_field('date_scheduled', $id) && get_field('event_date', $id)){
        $data = date("M d Y",strtotime(get_field('event_date', $id)));
    } else {
      $data = 'coming soon';
    }
    return $data;
  }
}

if(!function_exists('getAddress')){
  function getAddress($prov = array('label'=> ''), $city = ''){

    return "{$city} {$prov['label']}";
  }
}

if(!function_exists('getProvince')) {
    function getProvince($loc)
    {
        return $loc['label'];
    }
}
