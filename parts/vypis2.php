<div class="flexslider">
    <ul class="slides">
        <?php
        include_once "parts/test.php";
        $datax= new Databaza();
        $data = $datax->getData2();
        $datax->displayData2($data);
        ?>
    </ul>
</div>