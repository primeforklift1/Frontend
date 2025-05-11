<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" id="sliderData">
   </div>

   <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Sebelumnya</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Selanjutnya</span>
  </a>
</div>
<div class="isi-konten">
    <div id="tentang-kami-single">
    </div>
    <div style="margin-top:60px;">
        <div class="rectangle-7"></div>
        <img class="pngwing-com-4" width="100%" src="<?= base_url() ?>img/image-3.png" />
    </div>

    <div class="row" style="margin-top:60px;">
        <div class="col-md-6" style="text-align: center;">
            <img width="80%" src="<?= base_url() ?>img/why-img.png" />
        </div>
        <div class="col-md-6">
            <span class="why">Kenapa Harus Pilih Kami?</span>
            <div class="row">
                <div class="col-md-2">
                    <div class="box-bg">
                        <img class="guarantee" src="<?= base_url() ?>img/guarantee.png" />
                    </div>
                </div>
                <div class="col-md-10">
                    <span class="judul-why">Pelayanan Prima</span><br>
                    <div class="des">Tim kami melayani pelanggan dengan prima dari mulai pemilihan unit, pembuatan
                        kontrak hingga pengiriman unit sampai ke lokasi proyek. selain itu kami mempunyai teknisi yang
                        standby jika terjadi sesuatu yang secepatnya perlu tindakan.</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="box-bg">
                        <img class="membership-card" src="<?= base_url() ?>img/membership-card.png" />
                    </div>
                </div>
                <div class="col-md-10">
                    <span class="judul-why">Unit Prima</span>
                    <div class="des">Semua unit forklift disediakan dalam kondisi terawat dengan tipe unit yang variatif
                        seperti forklift diesel, elektrik, reachtruck ,stacker elektrik,handpallet dll.</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="box-bg">
                        <img class="vector" src="<?= base_url() ?>img/Receive-Cash.png" />
                    </div>
                </div>
                <div class="col-md-10">
                    <span class="judul-why">Harga Sewa Kompetitif</span>
                    <div class="des">Kami ada beberapa layanan di antaranya : rental harian, bulanan maupun tahunan.
                        Spesialis alat berat terpercaya, memberikan harga sesuai yang pelanggan butuhkan dan bersaing
                        serta selalu memberikan layanan yang prima untuk kepuasan pelanggan.</div>
                </div>
            </div>
        </div>
    </div>

    <div id="landingRental"></div>

    <div id="landingRentalList"></div>

    <div id="landingService">
    </div>

    <div style="text-align:center;margin-top:60px;">
        <span class="why">Blog</span>
    </div>
    <div class="row" style="margin-top:30px;">
        <div class="col-md-3 cards">
            <a href="<?= base_url()?>blog/data" class="sampleClick">
                <div class="card">
                    <img src="https://www.primeforklift.co.id/assets/uploads/images/thumbs/221124095818.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 cards">
            <a href="<?= base_url()?>blog/data" class="sampleClick">
                <div class="card">
                    <img src="https://www.primeforklift.co.id/assets/uploads/images/thumbs/221124095818.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 cards">
            <a href="<?= base_url()?>blog/data" class="sampleClick">
                <div class="card">
                    <img src="https://www.primeforklift.co.id/assets/uploads/images/thumbs/221124095818.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 cards">
            <a href="<?= base_url()?>blog/data" class="sampleClick">
                <div class="card">
                    <img src="https://www.primeforklift.co.id/assets/uploads/images/thumbs/221124095818.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div style="text-align:center;margin-top:60px;">
        <span class="why">Client</span>
        <img class="pngwing-com-4" width="100%" src="<?= base_url() ?>img/image-3.png" />
    </div>
  
</div>
<?= $this->endSection() ?>