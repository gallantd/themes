<section class="race--details">
    <aside class="race--details--show">
        <?php if(!empty($race['dist'][0])){   echo "<b>Distance:</b> {$race['dist'][0]['label']}";} ?>
        <?php if(!empty($race['city'])){      echo "<b>City:</b> {$race['city']}";} ?>
        <?php if(!empty($race['prov'])){      echo "<b>Location:</b> {$race['prov']}";} ?>
        <?php if(!empty($race['cost'])){      echo "<b>Race Fee:</b> \${$race['cost']} CAD";} ?>
        <?php if(!empty($race['date'])){      echo "<b>Date:</b> {$race['date']}";} ?>
    </aside>
    <?php if(!empty($race['rd']) || !empty($race['city']) || !empty($race['prov']) || !empty($race['elev'])):?>
    <div class="race--details--more">
        <div class="race--details--show-more">
            <?php if(!empty($race['city'])){      echo "<b>City:</b> {$race['city']}";} ?>
            <?php if(!empty($race['prov'])){      echo "<b>Location:</b> {$race['prov']}";} ?>
            <?php if(!empty($race['rd'])){      echo "<b>Race Fee:</b> {$race['rd']} CAD";} ?>
            <?php if(!empty($race['elev'])){      echo "<b>Date:</b> {$race['elev']}";} ?>
        </div>
    </div>
    <a class="irc-btn <?= $btn;?> race--details--btn" id="show-more">see more </a>
    <a class="irc-btn <?= $btn;?> race--details--btn-less" id="show-less">hide details </a>
    <?php endif;?>

</section>

