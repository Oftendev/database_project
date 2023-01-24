<html>
   <head>
        <meta charset="utf-8">
        <title>Поисковик</title>
        <style>
            .comment {
               margin-top: 5px;
               margin-bottom: 5px;
            }
            .comment_name {
               margin-left: 20px;
            }
            .comment_text {
               background-color: #e3e3e3;
               padding: 5px;
            }
        </style>
   </head>
</html>
<?php

$link = mysqli_connect("localhost", "root", "", "my_db");
if ($link == false){
    print("<script> console.log(Ошибка: Невозможно подключиться к MySQL ".mysqli_connect_error().")</script>");
    exit();
}
else {
    print("<script> console.log('Соединение с базой данных установлено успешно') </script>");
}

$search_q = $_POST['name'];
if (strlen(trim($search_q)) < 3){
   echo "<h1>Ошибка</h1><p>Запрос должен содержать не меньше 3 символов</p>";
   exit();
}

$sql = "SELECT posts.id AS p_id, comments.id AS c_id FROM comments INNER JOIN posts ON comments.postId = posts.Id WHERE comments.body LIKE '%$search_q%'";
$result = mysqli_query($link, $sql);

$rows = mysqli_fetch_all($result, $mode = MYSQLI_ASSOC);

if (empty($rows)){
   print("<h1>Комментарии не найдены</h1>");
   exit();
}

$post_comment_assoc = [];
foreach ($rows as $row){
   $post_comment_assoc[$row["p_id"]][] = $row["c_id"];
   
}


foreach ($post_comment_assoc as $p_id => $c_ids) {
   $post_name = mysqli_fetch_array(mysqli_query($link, "SELECT title FROM posts WHERE id=$p_id"))[0];
   print("<big><b>Post title: $post_name </b></big></br>");
   $c_count = count($c_ids);
   print("Comments ($c_count):</br>");

   foreach ($c_ids as $c_id) {
      $name = mysqli_fetch_array(mysqli_query($link, "SELECT name FROM comments WHERE id=$c_id"))[0];
      $text = mysqli_fetch_array(mysqli_query($link, "SELECT body FROM comments WHERE id=$c_id"))[0]; 
      print("<div class=\"comment\"> 
             <div class=\"comment_name\">
             Name: $name
             </div> 
             <div class=\"comment_text\">$text</div> 
             </div>");
      
   }
}

?>