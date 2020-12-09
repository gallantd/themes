<aside class="race-container">
    <?php //if(locate_template('../template/cancelled.php') && !empty($race['cancelled'])){ include('../template/cancelled.php');} ?>
    <h2 class="header"><?php the_title(); ?></h2>
    <div class="race--info">
        <?php if(!empty($race['dist'][0])){   echo "Distance: {$race['dist'][0]['label']}<br>";} ?>
        <?php if(!empty($race['city'])){      echo "City: {$race['city']}<br>";} ?>
        <?php if(!empty($race['prov'])){      echo "Province: {$race['prov']}<br>";} ?>
        <?php if(!empty($race['cost'])){      echo "Cost: \${$race['cost']} CAD <br>";} ?>
        <?php if(!empty($race['date'])){      echo "Date: {$race['date']}<br>";} ?>
    </div>
    <a class="irc-cta irc-btn-green" href="<?= $race['regLink']['url'] ?>" target="_blank">Register</a>
    <a class="irc-cta irc-cta-white" href="<?php the_permalink();?>" targe="_blank">Details</a>
</aside>