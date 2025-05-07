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

    <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <nav aria-label=" Page navigation example">
                <ul class="pagination pagination-sm justify-content-end">
                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
                </nav>
            </div>
        </div>
</div>
<?= $this->endSection() ?>