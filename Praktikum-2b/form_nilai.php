<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #ccc;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Nilai Siswa</h2>
        <form action="nilai_mahasiswa.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="matkul">Mata Kuliah</label>
                <select id="matkul" name="matkul" required>
                    <option value="DDP">Dasar Dasar Pemrograman</option>
                    <option value="BD1">Basis Data</option>
                    <option value="WEB1">Pemrograman Web 1</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nilai_uts">Nilai UTS</label>
                <input type="number" id="nilai_uts" name="nilai_uts" required>
            </div>
            <div class="form-group">
                <label for="nilai_uas">Nilai UAS</label>
                <input type="number" id="nilai_uas" name="nilai_uas" required>
            </div>
            <div class="form-group">
                <label for="nilai_tugas">Nilai Tugas/Praktikum</label>
                <input type="number" id="nilai_tugas" name="nilai_tugas" required>
            </div>
            <button type="submit" class="btn" name="proses">Simpan</button>
        </form>
    </div>
</body>
</html>