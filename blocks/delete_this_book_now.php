<?
include('../connect.php');

$id_book = $_GET['id_book'];


$delete = mysql_query("DELETE FROM book WHERE id = '$id_book' ");

if ($delete) {
	include("all_book.php");
} else {
	echo "Error!";
}

?>