<?php
// Menangkap data dari form
$nama = $_POST['nama'] ?? '';
$mata_kuliah = $_POST['matkul'] ?? '';
$nilai_uts = $_POST['nilai_uts'] ?? 0;
$nilai_uas = $_POST['nilai_uas'] ?? 0;
$nilai_tugas = $_POST['nilai_tugas'] ?? 0;

// Menghitung nilai total berdasarkan bobot
$nilai_total = ($nilai_uts * 0.30) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

// Menentukan status kelulusan
$status = ($nilai_total > 55) ? "LULUS" : "TIDAK LULUS";

// Menampilkan hasil
echo "<h3>Hasil Penilaian</h3>";
echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "Mata Kuliah: " . htmlspecialchars($mata_kuliah) . "<br>";
echo "Nilai UTS: " . htmlspecialchars($nilai_uts) . "<br>";
echo "Nilai UAS: " . htmlspecialchars($nilai_uas) . "<br>";
echo "Nilai Tugas: " . htmlspecialchars($nilai_tugas) . "<br>";
echo "Nilai Total: " . number_format($nilai_total, 2) . "<br>";
echo "<strong>Status: $status</strong>";
?>

<?php
// Menentukan grade berdasarkan nilai total
if ($nilai_total >= 85 && $nilai_total <= 100) {
    $grade = "A";
} elseif ($nilai_total >= 70) {
    $grade = "B";
} elseif ($nilai_total >= 56) {
    $grade = "C";
} elseif ($nilai_total >= 36) {
    $grade = "D";
} elseif ($nilai_total >= 0) {
    $grade = "E";
} else {
    $grade = "I"; // Invalid nilai
}

echo "<br>Grade: $grade";
?>
<?php
// Menentukan predikat berdasarkan grade
switch ($grade) {
    case "A":
        $predikat = "Sangat Memuaskan";
        break;
    case "B":
        $predikat = "Memuaskan";
        break;
    case "C":
        $predikat = "Cukup";
        break;
    case "D":
        $predikat = "Kurang";
        break;
    case "E":
        $predikat = "Sangat Kurang";
        break;
    default:
        $predikat = "Tidak Ada";
        break;
}

echo "<br>Predikat: $predikat";
?>
