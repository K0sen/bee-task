<?php

/* @var $sorting app\models\Sorting */

?>

<div class="sorting">
    <div class="sorting__label">Sort by:</div>
    <ul class="type">
        <?php
            $active = null;
            $direction = 'up';

            if($sorting->nameActive) {
                $active = 'type__name--active';
            }

            if($sorting->nameUp) {
                $direction = 'down';
            }

            $link = '?sort=name_'.$direction;
        ?>
        <li><a href="<?= $link ?>" class="type__name link <?= $active ?> <?= $direction ?> ">Name</a></li>

        <?php
            $active = null;
            $direction = 'up';

            if($sorting->emailActive) {
                $active = 'type__email--active';
            }

            if($sorting->emailUp) {
                $direction = 'down';
            }

            $link = '?sort=email_'.$direction;
        ?>
        <li><a href="<?= $link ?>" class="type__email link <?= $active ?> <?= $direction ?> ">Email</a></li>

        <?php
            $active = null;
            $direction = 'up';

            if($sorting->statusActive) {
                $active = 'type__status--active';
            }

            if($sorting->statusUp) {
                $direction = 'down';
            }

            $link = '?sort=status_'.$direction;
        ?>
        <li><a href="<?= $link ?>" class="type__status link <?= $active ?> <?= $direction ?>">Status</a></li>

    </ul>
</div>
