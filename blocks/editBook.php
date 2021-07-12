<?
include('../connect.php');

$id_book = $_GET['id_book'];


$aboutBook = mysql_query("SELECT * FROM book WHERE id = '$id_book' ");
$row_book = mysql_fetch_array($aboutBook);


echo '

	<div class="mb-3">
	<input name="author" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Автор: " value="'.$row_book['author'].'">
	</div>

	<div class="mb-3">
	<input name="book_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Название книги: " value="'.$row_book['nameB'].'">
	</div>

	<div class="mb-3">
	<textarea name="anno_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Аннотация: "> '.$row_book['annotation'].' </textarea>
	</div>

	<div class="mb-3">
	<input name="book_date" type="datetime" class="form-control" id="exampleInputPassword1" placeholder="Дата публикации книги: " value="'.$row_book['date_pub'].'">
	</div>

<button type="submit" class="btn btn-primary">Сохранить</button>

';

?>