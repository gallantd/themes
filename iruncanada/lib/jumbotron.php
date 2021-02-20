<?php
class Jumbotron {
  private $limit = 1;
  function init($id) {
    $array = (get_post_type( $id ) == 'trail')? ['0' => $id] : $this->query();
    $this->generate($this->construct($array));
  }

  private function query(){
    $query = new WP_Query(array(
      'post_type' => 'trail',
      'post_status' => 'publish',
      'fields' => 'ids',
      'orderby' => 'rand',
      'meta_key' => 'is_featured',
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'is_featured',
          'value' => '1',
          'compare' => '=='
        ),array(
          'key' => 'is_cancelled',
          'value' => '1',
          'compare' => '!='
        ),array(
        ),array(
          'key' => 'sold_out',
          'value' => '1',
          'compare' => '!='
        ),array(
          'key'     => 'event_date',
          'value'   => date('Ymd'),
          'compare' => '>=',
          'type' => 'DATE'
        )
      )
    ));
   return $query->posts;
  }

  private function construct($posts){
    $data = []; $count = 0;
    foreach($posts as $id){
     $post = [
       'ID' => $id,
       'title' => get_the_title($id),
       'link' => get_permalink($id),
       'alt' => get_the_title($id),
       'image' => get_image_sizes($id),
     ];
      if($this->limit > $count){
        $data[$count] = $post;
      }
      $count++;
    } // end foreach
    return $data;
  }

  public function generate($races){ ?>
    <header class="jumbotron">
<?php foreach($races as $featured){
      output_pictures(['image'=> $featured['image'], 'alt' => $featured['alt'], 'title' => $featured['title']], 'jumbotron--image' );
  ?>
        <h1 class="jumbotron--title"><?= get_bloginfo(); ?></h1>
        <h3 class="jumbotron--title" data-id="<?= $featured['ID'];?>">
          <a class="irc-link" href="<?=$featured['link'];?>"><?= $featured['title']; ?></a>
        </h3>
        <?php
    } // end foreach ?>
  </header>
<?php  }
}
