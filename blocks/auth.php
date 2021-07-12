<?
include('../connect.php');

$login = $_POST['login'];
$password = sha1($_POST['password']);


$check = mysql_query("SELECT id, login, password FROM admins WHERE login = '$login' AND password = '$password' ");


if (mysql_num_rows($check) == 1) {
    $row_user = mysql_fetch_array($check);
    $_SESSION['ID_admin'] = $row_user['id'];
    echo "<div align='center'><a href='panel.php'> Перейти в панель, </a></div>";
} else {
    echo "<div align='center'>Неверный логин или пароль!</div>";
}

?>
