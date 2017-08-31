<?php

/* @var $task app\models\TaskCreate*/

//var_dump($task->errors); // TODO work on errors

?>

<form class="create-form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $task->name ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email"  placeholder="Email" value="<?= $task->email ?>">
    </div>
    <div class="form-group">
        <label for="text">Text</label>
        <textarea class="form-control" rows="3" id="text" name="text"  placeholder="Text" ><?= $task->text ?></textarea>
    </div>
    <div class="form-group">
        <label for="file">File input</label>
        <input class="form-control" type="file" id="file" name="file">
    </div>
    <button type="button" class="btn btn-info preview" disabled>Preview</button>
    <button type="submit" class="btn btn-default">Submit</button>
</form>