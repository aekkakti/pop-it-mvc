<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
</head>
<body>

<h1>Список статей</h1>
<ol>
    <?php
    foreach ($posts as $post) {
        echo '<li>' . $post->title . '</li>';
    }
    ?>
</ol>

</body>
</html>