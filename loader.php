/*
Это скрипт для загрузки записей в таблицы базы данных
*/
<?php
$link = mysqli_connect("localhost", "root", "", "my_db");
if ($link == false){
    print("<script> console.log(Ошибка: Невозможно подключиться к MySQL ".mysqli_connect_error().")</script>");
}
else {
    print("<script> console.log('Соединение с базой данных установлено успешно') </script>");
}



$posts_c=0;
$posts = @file_get_contents("https://jsonplaceholder.typicode.com/posts");
$posts_array = json_decode($posts, true);
foreach($posts_array as $p) { 
	$p_userId = $p["userId"];
	$p_id = $p["id"];
	$p_title = $p["title"];
	$p_body = $p["body"];
	$sql = "INSERT INTO posts SET userId=$p_userId, id=$p_id, title=\"$p_title\", body=\"$p_body\";";
	$result = mysqli_query($link, $sql);

	if ($result == false) {
    	print("<script> console.log('Произошла ошибка при загрузке записи в таблицу posts') </script>");
	} else {
		$posts_c++;
	} 

} 

$comments_c=0;
$comments = @file_get_contents("https://jsonplaceholder.typicode.com/comments");
$comments_array = json_decode($comments, true);
foreach($comments_array as $c) { 
	$c_postId = $c["postId"];
	$c_id = $c["id"];
	$c_name = $c["name"];
	$c_email = $c["email"];
	$c_body = $c["body"];
	$sql = "INSERT INTO comments SET postId=$c_postId, id=$c_id, name=\"$c_name\", email=\"$c_email\", body=\"$c_body\";";	
	$result = mysqli_query($link, $sql);

	if ($result == false) {
    	print("<script> console.log('Произошла ошибка при загрузке записей в таблицу comments') </script>");
	} else {
		$comments_c++;
	}

} 

print("<script> console.log('Загружено $posts_c записей и $comments_c комментариев.') </script>");
print("Загружено $posts_c записей и $comments_c комментариев.");



?>
