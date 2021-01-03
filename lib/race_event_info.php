<?php
/*
 * Get Race event details by post ID and return all values needed
 * */
if(!function_exists('getRaceEvent')) {
    function getRaceEvent($id)
    {
        return array(
            'img' => get_field('race_image', $id),
            'rd' => get_field('race_director', $id),
            'prov' => getProvince(get_field('province', $id)),
            'city' => get_field('city', $id),
            'address' => getAddress(get_field('province', $id), get_field('city', $id) ),
            'dist' => getDistance(get_field('distance', $id)),
            'allDist' => getAllDistance(get_field('distance', $id)),
            'elev' => get_field('elevation', $id),
            'date' => get_field('event_date', $id),
            'time' => get_field('event_date', $id),
            'regCol' => get_field('register_link', $id),
            'cost' => get_field('registration_cost', $id),
            'regLink' => get_field('register', $id),
            'site' => getSite(get_field('website', $id)),
            'cancelled' => get_field('is_cancelled', $id),
            'past' => futureDate(get_field('event_date', $id))
        );
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

if(!function_exists('getDistance')) {
    function getDistance($dist)
    {
        if(empty($dist)){return false;}
        $maxDist = 0;
        $returnData = '';
        foreach ($dist as $val) {
            if($maxDist < $val){
                $maxDist = $val['value'];
                $returnData = $val['label'];
            }
        }
        return $returnData;
    }
}

if(!function_exists('getAllDistance')) {
    function getAllDistance($dist)
    {
        if(empty($dist)){return false;}
        $count = count($dist);
        $i = 0;
        $returnData = '';
        foreach ($dist as $val) {
            if($i == 0 && $count > 1){
                $returnData = "<br>{$val['label']} ";
            }
            elseif ($i == 0 && $count == 1){
                $returnData = $val['label'];
            }
            else {
              if($val['label'] != ''){
                $returnData .= "<b>|</b> {$val['label']} ";
              }
            }
            $i++;
        }
        return $returnData;
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

        if(empty($event)){ return false;}

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
