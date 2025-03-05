<?php
$ar_produk = [   // Associative Array 
    "TV" => 4200000,
    "Kulkas" => 3100000,
    "Mesin Cuci" => 3800000
];

require_once "form_belanja.php";

$nama_customer = " "; 
$produk = [];
$jumlah_barang= " ";
$total = 0;

// proses logic
if(isset($_POST['proses'])){  //isset() digunakan untuk memeriksa apakah sebuah variabel sudah ada dan tidak bernilai NULL
  $nama_customer = $_POST['customer'];
  $produk = $_POST['produk'];
  $jumlah_barang = $_POST['jumlah'];
  $total = 0;

//menampilkan hasil 
  echo "<div class='container mt-4 border p-3'>";
  echo "<h4>Hasil Pemesanan</h4>";
  echo "Nama Customer : $nama_customer</br>";
  echo "Pilihan produk : </br>";
  if (!empty($produk)) {
    foreach ($produk as $item_produk){  // foreach untuk mengulang semua elemen (item) yang ada di dalam sebuah array atau daftar.
      $harga_satuan = $ar_produk[$item_produk];
      $subtotal = $harga_satuan * $jumlah_barang;
      $total += $subtotal;
      echo "- $item_produk <br>";
  }} 
  echo "Jumlah beli : $jumlah_barang</br>";
  echo "Total Belanja : Rp ". number_format($total,0,`,`,`.`).",-";
  echo "</div>";
}