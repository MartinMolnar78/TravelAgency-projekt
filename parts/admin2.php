<?php
session_start();
$conn=mysqli_connect("localhost","root","","skriptovacie");
if(!empty($_SESSION["id"])){

}
else{
    header("Location: admin2.php?error=neprihlaseny");
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>


        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
        }
    </style>
</head>
<body>
<div class="center">
    <a class="button" href="../parts/admin1.php">Admin 1</a>
    <a class="button" href="../parts/admin2.php">Admin 2</a>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Formulár</title>
</head>
<body>
<h2>Vkladanie údajov</h2>
<div>
    <form method="POST" action="insert2.php">
        <label for="nazov">Nazov:</label>
        <input type="text" name="nazov" id="nazov" required><br><br>

        <label for="obrazok">Obrazok:</label>
        <input type="text" name="obrazok" id="obrazok" required><br><br>

        <label for="popis">Popis:</label>
        <input type="text" name="popis" id="popis" required><br><br>

        <label for="book">Book:</label>
        <input type="text" name="book" id="book" required><br><br>

        <label for="cena">Cena:</label>
        <input type="text" name="cena" id="cena" required><br><br>

        <label for="link">Link:</label>
        <input type="text" name="link" id="link" required><br><br>


        <input type="submit" value="Odoslat" name="save_btn1">
    </form>
</div>
</body>
</html>

<?php
include_once "test.php";
$data = new Databaza();
$datax = $data->getData2();





if(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Value updated correctly</strong><br><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Value cannot be updated</strong><br><br>";
}
?>

<h2>Mazanie údajov</h2>
<ul>
    <style>
        table {
            border-collapse: collapse;
            width: 25%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        .delete-button2 {
            border: none;
            border-radius: 50%;
            background-color: black;
            color: white;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .delete-button:hover {
            background-color: #555555;
        }
    </style>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazov</th>
            <th>Obrazok</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($datax as $dataItem) {
            echo '<tr>';
            echo '<td>' . $dataItem['id'] . '</td>';
            echo '<td>' . $dataItem['nazov'] . '</td>';
            echo '<td><img src="../images/' . $dataItem['obrazok'] . '" alt="Menu Image" style="max-width: 100px; max-height: 100px;"></td>';
            echo '<td><a href="delete2.php?id=' . $dataItem['id'] . '" class="delete-button2">Delete</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</ul>

<h2>Update údajov</h2>
<style>
    .form-wrapper {
        padding: 10px;
        margin-bottom: 10px;
    }

    .form-container {
        border: 1px solid black;
        padding: 20px;
    }
</style>

<div class="form-container">
    <?php foreach ($datax as $dataItem) : ?>
        <div class="form-wrapper">
            <form method="POST" action="update2.php" style="display: inline-block;">
                <input type="hidden" name="id" value="<?= $dataItem['id'] ?>">
                <label for="nazov">Nazov:</label>
                <input type="text" name="nazov" value="<?= $dataItem['nazov'] ?>">
                <label for="obrazok">Obrazok:</label>
                <input type="text" name="obrazok" value="<?= $dataItem['obrazok'] ?>">
                <label for="lokacia">Popis:</label>
                <input type="text" name="popis" value="<?= $dataItem['popis'] ?>">
                <label for="book">Book:</label>
                <input type="text" name="book" value="<?= $dataItem['book'] ?>">
                <label for="cena">Cena:</label>
                <input type="text" name="cena" value="<?= $dataItem['cena'] ?>">
                <label for="link">Link:</label>
                <input type="text" name="link" value="<?= $dataItem['link'] ?>">
                <input type="submit" name="Submit2" value="Submit2">
            </form>
        </div>
    <?php endforeach; ?>
</div>
<a href="../admin/logout.php">Logout</a>