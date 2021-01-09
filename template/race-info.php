<h2 class="header"><?php the_title(); ?></h2>
<div class="race--info">
  <?php if(!empty($race['distance'])):?>
    <div class="race--details--info"><b>Distances:</b> <?= $race['distance'];?></div>
  <?php endif ?>
  <?php if(!empty($race['location'])):?>
    <div class="race--details--info"><b>Location:</b> <?=$race['location'];?></div>
  <?php endif ?>
  <?php if(!empty($race['date'])):?>
    <div class="race--details--info"><b>Date:</b> <?=$race['date'];?></div>
  <?php endif ?>
</div>
<?php if(!empty($race['register']['url'])):?>
  <a class="irc-cta irc-btn-green" href="<?= $race['register']['url'] ?>" target="_blank">Register</a>
<?php endif;?>
<a class="irc-cta irc-cta-white" href="<?php the_permalink();?>" targe="_blank">Details</a>
