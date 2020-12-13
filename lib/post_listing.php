<?php

/**
 */
class AllPosts
{
    /**
     * Set Post type default value
     */
    private $type = 'post';
    private $postsPerPage = 11;

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

    public function posts($type = 'post', $postPerPage = 11)
    {
        $this->type = $type;
        $this->postsPerPage = $postPerPage;
        if ('post' == $type || 'career' == $type) {
            $return_data = $this->runSearchQuery();
        } else {
            $return_data = $this->runDateRange();
        }
        return $return_data;
    }

    private function runSearchQuery()
    {
        $this->paged = filter_input(INPUT_GET, 'paged', FILTER_SANITIZE_STRING);
        $this->wpQuery = new WP_Query(array(
            'post_type' => $this->type,
            'post_status' => 'publish',
            'posts_per_page' => $this->postsPerPage,
            'paged' => $this->paged,
            'order' => 'DESC',
        ));
        return $this->wpQuery->posts;
    }

    private function runDateRange()
    {

        $return_data = new WP_Query(array(
                'post_type' => $this->type,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key' => 'end_date',
                'meta_query' => array(
                    'relation' => "OR",
                    array(
                        'key' => 'end_date',
                        'value' => date('Ymd'),
                        'compare' => '>=',
                    ),
                    array(
                        'key' => 'end_date',
                        'value' => '',
                        'compare' => '=',
                    )
                )
            )
        );

        return $return_data->posts;
    }

    public function setReadMore($text, $char = 125)
    {
        return strlen($text) > 50 ? substr($text, 0, $char) . "..." : $text;
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
            'prev_text' => __(' <img class="icon-arrow icon-arrow-prev" aria-hidden="true" alt="Previous Page" src="http://localhost:8888/irc/wp-content/themes/clean-slate/img/arrow.png"><span class="sr-only">Previous</span>'),
            'next_text' => __(' <img class="icon-arrow icon-arrow-next" aria-hidden="true" alt="Next Page" src="http://localhost:8888/irc/wp-content/themes/clean-slate/img/arrow.png"><span class="sr-only">Next</span>'),
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

