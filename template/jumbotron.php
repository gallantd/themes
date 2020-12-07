<header class="header jumbotron--large">
    <?php printImg($race['img']); ?>
    <h1 class="jumbotron--title"><?php the_title(); ?></h1>
    <?php if(!empty($race['regLink']['url'])):
        $btn = (!empty($race['regCol']))? " irc-btn-{$race['regCol']}":" irc-btn-green";
    ?>
        <a class="irc-btn jumbotron--featured<?= $btn;?>" href="<?= $race['regLink']['url'] ?>" target="_blank"><?php echo (!empty($race['regLink']['title']))?$race['regLink']['title']:"REGISTER NOW"; ?></a>
    <?php endif;?>
</header>