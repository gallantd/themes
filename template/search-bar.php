<?php
/**
 * Search Form Component
 *
 * @param $searchTerm string The search query
 * @param $position   string Optional, default: 'body'.  Must be 'header' or 'body'.  Where on the page the form is loaded
 */


$position = (isset($position)) ? $position : 'body';
$modifierClasses = (isset($position) and $position == 'header') ? 'search-form--header' : '';
?>

<form role="search" method="get" class="search-bar__form search-form <?php echo $modifierClasses; ?>" action="<?php echo esc_url(home_url('/search/')); ?>">
    <label for="<?php echo $position; ?>-search" class="sr-only">Search</label>
<!--    <i class="header-search__input-icon"><img src="/content/themes/base/img/icons/search.svg" alt="Search Icon" /></i>-->
    <input id="<?php echo $position; ?>-search" type="search" class="search-form__input search-bar__text query" autocomplete="off" name="search"
           placeholder="Search" value="<?php echo $searchTerm; ?>"/>

    <button type="submit" class="search-bar__button">
        <?php echo _x('Search', 'submit button'); ?>
    </button>
</form>