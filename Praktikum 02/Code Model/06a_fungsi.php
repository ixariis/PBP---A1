<?php
    // Nama : 
    // NIM  : 
    
    // FUNGSI 1 *************************************************
    echo '<br />FUNGSI 1: fungsi yang tidak mengembalikan nilai<br />';
    //contoh fungsi yang tidak mengembalikan nilai (disebut juga prosedur)
    function print_mhs($nama,$nim,$prodi){
        echo 'Nama: '.$nama.'<br />';
        echo 'NIM: '.$nim.'<br />';
        echo 'Prodi: '.$prodi.'<br />';
    }
    print_mhs('Mitslina','24060121130068','Ilmu Komputer/ Informatika');

    // FUNGSI 2 **************************************************
    echo '<br />FUNGSI 2: fungsi menghitung harga setelah diskon dengan parameter input: harga dan diskon<br />';
    //menghitung harga setelah diskon
    //parameter input: harga dan diskon 
    function hitung_diskon($harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }
    //contoh pemanggilan fungsi
    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga,$diskon);
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';

    // FUNGSI 3 **************************************************
    echo '<br />FUNGSI 3: fungsi menghitung harga setelah diskon dengan parameter input: harga dan diskon (nilai default=10)<br />';
    //menghitung harga setelah diskon
    //parameter input: harga dan diskon (nilai default=10)
    function hitung_diskon2($harga,$diskon=10){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }
    //contoh pemanggilan fungsi
    $harga = 10000;
    $harga_diskon = hitung_diskon2($harga); //
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';

    // FUNGSI 4 ***************************************************
    echo '<br />FUNGSI 4: fungsi menghitung harga setelah diskon dengan harga sebagai parameter input dan output<br />';
    //menghitung harga setelah diskon
    //harga sebagai parameter input dan output
    function hitung_diskon3(&$harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }
    //contoh pemanggilan fungsi
    $harga = 10000;
    $diskon = 20;
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    hitung_diskon3($harga, $diskon); //
    echo 'Harga setelah diskon = '.$harga.'<br />';

    // FUNGSI 5 (REKURSIF)*****************************************
    echo '<br />FUNGSI 5 REKURSIF<br />';
    function faktorial($n) 
    {
        if($n == 0){
            return 1;
        }else{
            return $n * faktorial($n-1);
        }
    } 
?>