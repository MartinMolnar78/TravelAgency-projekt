<?php
require_once('test.php');

if(isset($_POST['save_btn'])){
    $data=[
    'nazov'=>$_POST['nazov'],
    'obrazok'=>$_POST['obrazok'],
    'lokacia'=>$_POST['lokacia'],
    'hotel'=>$_POST['hotel'],
    'cena'=>$_POST['cena']];
    try {
        $datax = new Databaza();
        $query = "INSERT INTO data1(nazov, obrazok, lokacia, hotel, cena) VALUES (:nazov, :obrazok, :lokacia, :hotel, :cena)";
        $query_run = $datax->conn->prepare($query);
        $query_run->execute($data);

        header("Location: admin1.php");
        echo "Vykonane";
        exit();
    }catch(PDOException $e){
        print_r($e->getMessage());
        echo $e;
    }
}else{
    echo "Chyba";

}

?>