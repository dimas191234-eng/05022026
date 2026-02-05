<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM santri WHERE id = $id");
$santri = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    
    $query = "UPDATE santri SET nama = '$nama', kelas = '$kelas', alamat = '$alamat' WHERE id = $id";
    
    if(mysqli_query($conn, $query)) {
        header('Location: index.php?status=sukses&pesan=Data santri berhasil diperbarui');
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Santri</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
            color: #4f46e5;
        }
        
        .form-header h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #4f46e5;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }
        
        .btn-submit {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(59, 130, 246, 0.3);
        }
        
        .btn-cancel {
            background: #6b7280;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .btn-cancel:hover {
            background: #4b5563;
            transform: translateY(-2px);
        }
        
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-edit"></i> Edit Data Santri</h2>
                <p>Perbarui informasi santri yang sudah terdaftar</p>
            </div>
            
            <?php if(isset($error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama"><i class="fas fa-user"></i> Nama Lengkap Santri</label>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($santri['nama']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="kelas"><i class="fas fa-chalkboard-teacher"></i> Kelas</label>
                    <select id="kelas" name="kelas" required>
                        <option value="Tahfizh 1" <?php echo ($santri['kelas'] == 'Tahfizh 1') ? 'selected' : ''; ?>>Tahfizh 1</option>
                        <option value="Tahfizh 2" <?php echo ($santri['kelas'] == 'Tahfizh 2') ? 'selected' : ''; ?>>Tahfizh 2</option>
                        <option value="Tahsin 1" <?php echo ($santri['kelas'] == 'Tahsin 1') ? 'selected' : ''; ?>>Tahsin 1</option>
                        <option value="Tahsin 2" <?php echo ($santri['kelas'] == 'Tahsin 2') ? 'selected' : ''; ?>>Tahsin 2</option>
                        <option value="Bahasa Arab 1" <?php echo ($santri['kelas'] == 'Bahasa Arab 1') ? 'selected' : ''; ?>>Bahasa Arab 1</option>
                        <option value="Bahasa Arab 2" <?php echo ($santri['kelas'] == 'Bahasa Arab 2') ? 'selected' : ''; ?>>Bahasa Arab 2</option>
                        <option value="Tahfizh Lanjutan" <?php echo ($santri['kelas'] == 'Tahfizh Lanjutan') ? 'selected' : ''; ?>>Tahfizh Lanjutan</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="alamat"><i class="fas fa-map-marker-alt"></i> Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="4" required><?php echo htmlspecialchars($santri['alamat']); ?></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="submit" name="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Update Data
                    </button>
                    <a href="index.php" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>