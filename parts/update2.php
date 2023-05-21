<?php
include_once "test.php";

if (isset($_POST['Submit2'])) {
    $datax = new Databaza();
    $update2 = $datax->updateData2(
        $_POST['id'],
        $_POST['nazov'],
        $_POST['obrazok'],
        $_POST['popis'],
        $_POST['book'],
        $_POST['cena'],
        $_POST['link']
    );

    if ($update2) {
        header('Location: admin2.php');
        exit();
    } else {
        echo "Chyba: Failed to update the data.";
        exit();
    }
} else {
    header('Location: admin2.php');
    exit();
}
?>
