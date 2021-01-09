
<section class="race--details">
    <aside class="race--details--show">
      <?php
      foreach ($event as $key => $value) {
        if (!empty($value)) {
          switch($key){
            case 'race fee':?>
              <div class="race--details--info"><b><?=$key?>:</b> $<?= $value;?> CAD</div>
<?php       break;
            case 'elevation':?>
              <div class="race--details--info"><b><?=$key?>:</b> <?= $value;?> meters</div>
  <?php     break;
            case 'website': ?>
              <div class="race--details--info"><b><?=$key?>:</b> <?= getURL($value);?></div>
<?php       break;
            case 'register': ?>
              <div class="race--details--info"><b><?=$key?>:</b> <?= getURL($value , $key); ?></div>
<?php       break;
            default:?>
              <div class="race--details--info"><b><?=$key?>:</b> <?= $value;?></div>
      <?php } // end switch
        } // end if
        array_shift($event);
      //  if($i >= 4){ break;}

      }// end foreach
?>
    </aside>
</section>
