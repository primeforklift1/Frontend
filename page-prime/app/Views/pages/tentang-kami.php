<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten" id="tentang-kami">
    <div class="about">About Us</div>
    <div class="row">
        <div class="col-md-6">
            <h4>PT PRIME FORKLIFT SERVICES</h4>
            <p style="text-align:justify;">IT'S PRIME SERVICES
                Berbekal pengalaman di pemeliharaan Forklift berbagai merek selama lebih dari 20 tahun, maka kami
                mendirikan perusahaan PT PRIME FORKLIFT SERVICE ini untuk dapat melayani Pelanggan dengan PRIMA.
                "IT'S PRIME SERVICES" menjadi Slogan Kami.
                PT. Prime Forklift Services, berdiri karena VISI dari founder yang ingin :
                "Menjadi rekan TERPERCAYA dalam penangan barang" / "To be A TRUSTED partner in material handling"
                Kami juga dipercaya sebagai Authorized Dealer dari Forklift merk Komatsu, Mitsubishi dan Nichiyu.</p>
        </div>
        <div class="col-md-6" style="text-align: center;">
            <img width="60%" src="<?= base_url() ?>img/about-img.png" />
        </div>
    </div>

    <div class="about">Visi</div>
    <div class="row">
        <div class="col-md-6">
            <p style="text-align:justify;">Menjadi mitra terpercaya dalam penanganan barang, dengan menyediakan solusi
                alat angkut (material handling equipment) terbaik untuk mendukung efisiensi dan produktivitas pelanggan.
            </p>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="rectangle">
                </div>
            </div>
        </div>
    </div>

    <div class="about">Misi</div>
    <div class="row">
        <div class="col-md-6">
            <p style="text-align:justify;">Menyediakan pelayanan prima yang responsif dan solusif untuk memnuhi
                kebutuhan pelanggan.</p>
            <p style="text-align:justify;">Menyediakan suku cadang alat angkut (material handling equipment) yang
                berkualitas tinggi dan terpercaya untuk mendukung performa alat angkut.</p>
            <p style="text-align:justify;">Menyediakan alat angkut (material handling equipment) berkualitas dengan
                standar keselamatan, efisiensi, daya tahan terbaik untuk mendukung produktivitas pelanggan</p>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="rectangle">
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>