<?
include('../connect.php');


$id_book = $_POST['id_book'];
$author = $_POST['author'];
$name = $_POST['book_name'];
$anno = $_POST['anno_name'];
$dateB = $_POST['book_date'];


$upd = mysql_query("UPDATE book SET author = '$author', nameB = '$name' WHERE id = '$id_book ' ");
if ($upd) {
	echo 'Успешно обновлено!';
} else {
	echo 'Update error!';
}
?>


