<?php
// include conection file
include ('../connection.php');
$alternews_add='ALTER TABLE news ADD status ENUM("0","1") NOT NULL AFTER content ';
$news=$conn->query($alternews_add);

?>