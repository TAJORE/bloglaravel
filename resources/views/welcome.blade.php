<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>blog</title>
</head>
<body>
<ul>
    <?php foreach($tasks as $task) : ?>
    <li><?= $task; ?></li>
    <?php endforeach;  ?>
</ul>
</body>
</html>