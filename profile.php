 <?php 
if (!isset($_COOKIE['cookie1'])) {
	echo "<script>location.href = 'index.html'</script>";
}
$host = 'localhost';
	$user = 'id15330127_livecambot202';
	$password = '6)B_5HaN7W2@T6x';
	$database = 'id15330127_test';

	$link = mysqli_connect($host, $user, $password, $database)or die(mysqli_error($link));
	$query = "SELECT * FROM users WHERE user = '{$_COOKIE['cookie1']}' AND password = '{$_COOKIE['cookie2']}'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	$data = mysqli_fetch_array($result);
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="buttons.css">
</head>
<body>
    <h2 align="center">Профиль</h2>
    <div>
<?php
$m = $data['bites'];
echo '<h3>Использовано: ' . $m . ' байтов/100 МБ</h3><br>';
echo "<h2>Загрузка файла:</h2><form action = 'upload.php' method = 'post' enctype='multipart/form-data'><input type = 'file' name = 'filename'><br><br><button type = 'submit'>Загрузить</button></form>";
echo "<h2>Ваши файлы:</h2>";
$b = str_replace('<1>', '<a href = "pages/', $data['files']);
$b = str_replace('<2>', '.html"><h2 class="negative" align="center" style="border: solid; width: 250px; height: 100px; padding-top: 50px;">', $b);
$b = str_replace('</1>', '</h2></a>', $b);
echo($b);
?> </div>
</body>
</html>