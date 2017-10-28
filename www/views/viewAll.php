<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Newsweek</title>
</head>
<body>
   <section style="font-weight: bolder; font-size: 2em;">
       <a href="index.php?ctrl=Admin&act=Admin">Form for Admin</a>
   </section>
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
</body>
</html>
