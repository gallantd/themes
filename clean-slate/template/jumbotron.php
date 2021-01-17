<header class="header jumbotron">
    <?php
    if(is_front_page()){
       $race = getRaceEvents(featured());
       echo output_pictures(set_image_array( array('imageArray' => $race['img'], 'singleImage' => true)), 'jumbotron--img');?>

       <h1 class="jumbotron--title">
         <a href="<?=$race['post'];?>"><?= $race['title']; ?></a>
       </h1>
       <?php
    }
    elseif(empty($race['img'])){
      echo output_pictures(get_defaults(), 'jumbotron--img');?>
      <h1 class="jumbotron--title">I RUN CANADA</h1>
      <?php
    }
    else {
      echo output_pictures(set_image_array( array('imageArray' => $race['img'], 'singleImage' => true)), 'jumbotron--img');?>
      <h1 class="jumbotron--title"><?= get_the_title(); ?></h1>
      <?php
    }
      ?>

</header>

<?php
   $btn = (!empty($race['color']))? " irc-btn-{$race['color']}":" irc-btn-green";
   if(!empty($race['register']['url']) && !is_front_page()):?>
  <a class="irc-btn jumbotron--featured<?= $btn;?>" href="<?= $race['register']['url'] ?>" target="_blank"><?php echo (!empty($race['regLink']['title']))?$race['regLink']['title']:"REGISTER"; ?></a>
<?php endif;?>
