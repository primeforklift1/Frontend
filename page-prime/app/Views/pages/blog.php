<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div class="about">Blog</div>
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
</div>
<?= $this->endSection() ?>