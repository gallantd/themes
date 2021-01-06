<h2 class="header"><?php the_title(); ?></h2>
<div class="race--info">
  <?php if(!empty($race['allDist'])):?>
    <div class="race--details--info"><b>Distances:</b> <?= $race['allDist'];?></div>
  <?php endif ?>
  <?php if(!empty($race['address'])):?>
    <div class="race--details--info"><b>Location:</b> <?=$race['address'];?></div>
  <?php endif ?>
  <?php if(!empty($race['date'])):?>
    <div class="race--details--info"><b>Date:</b> <?=$race['date'];?></div>
  <?php endif ?>
</div>
<?php if(!empty($race['regLink']['url'])):?>
  <a class="irc-cta irc-btn-green" href="<?= $race['regLink']['url'] ?>" target="_blank">Register</a>
<?php endif;?>
<a class="irc-cta irc-cta-white" href="<?php the_permalink();?>" targe="_blank">Details</a>
