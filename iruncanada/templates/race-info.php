<h2 class="header"><?php the_title(); ?>   REVIEW THIS</h2>
<div class="race--info">
  <?php if(!empty($race_results['distance'])):?>
    <div class="race--details--info"><b>Distances:</b> <?= $race_results['distance'];?></div>
  <?php endif ?>
  <?php if(!empty($race_results['location'])):?>
    <div class="race--details--info"><b>Location:</b> <?=$race_results['location'];?></div>
  <?php endif ?>
  <?php if(!empty($race_results['date'])):?>
    <div class="race--details--info"><b>Date:</b> <?=$race_results['date'];?></div>
  <?php endif ?>
</div>
<?php if(!empty($race_results['register']['url']) && $race_results['cancelled'] != 1 && $race_results['sold_out'] != 1):?>
  <a class="irc-cta irc-btn-green" href="<?= $race_results['register']['url'] ?>" target="_blank">Register</a>
<?php endif;?>
<a class="irc-cta irc-cta-white link-back" href="<?php the_permalink();?>">Details</a>
