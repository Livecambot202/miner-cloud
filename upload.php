<?php
	if ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK)
{
    $name = $_FILES['filename']['name'];
    if (!file_exists('pages/files/' . $name)) {
    echo($_FILES["f"]["size"]);
    move_uploaded_file($_FILES['filename']['tmp_name'], 'pages/files/' . $name);
    echo "Файл загружен";
    $file = filesize('pages/files/' . $name);
    echo($file); 
$m = '<1>' . $name . '<2>' . $name . '</1>';
$host = 'localhost';
	$user = 'id15330127_livecambot202';
	$password = '6)B_5HaN7W2@T6x';
	$database = 'id15330127_test';

	$link = mysqli_connect($host, $user, $password, $database)or die(mysqli_error($link));
	$query = "SELECT * FROM users WHERE user = '{$_COOKIE['cookie1']}' AND password = '{$_COOKIE['cookie2']}'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	$data = mysqli_fetch_array($result);

$query = "UPDATE users SET files = CONCAT('{$m}', files) WHERE user = '{$_COOKIE['cookie1']}' AND password = '{$_COOKIE['cookie2']}'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

	$e = $data['bites'] + $file;
	$query = "UPDATE users SET bites = '$e' WHERE user = '{$_COOKIE['cookie1']}' AND password = '{$_COOKIE['cookie2']}'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

	$h = fopen('pages/' . $name . '.html', w);
	fwrite($h, '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Файл</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.css">
</head>
<body>
<h1>Файл загружен <br> пользователем '.$data['user'] .'</h1>
<h2>Вы можите загрузить этот <br> файл на свое устройство</h2>
<a href ="files/'. $name .'" download><button>Скачать файл</button></a>');
	fclose($h);
	echo "<script>location.href = 'profile.php'</script>"; } }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ошибка!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="buttons.css">
</head>
<body>
<h1>Произошла ошибка при <br> загрузке файла!</h1>
<h2>Попробуйте сделать следущее</h2>
<ul>
	<li>Переименуйте свой файл</li>
</ul>
<a href="profile.php"><button>Вернуться к профилю</button></a>
</body>
</html>