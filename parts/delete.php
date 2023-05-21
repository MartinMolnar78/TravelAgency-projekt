<?php
include_once "test.php";
$dataObj = new Databaza();
$data = $dataObj->getData();

if(isset($_GET['id'])) {
    $delete = $dataObj->Delete($_GET['id']);
    if($delete) {
        header('Location: admin1.php');
    } else {
        echo "Error";
    }
} else {
    header('Location: admin1.php');
}?>