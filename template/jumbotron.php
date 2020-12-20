<header class="header jumbotron">
    <?php
    if(empty($race['img'])){
      $image = get_defaults();
      $title = "I RUN CANADA";
    } else {
      $image = set_image_array( array('imageArray' => $race['img'], 'singleImage' => true));
      $title = get_the_title();
    }
      echo output_pictures($image, 'jumbotron--img');
      ?>
       <h1 class="jumbotron--title"><?= $title; ?></h1>

</header>

<?php if(!empty($race['regLink']['url'])):
   $btn = (!empty($race['regCol']))? " irc-btn-{$race['regCol']}":" irc-btn-green";
?>
<a class="irc-btn jumbotron--featured<?= $btn;?>" href="<?= $race['regLink']['url'] ?>" target="_blank"><?php echo (!empty($race['regLink']['title']))?$race['regLink']['title']:"REGISTER NOW"; ?></a>
<?php endif;?>
