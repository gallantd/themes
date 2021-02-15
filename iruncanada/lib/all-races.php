<?php

/**
 */
class AllRaces
{
    /**
     * Set Post type default value
     */
    private $type = 'trail';
    private $postsPerPage = 10;

    /**
     * Set Post type to be searched
     */
    public function setPostType($type)
    {
        if (!$type) {
            return false;
        }
        $this->type = $type;
    }

    public function setPostPerPage($val)
    {
        if (!$val) {
            return false;
        }
        $this->postsPerPage = $val;
    }
    public function setFilterType($val)
    {
        if (!$val) {
            return false;
        }
        $this->filterType = $val;
    }
    public function setFilterValue($val)
    {
        if (!$val) {
            return false;
        }

        $this->filterValue = $val;
    }

    public function posts()
    {
        return $this->runSearchQuery();
    }

    public function filters()
    {
        $this->setFilterType('province');
        $this->setFilterValue(filter_input(INPUT_GET, 'province', FILTER_SANITIZE_STRING));

      return $this->runProvinceQuery();
    }

    private function runProvinceQuery()
    {
      $this->paged = filter_input(INPUT_GET, 'paged', FILTER_SANITIZE_STRING);

      $this->wpQuery = new WP_Query(array(
          'post_type' => $this->type,
          'paged'  => $this->paged,
          'post_status' => 'publish',
          'posts_per_page' => $this->postsPerPage,
          'meta_key' => $this->filterType,
          'meta_query' => array(
              array(
                  'key' => $this->filterType,
                  'value' => $this->filterValue,
                  'compare' => '=',
              )
          )
        )
      );
        return $this->wpQuery->posts;
    }

    private function runSearchQuery()
    {

        $this->paged = filter_input(INPUT_GET, 'paged', FILTER_SANITIZE_STRING);

        $this->wpQuery = new WP_Query(array(
            'post_type' => $this->type,
            'paged'  => $this->paged,
            'post_status' => 'publish',
            'posts_per_page' => $this->postsPerPage
          )
        );
        return $this->wpQuery->posts;
    }


    /**
     * The value from the pages query string parameter
     *
     * @var int
     */
    private $paged;

    /**
     * Returns the results of paginate_links().  Default $data can be overwritten or added to by passing an array with the same keys or
     * new keys. prev_text and next_text are common use cases.
     *
     * @param array $overrideData
     *
     * @return array|string|void
     */
    public function getPagination($overrideData = array())
    {
        $data = array(
            'total' => $this->getWpQuery()->max_num_pages,
            'base' => add_query_arg('paged', '%#%'),
            'format' => '?paged=%#%',
            'current' => max(1, $this->getPaged()),
            'prev_text' => __(' <img class="icon-arrow icon-arrow-prev" aria-hidden="true" alt="Previous Page" src="https://iruncanada.com/wp-content/themes/iruncanada/img/arrow.png"><span class="sr-only">Previous</span>'),
            'next_text' => __(' <img class="icon-arrow icon-arrow-next" aria-hidden="true" alt="Next Page" src="https://iruncanada.com/wp-content/themes/iruncanada/img/arrow.png"><span class="sr-only">Next</span>'),
            'show_all' => false,
            'mid_size' => 3,
            'type' => 'array'
        );

        // Combine arrays to allow overriding default data
        foreach ($overrideData as $key => $value) {
            $data[$key] = $value;
        }

        return paginate_links($data);
    }

    /**
     * @return WP_Query
     */
    public function getWpQuery()
    {
        return $this->wpQuery;
    }

    /**
     * @return int
     */
    public function getPaged()
    {
        return $this->paged;
    }
}
