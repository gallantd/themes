<?php

/***************************************************************
 *  SINGLE IMAGE PICTURE TAG
 ***************************************************************/

function single_image($url){ ?>
  <picture class="<?= $url['class'];?>">
        <source media="(min-width:0px)" srcset="<?= $url['link'];?>">
      <img  src="#data"
            data-src="<?= $url['link'];?>"
            alt="<?= $url['alt'];?>"
            class="lazyload"
            title="<?= $url['title'];?>"
            draggable="false"
            style="width: 100%; height: 100%; object-fit: cover;">
  </picture>
<?php
}

function output_pictures($image, $class = ''){
	if(empty($image)){ return false;}
  ?>
  <picture class="<?= $class;?>">
    <?php
      foreach($image['image'] as $key => $img){?>
        <source media="(min-width:<?=$key?>px)" srcset="<?= $img;?>">
  <?php }

    ?>
      <img  src=""
            data-src="<?= $image['image']['0'];?>"
            alt="<?= $image['alt'];?>"
            class="lazyload"
            title="<?= $image['title'];?>"
            draggable="false"
            style="width: 100%; height: 100%; object-fit: cover;">
  </picture>
<?php
}


function get_image_sizes($id , $featured =''){
	if(empty($id)){return false;}
		if(has_post_thumbnail($id) || $featured){
			$image = [
				'1440' => get_the_post_thumbnail_url($id, 'Large-Crop'),
				'1024' => get_the_post_thumbnail_url($id, 'Medium-Crop'),
				'0' => get_the_post_thumbnail_url($id, 'Small-Crop'),
			];
	} else {
		$prov = get_field('province', $id) ?? ['value'=>'virtual'];
		$image = [
			'0' => get_template_directory_uri() .'/img/flags/Flag_of_'.$prov['value'].'.svg'
		];
	}
	return $image;
}
