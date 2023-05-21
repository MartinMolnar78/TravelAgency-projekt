<?php
include_once "test.php";
$data = new Databaza();
$datax = $data->getData2();

if(isset($_GET['id'])) {
    $delete = $data->Delete2($_GET['id']);
    if($delete) {
        header('Location: admin2.php');
    } else {
        echo "Error";
    }
} else {
    header('Location: admin2.php');
}?>