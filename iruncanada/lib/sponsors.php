<?php
function sponsor( $sponsor ){
  if(empty($sponsor)){ $sponsor = site_sponsor('main');}

  if(is_array($sponsor)){
    get_sponsors($sponsor);
  } else {
   output_sponsor(get_sponsor_details($sponsor));
 }
}

function get_sponsors ($list) {
  foreach($list as $val ){ ?>
    <div class="single--secondary-container">
      <?php      output_sponsor(get_sponsor_details( $val['value'] ), 'imgsml'); ?>
    </div>
    <?php
  }
}

function get_sponsor_details($value){
  $sponsor = [];
  switch($value){
    case 'salomon':
      array_push( $sponsor,[
        'img' => 'salomon.png',
        'imgsml' => 'salomon-2.png',
        'link' => 'https://www.salomon.com/'
      ]);
    break;
    case 'ultimate':
      array_push( $sponsor,[
        'img' => 'ultimate.png',
        'imgsml' => 'ultimate-2.jpg',
        'link' => 'https://ultimatedirection.com/'
      ]);
    break;
    case 'garmin':
      array_push( $sponsor,[
        'img' => 'garmin.svg',
        'imgsml' => 'garmin-2.png',
        'link' => 'https://www.garmin.com'
      ]);
    break;
    case 'hammer':
      array_push( $sponsor,[
        'img' => 'hammer.png',
        'imgsml' => 'hammer-2.jpg',
        'link' => 'https://www.hammernutrition.com/'
      ]);
    break;
    case 'raceroster':
      array_push( $sponsor,[
        'img' => 'raceroster.png',
        'imgsml' => 'raceroster-2.png',
        'link' => 'https://raceroster.com/'
      ]);
    break;
    case 'suunto':
      array_push( $sponsor,[
        'img' => 'suunto.png',
        'imgsml' => 'suunto-2.png',
        'link' => 'https://www.suunto.com'
      ]);
    break;
    case 'north':
      array_push( $sponsor,[
        'img' => 'north.png',
        'imgsml' => 'north-2.png',
        'link' => 'https://www.thenorthface.com/'
      ]);
    break;
    default :
    break;
  }

  return $sponsor;
}

function site_sponsor($where){

  return 'salomon';

}

function output_sponsor($sponsor, $img = 'img'){
  foreach($sponsor as $kay => $value){ ?>
    <a href="<?=$value['link'];?>" target="_blank">
    <img alt="race sponsor" src="<?= get_template_directory_uri(); ?>/img/sponsors/<?=$value[$img];?>" class="lazyload"/>
    </a>
<?php  }

}
