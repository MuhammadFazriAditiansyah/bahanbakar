<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
    <link rel="stylesheet" href="ini.css">
</head>
<body>
    <div class="box">
    <?php
        // ini kode untuk PHP
    if($_SERVER["REQUEST_METHOD"] =="POST") {
        class shell {
            public $jumlah;
            public $jenis;
            public $ppn;
            public $data_harga = [
                    "S Super" => 15420,
                    "S V-Power" => 16130,
                    "S V-Power Diesel" => 18310,
                    "S V-Power Nitro" => 16510
                   
                ];

            public function __construct($jumlah, $jenis, $ppn){
                $this->jumlah = $jumlah;    
                $this->jenis = $jenis;
                $this->ppn = $ppn;
            }

            public function getJumlah() {
                return $this->jumlah;
            }

            public function getJenis() {
                return $this->jenis;
            }
        }

        // membuat class beli untuk mewarisi class shell

            class beli extends shell {
                public function getTotal() {
                    return $this->jumlah * $this->data_harga[$this->jenis] * (1 + $this->ppn);
                }
            }

        // membuat objek dari class shell dengan mengirim data yang di input oleh pengguna

            $beli = new beli($_POST['jumlah'],$_POST['jenis'],$_POST['ppn']);

            $total = $beli->getTotal();
            echo "<hr><br>";
            echo "Anda membeli bahan bakar minyak tipe ". $beli->getJenis(). "<br>" ;
            echo "dengan jumlah : ". $beli->getJumlah() . " liter <br>";
            echo "Total yang harus anda bayar RP. ". number_format($total,0,',','.') . "<br>";
            echo "<br><hr>"; 
    }
    ?>
    </div>
    <form method="post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Masukan Jumlah Liter : <input type = "number" name="jumlah" required><br><br>
    Pilih Tipe Bahan Bakar :
        <select name="jenis">
            <option value="S Super">Shell Super</option>
            <option value="S V-Power">Shell V-Power</option>
            <option value="S V-Power Diesel">Shell V-Power Diesel</option>
            <option value="S V-Power Nitro">Shell V-Power Nitro</option>
        </select><br><br><br>
        <button>Beli</button>
        <input type="hidden" name="ppn" value="0.10">
    </form>
    
</body>
</html>
