<?
include('connect.php');


if (!$_SESSION['ID_admin']) {
  exit('Access denied!');
}


?>

<html>
<head>
<title> Books PHP </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script type="text/javascript" src="js/jquery.js"></script>


<script>
$(document).ready(function() {
  $('#edit_my_books').submit(function(){
    $.post("blocks/please_edit_this_book_now.php", $("#edit_my_books").serialize(),  
    function(response) {
      document.getElementById("respT").innerHTML=response;
    });
    return false;
  });
});




$(document).ready(function() {
  $('#add_new_book').submit(function(){
    $.post("blocks/once_new_book_really.php", $("#add_new_book").serialize(),  
    function(response) {
      document.getElementById("RESPONE_MY").innerHTML=response;
    });
    return false;
  });
});
</script>




<script>
function edit_this_book(arg) {
    $.ajax({
    url: 'blocks/editBook.php?id_book='+arg+'',
    success: function(data) {
    document.getElementById("resp_forma").innerHTML=data;
    }
    });
    }


function delete_this_book(arg) {
    $.ajax({
    url: 'blocks/delete_this_book_now.php?id_book='+arg+'',
    success: function(data) {
    document.getElementById("RESPONE_MY").innerHTML=data;
    }
    });
    }
</script>



</head>
<body >





<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Панель администратора</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal_2">Добавить книгу</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<br><br>












<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактирование книги</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

              <form id="edit_my_books" method="POST">
                 <div id='resp_forma'>  <div class="spinner-border" role="status"></div>   </div>
              </form>     <span id='respT'></span>
      
      </div>
    </div>
  </div>
</div>





<!-- Modal 2 -->
<div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить новую книгу</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

              <form id="add_new_book" method="POST">
                 <div class="mb-3">
                <input name="author" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Автор: " required>
                </div>

                <div class="mb-3">
                <input name="book_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Название книги: " required>
                </div>

                <div class="mb-3">
                <textarea name="anno_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Аннотация: " required>  </textarea>
                </div>

                <div class="mb-3">
                <input name="book_date" type="datetime" class="form-control" id="exampleInputPassword1" placeholder="Дата публикации книги: " required>
                </div>

                <button type="submit" class="btn btn-primary">Создать запись</button>
              </form>
      
      </div>
    </div>
  </div>
</div>








<div id='RESPONE_MY'>

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
      $ID_BOOK = $row_book['id'];
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
          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="delete_this_book('.$ID_BOOK.')">Удалить</button>
          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="edit_this_book('.$ID_BOOK.')" data-bs-toggle="modal" data-bs-target="#exampleModal">Изменить</button>
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