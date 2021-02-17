<?php

function get_data(){
  if(!$_POST['id']){ return false;}
    if(function_exists($_POST['section'])){
     $_POST['section']($_POST['id']);
    }
}

// function sponsors(){
//   return [
//     'date_scheduled',
//     'event_date',
//     'start_time',
//     'city',
//     'province',
//     'google_maps',
//     'checkin_location',
//     'checkin_date',
//     'checkin_time',
//   ];
// }

function section_1($id){

  if(!empty(get_field('date_scheduled', $id))){
    $date = [
      'day' => get_field('event_date', $id),
      'time' => get_field('start_time', $id)?? false,
    ];

    $checkin = get_field('checkin_location', $id)?? false;
    $checkin_date = get_field('checkin_date', $id)?? false;
    $checkin_time = get_field('checkin_time', $id)?? false;
  }

  $location = get_field('city', $id)??'';
  $prov = get_field('province', $id);
  $maps = get_field('google_maps',$id)??false;


  $fields = [
      'date' => $date?? 'No date Set',
      'location' => "{$location}, {$prov['label']}",
    ];

  if($maps){
    $fields['map'] = $maps;
  }
  if($checkin){
    $fields['checkin_location'] = $checkin;
  }
  if($checkin_date){
    $fields['checkin_date'] = $checkin_date;
  }
  if($checkin_time){
    $fields['checkin_time'] = $checkin_time;
  }
  out_put_section_1( $fields );
}

function section_2($id){
  $id = $_POST['id'];
  if(empty(get_field('multi_looped_race', $id))){
    $fields = [
    'distance_1'  => ['distance' => 'distance_1','cost' => 'registration_cost_1', 'elevation' => 'elevation_1', 'start time' => 'start_time_1'],
    'distance_2'  => ['distance' => 'distance_2','cost' => 'registration_cost_2', 'elevation' => 'elevation_2', 'start time' => 'start_time_2'],
    'distance_3'  => ['distance' => 'distance_3','cost' => 'registration_cost_3', 'elevation' => 'elevation_3', 'start time' => 'start_time_3'],
    'distance_4'  => ['distance' => 'distance_4','cost' => 'registration_cost_4', 'elevation' => 'elevation_4', 'start time' => 'start_time_4'],
    'distance_5'  => ['distance' => 'distance_5','cost' => 'registration_cost_5', 'elevation' => 'elevation_5', 'start time' => 'start_time_5'],
    'distance_6'  => ['distance' => 'distance_6','cost' => 'registration_cost_6', 'elevation' => 'elevation_6', 'start time' => 'start_time_6'],
    'distance_7'  => ['distance' => 'distance_7','cost' => 'registration_cost_7', 'elevation' => 'elevation_7', 'start time' => 'start_time_7'],
    'distance_8'  => ['distance' => 'distance_8','cost' => 'registration_cost_8', 'elevation' => 'elevation_8', 'start time' => 'start_time_8'],
    'distance_9'  => ['distance' => 'distance_9','cost' => 'registration_cost_9', 'elevation' => 'elevation_9', 'start time' => 'start_time_9'],
    'distance_10' => ['distance' => 'distance_10','cost' => 'registration_cost_10', 'elevation' => 'elevation_10', 'start time' => 'start_time_10'],
    ];
    $field = get_multi_level_section_data($fields);
    $field['message'] = get_field('multi_looped_message', $id);
  } else {
    $field['distance'][0] = [
      'distance' => get_field('distance_1', $id),
      'cost' => get_field('registration_cost_1', $id),
      'elevation' => get_field('elevation_1', $id),
      'start time' => get_field('start_time_1', $id),
    ];
    $field['message'] = get_field('multi_looped_message', $id);
    $field['multi'] = true;
  }

  out_put_section_2( $field, $id );

}

function section_3($id){
  $fields = [
    'instagram' => (!empty(get_field('show_instagram', $id)))? get_field('instagram_link', $id): false,
    'twitter' => (!empty(get_field('show_twitter', $id)))? get_field('twitter_link', $id): false,
    'facebook' => (!empty(get_field('show_facebook', $id)))? get_field('facebook_link', $id): false,
    'contact' => get_field('contact_info', $id)?? false,
    'website' => get_field('website', $id)?? false,
    'register' => get_field('register', $id)?? false,
  ];

  out_put_section_3( $fields );
}

function get_multi_level_section_data($fields = ''){
  if(empty($fields)){ return false; }
  $id = $_POST['id'];
  $data['distance'] = [];
  foreach($fields as $field) {
    $distance = get_field($field['distance'], $id)?? '';
    $cost = get_field($field['cost'], $id)?? '';
    $elevation = get_field($field['elevation'], $id)?? '';
    $start = get_field($field['start time'], $id)?? '';
    if(!empty($distance)){
      array_push($data['distance'], [
        'distance' => $distance,
        'cost' => $cost,
        'elevation' => $elevation,
        'start time' => $start],);
    } else {
      break; // avoid processing when not needed
    }
  }
    return $data;
}

