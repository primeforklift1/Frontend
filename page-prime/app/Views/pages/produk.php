<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten" style="padding:70px;">
    <!-- search -->
    <div style="margin-top: 120px;">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" id="search" aria-describedby="searchProduct" placeholder="Cari Produk">
            </div>
        </div>
    </div>
    <!-- forklift -->
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="judul-produk">Forklift</div>
            </div>
            <div class="col-md-2" style="text-align:right;margin-top:10px;">
                <select class="form-control form-control-sm merk">
                    <option>Forklift Toyota</option>
                    <option>Forklift Niciyu</option>
                </select>
            </div>
        </div>
        <div>
            <div class="row">
                <div style="cursor:pointer;" class="col-md-3" data-toggle="modal" data-target="#produkModal" onclick="setModal()">
                        <div class="carding">
                            <div class="carding-img">
                                <img src="<?= base_url() ?>img/JGBHGYHG-4.png" alt="...">
                            </div>
                            <div class="carding-title" style="text-align:center;">
                                <h6><b>FORKLIFT TOYOTA 2,5 TON</b></h6>
                            </div>
                        </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <nav aria-label=" Page navigation example">
                <ul class="pagination pagination-sm justify-content-end" id="pagination">
                </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sparepart -->
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="judul-produk">Sparepart</div>
            </div>
                <select class="form-control form-control-sm merk">
                <select class="form-control form-control-sm">
                    <option>Forklift Toyota</option>
                    <option>Forklift Niciyu</option>
                </select>
            </div>
        </div>
        <div>
            <div class="row">
                <div style="cursor:pointer;" class="col-md-3" data-toggle="modal" data-target="#sparepartModal" onclick="setModal()">
                        <div class="carding">
                            <div class="carding-img">
                                <img src="<?= base_url() ?>img/JGBHGYHG-4.png" alt="...">
                            </div>
                            <div class="carding-title" style="text-align:center;">
                                <h6><b>FORKLIFT TOYOTA 2,5 TON</b></h6>
                            </div>
                        </div>
                </div>
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
    <!-- Ban Forklift -->
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="judul-produk">Ban Forklift</div>
            </div>
            <div class="col-md-2" style="text-align:right;margin-top:10px;">
                <select class="form-control form-control-sm merk">
                    <option>Forklift Toyota</option>
                    <option>Forklift Niciyu</option>
                </select>
            </div>
        </div>
        <div>
            <div class="row">
                <div style="cursor:pointer;" class="col-md-3" data-toggle="modal" data-target="#sparepartModal" onclick="setModal()">
                        <div class="carding">
                            <div class="carding-img">
                                <img src="<?= base_url() ?>img/JGBHGYHG-4.png" alt="...">
                            </div>
                            <div class="carding-title" style="text-align:center;">
                                <h6><b>FORKLIFT TOYOTA 2,5 TON</b></h6>
                            </div>
                        </div>
                </div>
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
    <!-- Battery -->
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="judul-produk">Battery</div>
            </div>
            <div class="col-md-2" style="text-align:right;margin-top:10px;">
                <select class="form-control form-control-sm merk">
                    <option>Forklift Toyota</option>
                    <option>Forklift Niciyu</option>
                </select>
            </div>
        </div>
        <div>
            <div class="row">
                <div style="cursor:pointer;" class="col-md-3" data-toggle="modal" data-target="#sparepartModal" onclick="setModal()">
                        <div class="carding">
                            <div class="carding-img">
                                <img src="<?= base_url() ?>img/JGBHGYHG-4.png" alt="...">
                            </div>
                            <div class="carding-title" style="text-align:center;">
                                <h6><b>FORKLIFT TOYOTA 2,5 TON</b></h6>
                            </div>
                        </div>
                </div>
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
    <!-- Attachement -->
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="judul-produk">Attachment</div>
            </div>
            <div class="col-md-2" style="text-align:right;margin-top:10px;">
                <select class="form-control form-control-sm merk">
                    <option>Forklift Toyota</option>
                    <option>Forklift Niciyu</option>
                </select>
            </div>
        </div>
        <div>
            <div class="row">
                <div style="cursor:pointer;" class="col-md-3" data-toggle="modal" data-target="#sparepartModal" onclick="setModal()">
                        <div class="carding">
                            <div class="carding-img">
                                <img src="<?= base_url() ?>img/JGBHGYHG-4.png" alt="...">
                            </div>
                            <div class="carding-title" style="text-align:center;">
                                <h6><b>FORKLIFT TOYOTA 2,5 TON</b></h6>
                            </div>
                        </div>
                </div>
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
</div>
<?= $this->endSection() ?>