<?php

/* @var $pagination app\components\Pagination*/

?>

<nav aria-label="Page navigation" class="nav_pagination">
    <ul class="pagination">

        <?php if($pagination->first) {
            $first = $pagination->route . $pagination->first . $pagination->params_line;
            $previous = $pagination->route. $pagination->prev . $pagination->params_line;
            $first_class = null;
        } else {
            $first = '#';
            $previous = '#';
            $first_class = $pagination->not_active_class;
        } ?>
        <li <?= $first_class ?>>
            <a href="<?= $first ?>" aria-label="First" title="First">
                <span aria-hidden="true">&lt;&lt;</span>
            </a>
        </li>
        <li <?= $first_class ?>>
            <a href="<?= $previous ?>" aria-label="Previous" title="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>


        <?php foreach($pagination->strip as $page) {
            $link = $pagination->route . $page . $pagination->params_line;
            $class = null;

            if( ($pagination->current == $page) || $page == '...' ) {
                $link = '#';
                $class = $page == '...' ? $pagination->not_active_class : $pagination->active_class;
            }

            echo '<li '.$class.'><a href = "'.$link.'" >'.$page.'</a></li>';
        } ?>


        <?php if($pagination->last) {
            $last = $pagination->route . $pagination->last . $pagination->params_line;
            $next = $pagination->route . $pagination->next . $pagination->params_line;
            $last_class = null;
        } else {
            $last = '#';
            $next = '#';
            $last_class = $pagination->not_active_class;
        } ?>
        <li <?= $last_class ?>>
            <a href="<?= $next ?>" aria-label="Next" title="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>

        </li>
        <li <?= $last_class ?>>
            <a href="<?= $last ?>" aria-label="Last" title="Last">
                <span aria-hidden="true">&gt;&gt;</span>
            </a>
        </li>


    </ul>
</nav>

<!--<a href="link.html" class="not-active">Link</a>-->
<!---->
