<div class="container">
    <div class="row">
        <div class="our-listing owl-carousel">

            <?php
            include_once "parts/test.php";
            $menu = new Databaza();
            $data = $menu->getData();
            $menu->displayData($data);
            ?>

        </div>
    </div>
</div>
