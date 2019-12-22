<?php
require_once 'functions.php';
$link = connect();
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Last news - Admin panel</title>
</head>
<body>
  <header>
    <?php
    require_once '../header.php';
    ?>
  </header>
  <h2>Админ панель</h2>
  <div class="main">
    <h3>Добавить запись</h3>
    <form class="" action="#" enctype="multipart/form-data" method="post">
      <label for="titlle">Заголовок</label>
      <input type="text" name="titlle" ><br>
      <label for="min-descr">Краткое описание"</label>
      <input type="text" name="min-descr" ><br>
      <label for="text">Текст</label>
      <input type="text" name="text" ><br>

      <input type="file" name="image" multiple accept="image/*"><br><br>
      <button type="submit" name="button">Добавить</button>
    </form>
    <?php
    if(isset($_POST['titlle'])){
      $titlle = input_filter($_POST['titlle']);
      $min_descr = input_filter($_POST['min-descr']);
      $text = input_filter($_POST['text']);
      $uploaddir = '../img/';
      $uploadfile = $uploaddir . basename($_FILES['image']['name']);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        echo "Картинка добавлена\n";
      } else {
        echo "Ошибка загрузки изображения!\n";
      }
      if($titlle != '' && $min_descr != '' && $text != ''){
        /* Добавляем данные из формы в базу данных */
        $query_insert = "INSERT INTO news (titlle, mindescr, newstext, image)
        VALUES ('$titlle', '$min_descr', '$text', '$uploadfile')";
        if (!mysqli_query($link, $query_insert)) {
          echo "Error: " . mysqli_error($link);
        } else {
          echo "Статья добавлена";
        }
      }
    }
    mysqli_close($link);
    ?>

  </div>

</body>
</html>
