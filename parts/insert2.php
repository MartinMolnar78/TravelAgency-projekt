<?php
require_once('test.php');

if(isset($_POST['save_btn1'])){
    $data=[
        'nazov'=>$_POST['nazov'],
        'obrazok'=>$_POST['obrazok'],
        'popis'=>$_POST['popis'],
        'book'=>$_POST['book'],
        'cena'=>$_POST['cena'],
        'link'=>$_POST['link']];

    try {
        $datax = new Databaza();
        $query = "INSERT INTO data2(nazov, obrazok, popis, book, cena,link) VALUES (:nazov, :obrazok, :popis, :book, :cena,:link)";
        $query_run = $datax->conn->prepare($query);
        $query_run->execute($data);
        echo "Vykonane";
        header("Location: admin2.php");
        exit();
    }catch(PDOException $e){
        print_r($e->getMessage());
        echo $e;
    }
}else{
    echo "Chyba";

}

?>