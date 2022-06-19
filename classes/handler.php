<?php
include_once('./main_class.php');
$database = new marsetech('localhost','root','','marstech');
$_POST['date'] = date('d-m-Y');
print_r($_POST);


?>