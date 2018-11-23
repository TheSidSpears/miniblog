<?php use Miniblog\Renderer; ?>

<h1>Add new post</h1>

<form action="?page=post&action=addForm" method="post">
    <input type='hidden' name='token' value='<?= htmlspecialchars(Renderer::$vars['token']) ?>'>

    Title: <input type="text" name="title">
    Text: <textarea name="text"></textarea>

    <button type="submit">Add</button>
</form>