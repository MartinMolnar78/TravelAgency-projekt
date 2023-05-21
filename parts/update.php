<?php
include_once "test.php";

if (isset($_POST['Submit'])) {
    $menuObj = new Databaza();
    $update = $menuObj->updateData(
        $_POST['id'],
        $_POST['nazov'],
        $_POST['obrazok'],
        $_POST['lokacia'],
        $_POST['hotel'],
        $_POST['cena']
    );

    if ($update) {
        header('Location: admin1.php');
        exit();
    } else {
        echo "Chyba: Failed to update the data.";
        exit();
    }
} else {
    header('Location: admin1.php');
    exit();
}
?>
