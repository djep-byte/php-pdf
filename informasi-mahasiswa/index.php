<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa Kelas IX RPL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Siswa Kelas IX<br>Jurusan Rekayasa Perangkat Lunak</h2>

    <div class="cetak-btn">
        <a href="cetak.php" target="_blank">Cetak Laporan PDF</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM siswa WHERE kelas = 'IX RPL' ORDER BY nis ASC";
            $result = $koneksi->query($query);
            $no = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nis']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_siswa']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data siswa.</td></tr>";
            }
            $koneksi->close();
            ?>
        </tbody>
    </table>
</body>
</html>