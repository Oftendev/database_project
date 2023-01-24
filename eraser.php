/*
Это скрипт для удаления всех записей из таблиц базы данных (нужен был для тестировния)
*/
<?php


    $link = mysqli_connect("localhost", "root", "", "my_db");
    if ($link == false){
        print("<script> console.log(Ошибка: Невозможно подключиться к MySQL ".mysqli_connect_error().")</script>");
    }
    else {
        print("<script> console.log('Соединение с базой данных установлено успешно') </script>");
    }


    $sql_new = "DELETE FROM `my_db`.`comments`";
    $result = mysqli_query($link, $sql_new);
    if ($result = false){
        print("Произошла ошибка при удалении таблицы comments')");
        exit();
    }
    $sql_new = "DELETE FROM `my_db`.`posts`";
    $result = mysqli_query($link, $sql_new);
    if ($result = true){
        print("Произошла ошибка при удалении таблицы posts");
        exit();
    }
    echo "<h1>База данных очищена</h1>";


?>