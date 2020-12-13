<header class="header jumbotron--large">
    <?php if( empty($race) ){

        printImg(array(
                'url'=>'http://localhost:8888/irc/wp-content/themes/clean-slate/img/mountains.jpg',
                'alt'=> 'I Run Canada',
                'title'=> 'I Run Canada',
                'class'=> 'default'));

        echo '<h1 class="jumbotron--title">I Run Canada</h1>';
    }
    ?>


    <?php
    if(!empty($race)){if(!empty($race['img'])){ echo  output_pictures( set_image_array( array('imageArray' => $race['img'], 'singleImage' => true) ), 'staggered--images-main', 0);}; ?>
        <h1 class="jumbotron--title"><?php the_title(); ?></h1>
        <?php if(!empty($race['regLink']['url'])):
            $btn = (!empty($race['regCol']))? " irc-btn-{$race['regCol']}":" irc-btn-green";
        ?>
        <a class="irc-btn jumbotron--featured<?= $btn;?>" href="<?= $race['regLink']['url'] ?>" target="_blank"><?php echo (!empty($race['regLink']['title']))?$race['regLink']['title']:"REGISTER NOW"; ?></a>
    <?php endif;
    } ?>






</header>