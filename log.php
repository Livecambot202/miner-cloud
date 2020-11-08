<?php 
if (isset($_POST['reg'])) {
	$login = $_POST['login'];
	$password1 = $_POST['password'];
	$email = $_POST['email'];

	setcookie("cookie1", $login, time()+3600);
setcookie("cookie2", $password1, time()+3600);


	$host = 'localhost';
	$user = 'id15330127_livecambot202';
	$password = '6)B_5HaN7W2@T6x';
	$database = 'id15330127_test';

	$link = mysqli_connect($host, $user, $password, $database)or die(mysqli_error($link));
$query = "INSERT INTO users (user, password, email, files, bites) VALUES ('{$login}', '{$password1}', '{$email}', '', 0)";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

		echo "<script>location.href = 'profile.php'</script>";
	
}
if (isset($_POST['log'])) {
	$log2 = $_POST['log2'];
	$pas2 = $_POST['pas2'];

	$host = 'localhost';
	$user = 'id15330127_livecambot202';
	$password = '6)B_5HaN7W2@T6x';
	$database = 'id15330127_test';

	$link = mysqli_connect($host, $user, $password, $database)or die(mysqli_error($link));
	$query = "SELECT * FROM users WHERE user = '{$log2}' AND password = '{$pas2}'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		setcookie("cookie1", $log2, time()+3600);
        setcookie("cookie2", $pas2, time()+3600);
		echo "<script>location.href = 'profile.php'</script>";
	} else {
		echo"<script>location.href = 'login.html'</script>";
	}
} ?>