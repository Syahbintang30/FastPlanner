<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(45deg, #232526, #414345);
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .form-container {
            background: linear-gradient(45deg, #232526, #414345);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 50%;
            color: #fff;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group label {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #777;
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s;
        }

        .form-group input,
        .form-group textarea,
        .form-group .custom-file-input {
            width: 100%;
            padding: 10px; /* Menambahkan padding pada input */
            font-size: 18px; /* Menambahkan ukuran font pada input */
            border: none;
            border-bottom: 2px solid #777; /* Menambahkan border bawah */
            background-color: transparent;
            color: #fff;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group input:valid,
        .form-group textarea:focus,
        .form-group textarea:valid {
            border-color: #ffc107;
            outline: none;
        }

        .form-group input:focus+label,
        .form-group input:valid+label,
        .form-group textarea:focus+label,
        .form-group textarea:valid+label {
            font-size: 16px;
            top: -12px;
            color: #ffc107;
        }

        .form-group input:hover,
        .form-group textarea:hover {
            border-color: #ffc107;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2 class="text-center my-3">Tambah Produk</h2>

        <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" id="nama_produk" name="nama_produk" required>
                <label for="nama_produk">Nama Produk</label>
            </div>

            <div class="form-group">
                <input type="text" id="kalori" name="kalori" required>
                <label for="kalori">Kalori</label>
            </div>

            <div class="form-group">
                <input type="text" id="lemak" name="lemak" required>
                <label for="lemak">Lemak</label>
            </div>

            <div class="form-group">
                <input type="text" id="protein" name="protein" required>
                <label for="protein">Protein</label>
            </div>

            <div class="form-group">
                <textarea id="bahan" name="bahan" rows="3" required></textarea>
                <label for="bahan">Bahan</label>
            </div>

            <div class="form-group">
                <p>Tambah Gambar</p>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning">Tambah Produk</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
