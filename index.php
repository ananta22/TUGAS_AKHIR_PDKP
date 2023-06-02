<?php
class PlayStation
{
    private $model;
    private $harga;
    private $tersedia;

    public function __construct($model, $harga, $tersedia)
    {
        $this->model = $model;
        $this->harga = $harga;
        $this->tersedia = $tersedia;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function isTersedia()
    {
        return $this->tersedia;
    }

    public function setTersedia($tersedia)
    {
        $this->tersedia = $tersedia;
    }
}

function tampilkanPilihanPlayStation($ps4, $ps5)
{
    echo "<ul>";
    echo "<li>";
    echo "<img src='img/pees4.jpeg' alt='PlayStation Image'>";
    echo "<h3>" . $ps4->getModel() . "</h3>";
    echo "<p>Harga: " . $ps4->getHarga() . " per jam</p>";
    echo "<p>Tersedia: " . ($ps4->isTersedia() ? "Ya" : "Tidak") . "</p>";
    if ($ps4->isTersedia()) {
        echo "<a href='javascript:void(0)' onclick='lanjutkanSewa()'>Sewa</a>";
    } else {
        echo "<p>Tidak dapat disewa saat ini</p>";
    }
    echo "</li>";
    echo "<li>";
    echo "<img src='img/pees5.jpeg' alt='PlayStation Image'>";
    echo "<h3>" . $ps5->getModel() . "</h3>";
    echo "<p>Harga: " . $ps5->getHarga() . " per jam</p>";
    echo "<p>Tersedia: " . ($ps5->isTersedia() ? "Ya" : "Tidak") . "</p>";
    if ($ps5->isTersedia()) {
        echo "<a href='javascript:void(0)' onclick='lanjutkanSewa()'>Sewa</a>";
    } else {
        echo "<p>Tidak dapat disewa saat ini</p>";
    }
    echo "</li>";
    echo "</ul>";
}

$ps4 = new PlayStation("PlayStation 4", 10000, false);
$ps5 = new PlayStation("PlayStation 5", 15000, true); 

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Penyewaan PlayStation</title>
    <script>
        function lanjutkanSewa() {
            window.location.href = 'data_penyewaan.php';
        }
    </script>
</head>
<body>
    <h1>Selamat datang di Layanan Penyewaan PlayStation!</h1>
    <h2>Pilihan PlayStation yang tersedia:</h2>
    <?php tampilkanPilihanPlayStation($ps4, $ps5); ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    </form>
</body>
</html>
