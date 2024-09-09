<?php
// Data array mahasiswa
$array_mhs = array(
    'Abdul' => array(89, 90, 54),
    'Budi' => array(78, 60, 64),
    'Nina' => array(67, 56, 84),
    'Budi' => array(87, 69, 50),
    'Budi' => array(98, 65, 74)
);

// Fungsi untuk menghitung rata-rata
function hitung_rata($array) {
    $jumlah = array_sum($array);
    $banyaknya = count($array);
    return $jumlah / $banyaknya;
}

// Fungsi untuk mencetak data mahasiswa
function print_mhs($array_mhs) {
    // Tambahkan beberapa styling agar tabel lebih lebar dan rapi
    echo "<style>
            table {
                width: 80%;
                border-collapse: collapse;
                margin: 20px auto; /* Tabel di tengah halaman */
                font-size: 18px;
                text-align: center; /* Mengatur teks di tengah */
            }
            th, td {
                padding: 12px;
                border: 1px solid #07070f;
                text-align: center; /* Mengatur teks di tengah */
            }
            th {
                background-color: #4367de;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
          </style>";
    
    echo "<table>";
    echo "<tr>
            <th>Nama</th>
            <th>Nilai 1</th>
            <th>Nilai 2</th>
            <th>Nilai 3</th>
            <th>Rata2</th>
          </tr>";

    foreach ($array_mhs as $nama => $nilai) {
        $rata2 = hitung_rata($nilai);
        echo "<tr>";
        echo "<td>$nama</td>";
        echo "<td>{$nilai[0]}</td>";
        echo "<td>{$nilai[1]}</td>";
        echo "<td>{$nilai[2]}</td>";
        echo "<td>$rata2</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Panggil fungsi untuk mencetak tabel mahasiswa
print_mhs($array_mhs);
?>
