<?php

/* @var $tasks */
/* @var $pagination */
/* @var $sorting */

use app\components\Pagination;
use app\components\Session;
use app\models\Sorting;
use app\models\TaskAppear;

?>

<?= Sorting::renderSorting($sorting) ?>

<div class="container">
<?php foreach ($tasks as $task) : ?>
    <div class="task row">
        <?php  if(Session::get('user') == 'admin') : ?>
        <div class="task__edit">✎</div>
        <?php endif; ?>
        <div class="left col-lg-4 col-md-5 col-sm-6 col-xs-12">
            <div class="left__img">
            <?php if (TaskAppear::imageExist($task['image'])) : ?>
                <img src="/images/tasks/<?= $task['image'] ?>" alt="task_image" class="img">
            <?php else : ?>
                <img src="/images/default.png" alt="task_image_default" class="img">
            <?php endif; ?>
            </div>
            <div class="left__user">Name: <?= $task['name'] ?></div>
            <div class="left__email">Email: <?= $task['email'] ?></div>
            <?php if( $task['status'] == 1 ) : ?>
                <div class="left__status left__status--done">Status: done</div>
            <?php else : ?>
                <div class="left__status left__status--undone">Status: undone</div>
            <?php endif; ?>
            <div class="left__id">
                <input class="hidden_id" type="hidden" value="<?= $task['id'] ?>">
            </div>
        </div>
        <div class="right col-lg-8 col-md-7 col-sm-6 col-xs-12">
            <div class="right__text"><?= $task['text'] ?></div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<?php

echo Pagination::renderPagination($pagination);

?>