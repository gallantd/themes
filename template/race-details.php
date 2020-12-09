<section class="race--details">
    <aside class="race--details--show">
        <?php if(!empty($race['cost'])){      echo "Cost: \${$race['cost']} CAD <br>";} ?>
        <?php if(!empty($race['dist'][0])){   echo "Distance: {$race['dist'][0]['label']}<br>";} ?>
        <?php if(!empty($race['date'])){      echo "Date: {$race['date']}<br>";} ?>
        <?php  $btn = (!empty($race['regCol']))? " irc-btn-{$race['regCol']}":" irc-btn-green";?>
    </aside>
    <div class="race--details--more">
        <div class="race--details--show-more">
            <?php if(!empty($race['rd'])){        echo "Race Director: {$race['rd']}<br>";} ?>

            <?php if(!empty($race['city'])){      echo "City: {$race['city']}<br>";} ?>

            <?php if(!empty($race['prov'])){      echo "Province: {$race['prov']}<br>";} ?>

            <?php if(!empty($race['elev'])){      echo "Elevation: {$race['elev']}<br> meters";} ?>
        </div>
    </div>
    <a class="irc-btn <?= $btn;?> race--details--btn" id="show-more">see more </a>
    <a class="irc-btn <?= $btn;?> race--details--btn-less" id="show-less">hide details </a>
</section>

