<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Mahasiswa 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Fungsi untuk menyembunyikan atau menampilkan checkbox ekstrakurikuler
        function toggleEkstrakurikuler() {
            var kelas = document.getElementById("kelas").value;
            var ekstrakurikulerDiv = document.getElementById("ekstrakurikulerDiv");

            if (kelas === "XII") {
                ekstrakurikulerDiv.style.display = "none";
            } else {
                ekstrakurikulerDiv.style.display = "block";
            }
        }

        // Jalankan fungsi saat halaman pertama kali dimuat
        window.onload = function() {
            toggleEkstrakurikuler();
        };
    </script>
</head>
<?php
        if (isset($_POST['submit'])){
        	//validasi nis: tidak boleh kosong, hanya dapat berisi angka
            $nis = test_input($_POST['nis']);
            if (empty($nis)) {
                $error_nis = "NIS harus diisi";
            }else if (!preg_match("/[0-9]*$/", $nis)) {
                $error_nis = "NIS hanya dapat berisi angka";
            }
            //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi 
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            }else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
           
            //validasi jenis kelamin: tidak boleh kosong 
            $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : "";
            if (empty($jenis_kelamin)){
                $error_jenis_kelamin = "Jenis Kelamin harus diisi";
            }
            //validasi kelas: tidak boleh kosong 
            $kelas = isset($_POST['kelas'])? $_POST['kelas'] : "";
            if (empty($kelas)) { 
                $error_kelas = "Kelas harus diisi";
            }
            //validasi ekstrakurikuler: X, XI harus pilih 1-3 ekskul. XII tidak boleh pilih ekskul
            $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : [];
            if ($kelas == 'X' || $kelas == 'XI'){
                if (empty($ekstrakurikuler) || count($ekstrakurikuler) > 3){
                    $error_ekstrakurikuler = "Ekstrakurikuler harus dipilih minimal 1 maksimal 3";
                }
            }elseif (!empty($ekstrakurikuler) && $kelas == 'XII'){
                $error_ekstrakurikuler = "Ekstrakurikuler tidak boleh dipilih kelas XII";
            }
        }

        function test_input($data) { 
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);
            return $data;
        }
    ?>
<body>
    <div class="container mt-5 border rounded p-0">
    <div class="bg-secondary rounded-top p-2 text-white text-center">Form Mahasiswa</div>
    <form method="post">
    	<div class = "form-group m-2">
        <label for="nama">NIS:</label><br />
            <input type="text" class="form-control" id="nis" name="nis" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php if(isset($nis)) {echo $nis;} ?>">
            <div class="error"><?php if(isset($error_nis)) echo $error_nis;?></div> 
        </div>
        <div class = "form-group m-2">
        <label for="nama">Nama:</label><br />
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;} ?>">
            <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
        </div>
        <label class="check m-2">Jenis kelamin:</label><br />
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin==("pria")) echo "checked";?>>
                Pria
            </label>
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin==("wanita")) echo "checked";?>>
                Wanita
            </label>
        </div>
        <div class="error" style="margin-left: 10px;"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
        <div class="form-group m-2">
            <label class="label" for="kelas">Kelas:</label><br />
            <select name="kelas" id="kelas" class="form-control" onchange="toggleEkstrakurikuler()">
                <option value="-" selected disable>-- Pilih Kelas --</option>
                <option value="X" <?php if(isset($kelas) && $kelas==("X")) echo 'selected="true"';?>>X</option>
                <option value="XI" <?php if(isset($kelas) && $kelas==("XI")) echo 'selected="true"';?>>XI</option>
                <option value="XII" <?php if(isset($kelas) && $kelas==("XII")) echo 'selected="true"';?>>XII</option>
            </select>
            <div class="error"><?php if(isset($error_kelas)) echo $error_kelas;?></div>
        </div>

        <!-- Div untuk checkbox Ekstrakurikuler -->
        <div id="ekstrakurikulerDiv">
            <label class="check m-2">Ekstrakurikuler:</label><br />
            <div class="form-check m-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="pramuka"  <?php if(isset($ekstrakurikuler) && in_array('pramuka', $ekstrakurikuler)) echo "checked";?>>Pramuka
                </label>
            </div>
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="seni_tari"  <?php if(isset($ekstrakurikuler) && in_array('seni_tari', $ekstrakurikuler)) echo "checked";?>>Seni Tari
                </label>
            </div>
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="sinematografi"  <?php if(isset($ekstrakurikuler) && in_array('sinematografi', $ekstrakurikuler)) echo "checked";?>>Sinematografi
                </label> 
            </div>
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="basket"  <?php if(isset($ekstrakurikuler) && in_array('basket', $ekstrakurikuler)) echo "checked";?>>Basket
                </label> 
            </div>
            <div class="error" style="margin-left: 10px;"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
        </div>

        <!-- submit, reset dan button -->
        <div class="m-2 text-center">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form> 
    </div> 
    <div class="container">
        <?php
            if (isset($_POST["submit"])) {
                echo "<h3 style='margin-top:0px;'>Your Input:</h3>";
                echo 'NIS = '.$_POST['nis'].'</br>';
                echo 'Nama = '.$_POST['nama'].'</br>';
                echo 'Kelas = '.$_POST['kelas'].'</br>';

                if (isset($_POST['jenis_kelamin'])) {
                    echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'</br>';
                }else{
                    echo '<span class="teks-merah">Jenis kelamin belum diatur !</br></span>';
                }

                if (!empty($_POST['ekstrakurikuler'])) {
                    echo 'Ekstrakurikuler yang dipilih: ';
                    foreach ($_POST['ekstrakurikuler'] as $ekstrakurikuler_item) {
                        echo '<br />- '.$ekstrakurikuler_item;
                    }
                }else{
                    echo '<span class="teks-merah">Anda belum memilih Ekstrakurikuler !</br></span>';
                }
            }
        ?>
    </div>
</body>
</html>
