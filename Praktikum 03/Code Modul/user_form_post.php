<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Mahasiswa 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5 border rounded p-0">
    <div class="bg-secondary rounded-top p-2 text-white text-center">Form Mahasiswa</div>
    <form method="post ">
        <div class = "form-group m-2">
        <label for="nama">Nama:</label><br />
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group m-2">
            <label for="email" class="label">Email:</label><br />
            <input type="email" class="form-control" id="email" name="email">
        </div> 
        <div class="form-group m-2">
            <label class="label" for="kota">Kota/Kabupaten:</label><br />
            <select name="kota" id="kota" class="form-control">
                <option value="-" selected disable>-- Pilih Kota Kabupaten --</option>
                <option value="Semarang">Semarang</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Surabaya">Surabaya</option>
            </select>
        </div>
        <label class="check m-2">Jenis kelamin:</label><br />
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">
                Pria
            </label>
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">
                Wanita
            </label>
        </div>
        <br>
        <label class="check m-2">Peminatan:</label><br />
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
            </label>
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
            </label>
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
            </label>
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
                echo 'Nama = '.$_POST['nama'].'</br>';
                echo 'Email = '.$_POST['email'].'</br>';
                echo 'Kota = '.$_POST['kota'].'</br>';

                if (isset($_POST['jenis_kelamin'])) {
                    echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'</br>';
                }else{
                    echo '<span class="teks-merah">Jenis kelamin belum diatur !</br></span>';
                }

                if (!empty($_POST['minat'])) {
                    echo 'Peminatan yang dipilih: ';
                    foreach ($_POST['minat'] as $minat_item) {
                        echo '<br />- '.$minat_item;
                    }
                }else{
                    echo '<span class="teks-merah">Anda belum memilih Peminatan !</br></span>';
                }
            }
        ?>
    </div>
</body>
</html>