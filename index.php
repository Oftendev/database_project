/*
HTML форма для поиска 
*/
<html>
   <head>
        <meta charset="utf-8">
        <title>Поисковик</title>
   </head>
   <body>
   <p1> 
        <form action = "searcher.php" method = "POST">
            <textarea name = "name" placeholder="Введите поисковой запрос"></textarea>
            <input type = "submit" value="Найти">
        </form>
    </p1>
    <p2>
<!--        <form action = "loader.php">
            <input type = "submit" value="Загрузить базу данных">
        </form>
        <form action = "eraser.php" method = "POST">
            <input name = "erase" type = "submit" value="Очистить базу данных">
        </form> -->   
    </p2>  
   </body>
</html>
