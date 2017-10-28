<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Form for add news</title>
</head>
<body>
    <section style="font-weight: bolder; font-size: 2em;">
        <a href="index.php">News list</a>
    </section>
    <section>
        <form method="post">
            <input type="text" name="title"><br><br>
            <textarea name="content"></textarea><br><br>
            <input type="submit" name="button" value="Отправить">
        </form>
        <p>Id - <?php echo $this->data;?></p>
    </section>
</body>
</html>
