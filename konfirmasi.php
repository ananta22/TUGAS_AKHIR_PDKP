<?php
include 'data_penyewaan.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penyewaan PlayStation</title>
    <style>
        body {
            text-align: center;
        }

        h2 {
            color: white;
            font-size: 24px; /* Ubah ukuran font menjadi 24px */
            font-weight: bold; /* Ubah ketebalan font menjadi bold */
            margin-top: 100px;
        }

        p {
            color: white;
            font-size: 16px; /* Ubah ukuran font menjadi 16px */
        }

        .penyewaan-container {
            border: 5px solid #ffffff; /* Menambahkan garis tepi */
            width: 300px; /* Lebar form */
            margin: 0 auto; /* Memastikan posisi di tengah */
            padding: 10px 10px 20px 10px; /* Jarak antara form dengan tepi */
            border-radius: 20px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = $_POST["model"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $tanggal = $_POST["tanggal"];
    $telepon = $_POST["telepon"];
    $durasi = $_POST["durasi"];

    $penyewaan = new Penyewaan($model, $nama, $alamat, $tanggal, $telepon, $durasi);

    // Tentukan harga per jam berdasarkan model PlayStation yang dipilih
    if ($model == "PS4") {
        $hargaPerJam = 10000; // Harga per jam untuk PlayStation 4
    } elseif ($model == "PS5") {
        $hargaPerJam = 15000; // Harga per jam untuk PlayStation 5
    } else {
        // Model PlayStation tidak valid, lakukan penanganan kesalahan jika diperlukan
    }

    $totalHarga = $penyewaan->hitungTotalHarga($hargaPerJam);

    echo "<h2>Detail Penyewaan:</h2>";
    echo "<div class='penyewaan-container'>";
    echo "<p>Anda Menyewa Model PlayStation: " . $penyewaan->getModel() . "</p>";
    echo "<p>Nama: " . $penyewaan->getNama() . "</p>";
    echo "<p>Alamat: " . $penyewaan->getAlamat() . "</p>";
    echo "<p>Tanggal Penyewaan: " . $penyewaan->getTanggal() . "</p>";
    echo "<p>Nomor Telepon: " . $penyewaan->getTelepon() . "</p>";
    echo "<p>Durasi Penyewaan: " . $penyewaan->getDurasi() . " jam</p>";
    echo "<p>Total Harga: Rp" . number_format($totalHarga, 0, ',', '.') . "</p>";
    echo "</div>";
}
?>
</body>
</html>
