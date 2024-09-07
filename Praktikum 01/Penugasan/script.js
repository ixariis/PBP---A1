document.addEventListener('DOMContentLoaded', function() {
    const subKategoriOptions = {
        'Baju': ['Baju Pria', 'Baju Wanita', 'Baju Anak'],
        'Elektronik': ['Mesin Cuci', 'Kulkas', 'AC'],
        'Alat Tulis': ['Kertas', 'Map', 'Pulpen']
    };

    const kategori = document.getElementById('kategori');
    const subKategori = document.getElementById('subKategori');
    const hargaGrosir = document.getElementById('hargaGrosir');
    const grosirYa = document.getElementById('grosirYa');
    const grosirTidak = document.getElementById('grosirTidak');
    const captchaDisplay = document.getElementById('captchaDisplay');
    const captchaInput = document.getElementById('captchaInput');
    const form = document.getElementById('TambahProduk');

    const namaProdukError = document.getElementById('namaProdukError');
    const deskripsiProdukError = document.getElementById('deskripsiProdukError');
    const jasaKirimError = document.getElementById('jasaKirimError');
    const captchaError = document.getElementById('captchaError');

    kategori.addEventListener('change', function() {
        const selectedKategori = this.value;
        subKategori.innerHTML = '<option value="">--Pilih Sub Kategori--</option>';

        if (selectedKategori && subKategoriOptions[selectedKategori]) {
            subKategoriOptions[selectedKategori].forEach(function(subKategoriValue) {
                const option = document.createElement('option');
                option.value = subKategoriValue;
                option.text = subKategoriValue;
                subKategori.appendChild(option);
            });
        }
    });

    function toggleHargaGrosir() {
        if (grosirYa.checked) {
            hargaGrosir.disabled = false;
            hargaGrosir.required = true;
        } else {
            hargaGrosir.disabled = true;
            hargaGrosir.required = false;
            hargaGrosir.value = '';
        }
    }

    grosirYa.addEventListener('change', toggleHargaGrosir);
    grosirTidak.addEventListener('change', toggleHargaGrosir);

    function generateCaptcha() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let captcha = '';
        for (let i = 0; i < 5; i++) {
            captcha += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return captcha;
    }

    let captchaCode = generateCaptcha();
    captchaDisplay.value = captchaCode;

    form.addEventListener('submit', function(event) {
        let isValid = true;

        const namaProduk = document.getElementById('namaProduk').value.trim();
        const deskripsiProduk = document.getElementById('deskripsiProduk').value.trim();
        const jasaKirimSelected = document.querySelectorAll('input[name="jasa_kirim"]:checked').length;
        const captchaInputValue = captchaInput.value.trim();

        namaProdukError.textContent = '';
        deskripsiProdukError.textContent = '';
        jasaKirimError.textContent = '';
        captchaError.textContent = '';

        if (namaProduk.length < 5 || namaProduk.length > 30) {
            namaProdukError.textContent = 'Nama Produk harus antara 5 hingga 30 karakter.';
            isValid = false;
        }

        if (deskripsiProduk.length < 5 || deskripsiProduk.length > 100) {
            deskripsiProdukError.textContent = 'Deskripsi Produk harus antara 5 hingga 100 karakter.';
            isValid = false;
        }

        if (jasaKirimSelected < 3) {
            jasaKirimError.textContent = 'Pilih minimal 3 jasa kirim.';
            isValid = false;
        }

        if (captchaInputValue !== captchaCode) {
            captchaError.textContent = 'Captcha tidak sesuai.';
            isValid = false;

            captchaCode = generateCaptcha();
            captchaDisplay.value = captchaCode;
            captchaInput.value = '';
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    form.addEventListener('reset', function() {
        namaProdukError.textContent = '';
        deskripsiProdukError.textContent = '';
        jasaKirimError.textContent = '';
        captchaError.textContent = '';
        captchaCode = generateCaptcha();
        captchaDisplay.value = captchaCode;
    });
});