<div class="search-bar">
  <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/search/')); ?>">
  	<label for="iruncanada-search" class="sr-only"><?php echo _x('Search for:', 'label'); ?></label>
    	<input id="iruncanada-search" type="search" class="search-box" autocomplete="off" name="search" placeholder="Search" value="<?php echo $searchTerm; ?>"/>
      <input type="submit" id="searchsubmit" class="search-btn irc-btn irc-btn-green" value="search">
  </form>
</div>
