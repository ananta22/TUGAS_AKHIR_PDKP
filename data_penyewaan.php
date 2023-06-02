<?php

class Penyewaan
{
    private $model;
    private $nama;
    private $alamat;
    private $tanggal;
    private $telepon;
    private $durasi;

    public function __construct($model, $nama, $alamat, $tanggal, $telepon, $durasi)
    {
        $this->model = $model;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->tanggal = $tanggal;
        $this->telepon = $telepon;
        $this->durasi = $durasi;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function getTanggal()
    {
        return $this->tanggal;
    }

    public function getTelepon()
    {
        return $this->telepon;
    }

    public function getDurasi()
    {
        return $this->durasi;
    }

    public function hitungTotalHarga($hargaPerJam)
    {
        return $hargaPerJam * $this->durasi;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari form
    $model = $_POST['model'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $telepon = $_POST['telepon'];
    $durasi = $_POST['durasi'];

    // Membuat objek DateTime dari tanggal penyewaan
    $tanggalPenyewaan = DateTime::createFromFormat('Y-m-d', $tanggal);

    // Membuat objek Penyewaan
    $penyewaan = new Penyewaan($model, $nama, $alamat, $tanggalPenyewaan, $telepon, $durasi);

    // Redirect atau tampilkan konfirmasi sesuai kebutuhan
    // ...

}

?>

<html>
<link rel="stylesheet" type="text/css" href="data_penyewaan.css">
<head>
</head>
<body>
    <h1>Selamat datang di Layanan Penyewaan PlayStation!</h1>
    <form action="konfirmasi.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" required><br>

        <label for="tanggal">Tanggal Penyewaan:</label>
        <input type="date" name="tanggal" id="tanggal" required><br>

        <label for="telepon">Nomor Telepon:</label>
        <input type="text" name="telepon" id="telepon" required><br>

        <label for="durasi">Durasi Penyewaan (jam):</label>
        <input type="number" name="durasi" id="durasi" min="1" required><br>

        <label for="model">Model PlayStation:</label>
        <select name="model" id="model">
            <option value="PS4">PlayStation 4 (Rp 10,000 per jam)</option>
            <option value="PS5">PlayStation 5 (Rp 15,000 per jam)</option>
        </select>

        <input type="submit" value="Sewa">
    </form>
</body>
</html>