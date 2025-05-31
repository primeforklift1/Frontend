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
        <div class="rectangle-7">
            <div class="row justify-content-center" id="merkList">
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:60px;">
        <div class="col-md-6" style="text-align: center;" id="whyImage">
            
        </div>
        <div class="col-md-6">
            <span class="why" id="whyTitle"></span>
            <div id="whyList">
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
    <div class="row" style="margin-top:30px;" id="blogList">
        <div class="col-md-3 cards">
            <a href="<?= base_url() ?>blog/data" class="sampleClick">
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
            <a href="<?= base_url() ?>blog/data" class="sampleClick">
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
            <a href="<?= base_url() ?>blog/data" class="sampleClick">
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
            <a href="<?= base_url() ?>blog/data" class="sampleClick">
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
        <div class="row justify-content-center" id="clientList">
            <!-- <div class="col-md-3">
                <img class="pngwing-com-4" width="100%" src="<?= base_url() ?>img/image-3.png" />
            </div> -->
         </div>
    </div>

</div>
<?= $this->endSection() ?>