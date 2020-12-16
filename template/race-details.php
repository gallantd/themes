<section class="race--details">
    <aside class="race--details--show">
        <?php if(!empty($race['dist'])):?>
            <div class="race--details--info"><b>Distance:</b> <?= $race['dist'];?></div>
        <?php endif ?>
        <?php if(!empty($race['prov'])):?>
            <div class="race--details--info"><b>Location:</b> <?=$race['prov'];?></div>
        <?php endif ?>
        <?php if(!empty($race['cost'])):?>
            <div class="race--details--info"><b>Race Fee:</b> $<?=$race['cost'];?> CAD</div>
        <?php endif ?>
        <?php if(!empty($race['date'])):?>
            <div class="race--details--info"><b>Date:</b> <?=$race['date'];?></div>
        <?php endif ?>
    </aside>
    <?php if(!empty($race['rd']) || !empty($race['city']) || !empty($race['prov']) || !empty($race['elev'])):?>
  <div class="race--details--more">
        <div class="race--details--show-more">
            <?php if(!empty($race['city'])):?>
                <div class="race--details--info"><b>City:</b> <?=$race['city']; ?></div>
            <?php endif ?>
            <?php if(!empty($race['rd'])):?>
                <div class="race--details--info"><b>Race Director:</b> <?=$race['rd'];?></div>
            <?php endif ?>
            <?php if(!empty($race['allDist'])):?>
                <div class="race--details--info"><b>All Distances:</b> <?=$race['allDist'];?></div>
            <?php endif ?><?php if(!empty($race['elev'])):?>
                <div class="race--details--info"><b>Elevation:</b> <?=$race['elev'];?> meters</div>
            <?php endif ?>
            <?php if(!empty($race['site'])):?>
                <div class="race--details--info"><b>Website:</b> <?=$race['site'];?></div>
            <?php endif ?>
        </div>
    </div>
        <button class="irc-btn <?= $btn;?> race--details--btn" id="show-more">see more </button>
        <button class="irc-btn <?= $btn;?> race--details--btn-less" id="show-less">hide details </button>
    <?php endif;?>

</section>

