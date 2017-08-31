<?php

/* @var $exception \Exception */

?>

<div class="error">
    <h1>Don't worry! All will be fine</h1>

    <div class="error__img">
        <img src="/images/ninja.png" alt="ninja">
    </div>

    <div class="error__text">
        <h2><?= $exception->getMessage(); ?></h2>
    </div>
</div>

