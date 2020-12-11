<h2 class="header"><?php the_title(); ?></h2>
<div class="race--info">
    <?php if(!empty($race['dist'][0])){   echo "<b>Distance:</b> {$race['dist'][0]['label']}";} ?>
    <?php if(!empty($race['city'])){      echo "<b>City:</b> {$race['city']}";} ?>
    <?php if(!empty($race['prov'])){      echo "<b>Location:</b> {$race['prov']}";} ?>
    <?php if(!empty($race['cost'])){      echo "<b>Race Fee:</b> \${$race['cost']} CAD";} ?>
    <?php if(!empty($race['date'])){      echo "<b>Date:</b> {$race['date']}";} ?>
</div>
<a class="irc-cta irc-btn-green" href="<?= $race['regLink']['url'] ?>" target="_blank">Register</a>
<a class="irc-cta irc-cta-white" href="<?php the_permalink();?>" targe="_blank">Details</a>
