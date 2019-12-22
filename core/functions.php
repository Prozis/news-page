<?php
define(SERVER, 'localhost');
define(USER, 'root');
define(PASSWORD, '');
define(DB_NAME, 'news-page');
//подключение к базе
function connect(){
$link = mysqli_connect(SERVER, USER, PASSWORD, DB_NAME);
if (!$link) {
  printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
  exit;
}
mysqli_set_charset($link, "utf8");
return $link;
};
//фильтр вводимых данных
function input_filter ($a){
  $a = trim($a);
  $a = htmlspecialchars($a);
return $a;
}
 ?>
