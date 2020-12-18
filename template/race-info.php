<h2 class="header"><?php the_title(); ?></h2>
<div class="race--info">
  <?php if(!empty($race['dist'])):?>
      <div class="race--details--info"><b>Distance:</b> <?= $race['dist'];?></div>
  <?php endif ?>    <?php if(!empty($race['city'])){      echo "<b>City:</b> {$race['city']}";} ?>
  <?php if(!empty($race['prov'])):?>
      <div class="race--details--info"><b>Location:</b> <?=$race['prov'];?></div>
  <?php endif ?>
  <?php if(!empty($race['cost'])):?>
        <div class="race--details--info"><b>Race Fee:</b> $<?=$race['cost'];?> CAD</div>
    <?php endif ?>
    <?php if(!empty($race['date'])):?>
        <div class="race--details--info"><b>Date:</b> <?=$race['date'];?></div>
    <?php endif ?></div>
<a class="irc-cta irc-btn-green" href="<?= $race['regLink']['url'] ?>" target="_blank">Register</a>
<a class="irc-cta irc-cta-white" href="<?php the_permalink();?>" targe="_blank">Details</a>
