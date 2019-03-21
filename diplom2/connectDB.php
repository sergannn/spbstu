

<?php
$mysqli = mysqli_connect("localhost", "root", "root","accounts");

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

//printf("Изначальная кодировка: %s\n", $link->character_set_name());

/* изменение набора символов на utf8 */
if (!$mysqli->set_charset("utf8")) {
//    printf("Ошибка при загрузке набора символов utf8: %s\n", $link->error);
    exit();
}
// else {
//    printf("Текущий набор символов: %s\n", $link->character_set_name());
//}

//$link->close();
?>
