<div class="all--post--header">
    <?php
    $stickyCount = 0;
    foreach ($posts as $key => $post) :
        $id = $post->ID;
        $heading['title'] = $post->post_title;
        $urlLink = get_permalink($post->ID);
        $excerptDesc = $AllPosts->setReadMore($post->post_excerpt);
        //$excerptDesc = $post->post_excerpt;
        $day = date('d', strtotime($post->post_date) );
        $month = date('M', strtotime($post->post_date) );
        $featuredImg = array(
            '1280' => get_the_post_thumbnail_url($id, 'card-1440'),
            '0' => get_the_post_thumbnail_url($id, 'card-0'),
        );
        ?>
        <div class="all--post--card-holder">
            <div class="all--post--sticky <?= $class;?>">
                <?= outputPicture($featuredImg, get_the_post_thumbnail_url($id, 'card-0'), get_post_meta(get_post_thumbnail_id
                ($id), '_wp_attachment_image_alt', true), 'all--post--image lazyload cover-picture', 0);?>
                <div class="all--post--card-bottom">
                    <div class="all--post--date">
                        <?= $month; ?>
                        <span class="all--post--day"><?= $day; ?>
                         </span>
                    </div>
                    <div class="all--post--content">
                        <?php output_heading($heading, 'all--post--title'); ?>
                        <p class="all--post--excerpt"><?= $excerptDesc; ?></p>
                        <div class="all--post--btn-holder">
                            <a href=" <?= $urlLink;?>" class="btn btn--white-blue all--post--btn">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        unset($posts[$stickyCount]);
        $stickyCount++;
        if($stickyCount >= 2){ break;}
    endforeach; ?>
</div>
<ul class="all--post--list-vert all--post--post">
    <?php

    foreach ($posts as $key => $post) :
        $id = $post->ID;
        $heading['title'] = $post->post_title;
        $urlLink = get_permalink($post->ID);
        $excerptDesc = $AllPosts->setReadMore($post->post_excerpt);
        $day = date('d', strtotime($post->post_date) );
        $month = date('M', strtotime($post->post_date) );
        $featuredImg = array(
            '1440' => get_the_post_thumbnail_url($id, 'card-1440'),
            '1280' => get_the_post_thumbnail_url($id, 'card-1280'),
            '1024' => get_the_post_thumbnail_url($id, 'card-1024'),
            '768' => get_the_post_thumbnail_url($id, 'card-768'),
            '0' => get_the_post_thumbnail_url($id, 'card-0'),
        );
        ?>
        <li class="all--post--container" id="all--post--<?= $id; ?>">
            <div class="all--post--container-card">
                <?= outputPicture($featuredImg, get_the_post_thumbnail_url($id, 'card-0'), get_post_meta(get_post_thumbnail_id
                ($id), '_wp_attachment_image_alt', true), 'all--post--image lazyload cover-picture', 0);?>
                <div class="all--post--card-bottom">
                    <div class="all--post--date">
                        <?= $month; ?>
                        <span class="all--post--day"><?= $day; ?></span>
                    </div>
                    <div class="all--post--content">
                        <?php output_heading($heading, 'all--post--title'); ?>
                        <p class="all--post--excerpt"><?= $excerptDesc; ?></p>
                        <div class="all--post--btn-holder">
                            <a href=" <?= $urlLink;?>" class="btn btn--white-blue all--post--btn">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>

    <?php endforeach; ?>
</ul>




/*
 * All POST CLASS
 *
 *
 */

