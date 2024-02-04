<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah checkboxes dicentang
    if (isset($_POST["options"]) && !empty($_POST["options"])) {
        // Ambil data dari checkboxes yang dicentang
        $selectedOptions = $_POST["options"];

        // Tampilkan hasilnya
        echo "<h2>Anda memilih:</h2>";
        echo "<ul>";
        foreach ($selectedOptions as $option) {
            echo "<li>$option</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>Tidak ada pilihan yang dipilih.</h2>";
    }
} else {
    // Jika akses langsung ke halaman ini tanpa melalui form, redirect ke index.php
    header("Location: index.php");
    exit();
}
?>
