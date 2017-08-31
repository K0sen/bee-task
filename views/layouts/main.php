<?php

/* @var $content */

use app\components\Session;
use app\components\Alert;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BeeTask</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/images/icon.ico">
    <!--    BOOTSTRAP   -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <a href="/">
    <div class="title">
        <div class="title__bee">Bee</div>
        <div class="title__task">Task</div>
    </div>
    </a>
    <div class="create">
        <a href="/create"><button class="create__but"></button></a>
        <div class="create__text">Add a task</div>
    </div>
    <?php  if(Session::get('user') != 'admin') : ?>
    <div class="admin_enter admin">Admin Enter</div>
    <?php else : ?>
    <div class="admin_exit admin">Admin Exit</div>
    <?php endif; ?>
</header>

<div class="wrapper">
    <?= Alert::getFlash(); ?>
    <?= $content ?>
</div>

<footer>
    <div class="footer">
        <?= date('d/m/y'); ?>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="/js/jquery-ui.js"></script>
<script src="/js/scripts.js"></script>
</body>
</html>


