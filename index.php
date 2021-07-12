<?
include('connect.php'); 
?>

<html>
<head>
<title> Books PHP </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">
	#wrp {
		align:center;
		width: 50%;
		margin: 30;
	}
	</style>

</head>
<body>




<?include ('header.html');?>




<br>
<div class="container">
  <div class="row">
    
    <div class="col-sm">
      <form action='search.php' method='post'>
        <input name='val' type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search" width='50%' required>

    <br> Выберите критерий поиска: &nbsp;
	<input name="dzen" type="radio" value="author"> Автор &nbsp;&nbsp;
    <input name="dzen" type="radio" value="nameB"> Название книги &nbsp;&nbsp;
    <input name="dzen" type="radio" value="annotation"> Описание &nbsp;&nbsp;
    <input name="dzen" type="radio" value="date_pub" checked> Дата публикации &nbsp;&nbsp;

        <button type="submit" class="btn btn-dark" width='20%'>Поиск</button>
    </form>
    </div>

  </div>
</div>










<div id='ajax_response'>
	<div class="album py-5 bg-light">
	<div class="container">
	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

	<?
		$all_book = mysql_query("SELECT id, author, nameB, annotation, date_pub, cover_book FROM book");
		$nom_book = mysql_num_rows($all_book);
		$count = 0;

		if ($nom_book > 0) {
			$row_book = mysql_fetch_array($all_book);
			do {

			#$annotation = mb_strimwidth($row_book['annotation'], 0, 200, "...");
			$annotation = $row_book['annotation'];
			$image = "<img src='".$row_book['cover_book']."'>";
			$date_pub = $row_book['date_pub'];
			$out_inf = '<b>'.$row_book['author'].' - '.$row_book['nameB']. '</b> <br><br>'. $annotation;

			echo '
			<div class="col">
	        <div class="card shadow-sm">
	        <img class="bd-placeholder-img card-img-top" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" src='.$row_book['cover_book'].'>

	        <div class="card-body">
	        <p class="card-text" style="text-align: justify;">'.$out_inf.'</p>
	        <div class="d-flex justify-content-between align-items-center">
	        <div class="btn-group">
	        <button type="button" class="btn btn-sm btn-outline-secondary">Просмотреть</button>
	        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
	        </div>
	        <small class="text-muted">'.$date_pub.'</small>
	        </div>
	        </div>
	        </div>
	        </div>
	        ';

			}
			while($row_book = mysql_fetch_array($all_book));
		}
	?>

	</div>
	</div>
	</div>
</div>




	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
	crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
	crossorigin="anonymous"></script>


</body>
</html>