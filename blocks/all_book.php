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