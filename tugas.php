<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas PHP Dasar - Bidang IT</title>
</head>
<body>
    <h2>Form Input Data</h2>
    <form method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" required><br><br>

        <label>Pekerjaan:</label><br>
        <select name="pekerjaan" required>
            <option value="">-- Pilih Pekerjaan --</option>
            <option value="Programmer">Programmer</option>
            <option value="Web Developer">Web Developer</option>
            <option value="IT Support">IT Support</option>
            <option value="Cyber Security Analyst">Cyber Security Analyst</option>
            <option value="Data Analyst">Data Analyst</option>
        </select><br><br>

        <input type="submit" value="Kirim">
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // Hitung umur
        $tanggal_lahir_obj = new DateTime($tanggal_lahir);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($tanggal_lahir_obj)->y;

        // Tentukan gaji berdasarkan pekerjaan
        switch ($pekerjaan) {
            case "Programmer": 
                $gaji = 7000000; 
                break;
            case "Web Developer": 
                $gaji = 6500000; 
                break;
            case "IT Support": 
                $gaji = 5000000; 
                break;
            case "Cyber Security Analyst": 
                $gaji = 9000000; 
                break;
            case "Data Analyst": 
                $gaji = 8500000; 
                break;
            default: 
                $gaji = 0; 
                break;
        }

        // Tampilkan hasil
        echo "<h3>Hasil Data</h3>";
        echo "Nama: $nama <br>";
        echo "Tanggal Lahir: " . date('d-m-Y', strtotime($tanggal_lahir)) . "<br>";
        echo "Umur: $umur tahun<br>";
        echo "Pekerjaan: $pekerjaan <br>";
        echo "Gaji: Rp " . number_format($gaji, 0, ',', '.');
    }
    ?>
</body>
</html>