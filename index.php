<?php
require_once 'core/functions.php';
 ?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Last news</title>
  </head>
  <body>
<header>
  <?php
require_once 'header.php';
?>
</header>
<div class="main">
<?php
$link = connect();
$query = 'SELECT * FROM news';
if ($result = mysqli_query($link, $query)) {

  /* Выборка результатов запроса */

  while($row = mysqli_fetch_assoc($result) ){
    echo "<h3>{$row['titlle']}</h3><img src='{$row['image']}' width='400'><p>{$row['mindescr']}</p>{$row['time']}<hr>";

  /* Освобождаем используемую память */

}
}
mysqli_free_result($result);
  mysqli_close($link);
 ?>

</div>

  </body>
</html>