function out_put_section_1($data){ ?>
  <section class="race--details">
    <aside class="race--details--container">
      <?php if(!empty($data['date']['day'])):?>
        <div class="race--details--info"><b>Race Date:</b> <?= date('l F j, Y', strtotime($data['date']['day']));?><br><span class="note">See Distance for start times</span></div>
      <?php endif;?>

      <?php if(!empty($data['location'])):?>
        <div class="race--details--info"><b>Address:</b> <?= $data['location'];?></div>
      <?php endif;?>

      <?php if(!empty($data['contact'])):?>
        <div class="race--details--info"><b>Contact:</b> <?= $data['contact'];?></div>
      <?php endif;?>

      <?php if(!empty($data['checkin_location'])):?>
        <div class="race--details--info"><b>Checkin:</b> <?= $data['checkin_location']?></div>
      <?php endif;?>

      <?php if(!empty($data['checkin_date'])):?>
        <div class="race--details--info"><b>Checkin Address:</b> <?= date('l F j, Y', strtotime($data['checkin_date']));?> <?=  !empty($data['checkin_time'])? "@ {$data['checkin_time']}" :'';?></div>
      <?php endif;?>

      <?php if(!empty($data['map'])):?>
        <div class="race--details--info"><B>Map:</b> <a href="<?= $data['map'];?>" target="_blank">Google</a></div>
      <?php endif;?>

    </aside>
  </section>
  <?php
}

function out_put_section_2($data, $id){?>
    <section class="race--details">
      <?php if(!empty($data['message'])):?>
        <div class="race--details--message"><?= $data['message'];?></a></div>
      <?php endif;?>
        <div class="race--details--message">*Prices are subject to Change wihtout notice</a></div>

      <aside class="race--details--distances">
          <div class="race--details--info"><span class="mb-only">Dist:</span><span class="dsk-only">Distance:</span></div>
          <div class="race--details--info"><span class="mb-only">Elev:</span><span class="dsk-only">Elevation:</span></div>
          <div class="race--details--info"><span class="mb-only">Start</span><span class="dsk-only">Start Time:</span></div>
          <div class="race--details--info"><span class="mb-only">Cost:</span><span class="dsk-only">Entry Fee:</span></div>
      </aside>
        <?php
        $distances = $data['distance'];
        $count=0;
        foreach ($distances as $key => $value):
          $class = '';
          if($count%2 == 1){ $class = ' stripe';}
        ?>
        <aside class="race--details--distances<?=$class;?>">
            <div class="race--details--info"><?= $value['distance'];?></div>
            <div class="race--details--info"><?= $value['elevation'];?> meters</div>
            <?php if(empty($value['start time'])){ $value['start time'] =  get_field('start_time', $id);}?>
            <div class="race--details--info"><?= $value['start time'];?></div>
            <div class="race--details--info">$<?= $value['cost'];?> CAD</div>
        </aside>

        <?php
        $count++;
        endforeach;?>
    </section>
  <?php

}

function out_put_section_3($data){ ?>
  <section class="race--details">
    <aside class="race--details--container">
      <?php if(!empty($data['contact'])):?>
        <div class="race--details--info"><b>Contact us:</b> <?= $data['contact'];?></div>
      <?php endif;?>
      <?php if(!empty($data['website']['url'])):?>
        <div class="race--details--info"><b>Web:</b> <a href="<?= $data['website']['url'];?>"><?= !empty($data['website']['title'])? $data['website']['title'] :'Race Site';?></a></div>
      <?php endif;?>
      <?php if(!empty($data['register']['url'])):?>
        <div class="race--details--info"><b>Register:</b> <a href="<?= $data['register']['url'];?>"><?= !empty($data['register']['title'])?$data['register']['title'] : 'Sign up';?></a></div>
      <?php endif;?>
      <div class="race--details--info">
        <?php if(!empty($data['facebook'])):?>
        <a href="<?= $data['facebook'];?>" class="social-media" target="_blank"><img
          src="<?= get_template_directory_uri();?>/img/social/facebook.svg"
          alt="facebook"/>
        </a>
      <?php endif;?>
        <?php if(!empty($data['instagram'])):?>
        <a href="<?= $data['instagram'];?>" class="social-media" target="_blank"><img
          src="<?= get_template_directory_uri();?>/img/social/instagram.svg"
          alt="instagram" />
        </a>
      <?php endif;?>
        <?php if(!empty($data['twitter'])):?>
        <a href="<?= $data['twitter'];?>" class="social-media" target="_blank"><img
          src="<?= get_template_directory_uri();?>/img/social/twitter.svg"
          alt="twitter" />
        </a>
      <?php endif;?>
    </div>
    </aside>
  </section>
<?php
}

add_action( 'wp_ajax_nopriv_get_data_call', 'get_data' );
add_action( 'wp_ajax_get_data_call', 'get_data' );
