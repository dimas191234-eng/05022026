<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Santri</title>
</head>
<body>
<h2>Tambah Data Santri</h2>
<form method="post">
    Nama <br>
    <input type="text" name="nama" required><br><br>
    Kelas <br>
    <input type="text" name="kelas" required><br><br>
    Alamat <br>
    <textarea name="alamat" required></textarea><br><br>
     Nilai <br>
    <textarea name="nilai" required></textarea><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>
<style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}

h2 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

form {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    max-width: 500px;
    width: 100%;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    font-family: Arial, sans-serif;
}

input[type="text"]:focus,
textarea:focus {
    outline: none;
    border-color: #007bff;
}

textarea {
    resize: vertical;
    min-height: 80px;
}

button {
    background-color: #007bff;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    width: 100%;
}

button:hover {
    background-color: #0056b3;
}

.btn-kembali {
    display: inline-block;
    margin-bottom: 20px;
    color: #007bff;
    text-decoration: none;
    align-self: flex-start;
}

.btn-kembali:hover {
    text-decoration: underline;
}</style>
<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO santri VALUES(
        '',
        '$_POST[nama]',
        '$_POST[kelas]',
        '$_POST[alamat]',
        '$_POST[nilai]'
    )");
    header("location:index.php");
}
?>

</body>
</html>