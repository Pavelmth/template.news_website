<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Newsweek</title>
</head>
<body>
<section style="font-weight: bolder; font-size: 2em;">
    <a href="index.php">News list</a>
</section>
<section>
    <dl>
        <dt style="font-weight: bold; font-size: 1.5em;">
            <?php echo $this->data->date . ' - ' . $this->data->title; ?>
        </dt>
        <dd>
            <?php echo $this->data->content; ?>
        </dd>
    </dl>
</section>
</body>
</html>