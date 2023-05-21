<?php
class Databaza
{
    public $conn;

    function __construct()
    {
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=skriptovacie;charset=utf8','root','');
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }
    }




    public function getData(): array
    {
        $data = [];

        try {
            $sql = "SELECT * FROM data1";
            $query = $this->conn->query($sql);
            $dataItems = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($dataItems as $dataItem) {
                $data[$dataItem['id']] = [
                    'id' => $dataItem['id'],
                    'nazov' => $dataItem['nazov'],
                    'obrazok' => $dataItem['obrazok'],
                    'lokacia' => $dataItem['lokacia'],
                    'hotel' => $dataItem['hotel'],
                    'cena' => $dataItem['cena']
                ];
            }
        } catch (\Exception $exception) {
            echo "Nastala_chyba";
        }

        return $data;
    }

    public function displayData($data)
    {
        foreach ($data as $value) {
            echo '<div class="list-item">
                    <div class="list-thumb">
                        <div class="title">
                            <h4>'.$value['nazov'].'</h4>
                        </div>
                        <img src="images/'.$value['obrazok'].'" alt="destination 1">
                    </div>
                    <div class="list-content">
                        <h5>'.$value['lokacia'].'</h5>
                        <span>'.$value['hotel'].'</span>
                        <a href="#" class="price-btn">'.$value['cena'].'</a>
                    </div>
                </div>';
        }
    }
    public function Delete(string $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM data1 WHERE id = ".$id;

        try {

            $statement = $this->conn->prepare($sql);
            $delete = $statement->execute();
        } catch (\Exception $exception) {
            echo "Unable to delete value.";
        }

        return $delete;
    }

    public function updateData(int $id, string $nazov, string $obrazok, string $lokacia, string $hotel, string $cena): bool
    {
        try {
            $sql = "UPDATE data1 SET nazov = :nazov, obrazok = :obrazok, lokacia = :lokacia, hotel = :hotel, cena = :cena WHERE id = :id";
            $statement = $this->conn->prepare($sql);
            $statement->bindValue(':nazov', $nazov);
            $statement->bindValue(':obrazok', $obrazok);
            $statement->bindValue(':lokacia', $lokacia);
            $statement->bindValue(':hotel', $hotel);
            $statement->bindValue(':cena', $cena);
            $statement->bindValue(':id', $id);
            $update = $statement->execute();
        } catch (\Exception $exception) {
            $update = false;
        }

        return $update;
    }


    public function getData2(): array
    {
        $datax = [];

        try {
            $sql = "SELECT * FROM data2";
            $query = $this->conn->query($sql);
            $dataxItems = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($dataxItems as $dataItem) {
                $datax[$dataItem['id']] = [
                    'id' => $dataItem['id'],
                    'nazov' => $dataItem['nazov'],
                    'obrazok' => $dataItem['obrazok'],
                    'popis' => $dataItem['popis'],
                    'book' => $dataItem['book'],
                    'cena' => $dataItem['cena'],
                    'link' => $dataItem['link']
                ];
            }
        } catch (\Exception $exception) {
            echo "Nastala_chyba";
        }

        return $datax;
    }

    public function displayData2($datax)
    {
        foreach ($datax as $value) {
            echo '<li>
                    <div class="overlay"></div>
                    <img src="images/'.$value['obrazok'].'" alt="Special 1">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-lg-4">
                                <div class="flex-caption visible-lg">
                                    <span class="price">'.$value['cena'].'</span>
                                    <h3 class="title">'.$value['nazov'].'</h3>
                                    <p>'.$value['popis'].'</p>
                                    <a href="'.$value['link'].'" class="slider-btn">'.$value['book'].'</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>';
        }


    }

    public function Delete2(string $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM data2 WHERE id = ".$id;

        try {

            $statement = $this->conn->prepare($sql);
            $delete = $statement->execute();
        } catch (\Exception $exception) {
            echo "Unable to delete value.";
        }

        return $delete;
    }

    public function updateData2(int $id, string $nazov, string $obrazok, string $popis, string $book, string $cena,string $link): bool
    {
        try {
            $sql = "UPDATE data2 SET nazov = :nazov, obrazok = :obrazok, popis = :popis, book = :book, cena = :cena,link=:link WHERE id = :id";
            $statement = $this->conn->prepare($sql);
            $statement->bindValue(':nazov', $nazov);
            $statement->bindValue(':obrazok', $obrazok);
            $statement->bindValue(':popis', $popis);
            $statement->bindValue(':book', $book);
            $statement->bindValue(':cena', $cena);
            $statement->bindValue(':link', $link);
            $statement->bindValue(':id', $id);
            $update2 = $statement->execute();
        } catch (\Exception $exception) {
            $update2 = false;
        }

        return $update2;
    }







}

?>
