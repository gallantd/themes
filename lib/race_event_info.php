<?php
/*
 * Get Race event details by post ID and return all values needed
 * */
if(!function_exists('getRaceEvent')) {
    function getRaceEvent($id)
    {
        return array(
            'img' => get_field('race_image', $id),
            'required' => get_field('required_gear', $id),
            'prov' => getProvince(get_field('province', $id)),
            'city' => get_field('city', $id),
            'address' => getAddress(get_field('province', $id), get_field('city', $id) ),
            'dist' => get_field('distance', $id),
            'elev' => get_field('elevation', $id),
            'dateSecheduled' => get_field('date_scheduled', $id),
            'date' => get_field('event_date', $id),
            'time' => get_field('start_time', $id),
            'color' => get_field('register_link', $id),
            'cost' => get_field('registration_cost', $id),
            'regLink' => get_field('register', $id),
            'site' => getSite(get_field('website', $id)),
            'cancelled' => get_field('is_cancelled', $id),
            'past' => futureDate(get_field('event_date', $id)),
            'contact' => get_field('contact_info', $id),
        );


        // start date acutally a date not numeric
        // Link color using a set color with grey hover
    }
}

if(!function_exists('getAddress')){
  function getAddress($prov, $city){
    return "{$city}, {$prov['label']}";
  }
}

if(!function_exists('getProvince')) {
    function getProvince($loc)
    {
        return $loc['label'];
    }
}

if(!function_exists('getSite')) {
    function getSite($site)
    {
      if(empty($site)){return false;}
        return '<a href="'.$site['url'].'" class="text-link" target="_blank">'.$site['title'].'</a>';

    }
}

if (!function_exists('futureDate')) {
    /**
     * @param $start = strtotime(get_field('start_date'))
     * @param $end = strtotime(get_field('end_date'))
     * @return true || false
     */

    function futureDate($event)
    {
        $future = true;

        if(empty($event)){ return 'Coming Soon';}

        $today = date("m/d");
        $cYear = date("Y");
        $eYear = date("Y", $event);
        $event_date = date("m/d", $event);

        if(  $eYear <= $cYear ){
            if($event_date < $today ){
                $future = false;
            }
        }
        return $future;
    }
}
