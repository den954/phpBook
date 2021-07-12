<?
include('../connect.php');


$id_book = $_POST['id_book'];
$author = $_POST['author'];
$name = $_POST['book_name'];
$anno = $_POST['anno_name'];
$dateB = $_POST['book_date'];


$upd = mysql_query("INSERT INTO book (author, nameB, annotation, date_pub, cover_book) VALUES ('$author','$name','$anno','$dateB','images/pic.jpg')");
if ($upd) {
	include("all_book.php");
} else {
	echo 'Update error!';
}
?>