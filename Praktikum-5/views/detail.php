<?php
require_once("controllers/Prodi.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $prodi->show($id);
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Prodi</title>
</head>
<body>
    <h1>Detail Prodi</h1>
    <?php if($data) :?>
        <p>Kode: <?= $data['kode'] ?></p>
        <p>Nama: <?= $data['Nama'] ?></p>
        <p>Kaprodi: <?= $data['Kaprodi'] ?></p>
    <?php endif ?>
    <a href="?url=prodi">Kembali</a>
</body>
</html>