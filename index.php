<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Santri</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

a {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s;
}

a:hover {
    color: #0056b3;
}

.btn-tambah {
    display: inline-block;
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.btn-tambah:hover {
    background-color: #218838;
    color: white;
}

table {
    border-collapse: collapse;
    width: 100%;
    max-width: 900px;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

th {
    background-color: #007bff;
    color: white;
    padding: 12px;
    text-align: left;
}

td {
    border: 1px solid #ddd;
    padding: 10px;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

.aksi a {
    margin: 0 5px;
}

.edit {
    color: #ffc107;
}

.hapus {
    color: #dc3545;
}
    </style>
</head>
<body>

<h2>Data Santri</h2>
<a href="tambah.php">+ Tambah Data</a>
<br><br>
<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Alamat</th>
    <th>nilai</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM santri");
while ($d = mysqli_fetch_array($data)) {
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['kelas'] ?></td>
    <td><?= $d['alamat'] ?></td>
     <td><?= $d['nilai'] ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id'] ?>">Edit</a> |
        <a href="hapus.php?id=<?= $d['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>