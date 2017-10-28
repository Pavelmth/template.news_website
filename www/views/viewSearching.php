<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Form for searching</title>
</head>
<body>
<section style="font-weight: bolder; font-size: 2em;">
    <a href="index.php">News list</a>
</section>
<br>
<section>
    <form method="post">
        <input type="text" name="date"> - put date <br><br>
        <input type="text" name="title"> - put title <br><br>
        <textarea name="content"></textarea> - put content <br><br>
        <input type="submit" name="button" value="Отправить">
    </form>

    <section>
        <dl>
            <?php
            foreach ($this->data as $item):?>
                <a href="index.php?ctrl=News&act=OneByFk&id=<?php echo $item->id;?>">
                    <dt style="font-weight: bold;"> <?php echo $item->date . ' - ' . $item->title;?> </dt>
                </a>
                <dd> <?php echo $item->content;?> </dd>
            <?php endforeach;?>
        </dl>
    </section>
</section>
</body>
</html>