<?php

namespace app\components;

class Pagination
{
    public $max;    //max pages
    public $limit;     //items on each page
    public $layout = 'pagination.php';
    public $active_class = 'class="active"';    //display current link
    public $not_active_class = 'class="disabled"';  //display non-active links
    public $route = '/page/';   //correct route for controller
    public $params_line;     //for creating links with sorting params
    public $current;        //current page
    public $total;          //number of pages
    public $strip = [];    //strip of pages

    // arrows next, last, previous and first. May be unset if illogical
    public $next;
    public $last;
    public $prev;
    public $first;


    public function settings($max, $limit, $current_p, $item_amount, $params_line)
    {
        $this->max = $max;
        $this->limit = $limit;
        $this->current = $current_p;
        $this->total = (int) ceil($item_amount / $this->limit);
        $this->params_line = $params_line;

        if($current_p > 1) {
            $this->prev = $current_p - 1;
            $this->first = 1;
        }
        if($current_p < $this->total) {
            $this->next = $current_p + 1;
            $this->last = $this->total;
        }

        $this->strip = $this->getPageStrip();
    }

    //set pagination strip < [1, 2, 3, 4 ... 9] >
    public function getPageStrip() {
        $strip = [];
        /**
         * unique constant for creating a strip (empirically found)
         * set delimiter if difference between last page and current bigger then constant (7 >8< 9 10 ... 12<last);
         * if not strip will be like 8 >9< 10 11 12<last
         * and finding a start of strip
         */
        $constant = floor($this->max / 2);

        //if number of pages is < then max pages then appear all pages
        if( $this->total <= $this->max ) {
            $page = 1;
            for($i = 1; $i <= $this->total; $i++) {
                $strip[] = $page;
                $page++;
            }

        //if current page near the end
        } else if( ($this->total - $this->current) <= $constant + 1 ) {
            $page = $this->total;
            for($i = $this->max; $i > 0; $i--) {
                $strip[] = $page;
                $page--;
            }
            $strip = array_reverse($strip);

        //if current page near the start
        } else if( ($this->current - ($constant - 1)) <= 1) {
            $page = 1;
            for($i = 1; $i < $this->max; $i++) {
                $strip[] = $page;
                $page++;
            }
            $strip[] = '...';
            $strip[] = $this->total;

        //if current page in the middle
        } else {
            $page = (int) ($this->current - $constant);
            for($i = 1; $i < $this->max; $i++) {
                $strip[] = $page;
                $page++;
            }
            $strip[] = '...';
            $strip[] = $this->total;
        }

        return $strip;
    }

    //render view of pagination
    public static function renderPagination(Pagination $pagination)
    {
        ob_start();
        require(ROOT . 'views' . DS . 'layouts' . DS . $pagination->layout);
        $content =  ob_get_clean();

        return $content;
    }
}
?>