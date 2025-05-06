<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div class="about">Rental Forklift</div>
    <div class="row" style="margin-top:60px;">
        <div class="col-md-3">
            <div class="carding">
                <div class="carding-img">
                    <img src="<?= base_url() ?>img/pngwing-com-10-6.png" alt="...">
                </div>
                <div class="carding-title" style="text-align:center;">
                    <h6><b>Forklift Diesel</b></h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="carding">
                <div class="carding-img">
                    <img src="<?= base_url() ?>img/pngwing-com-10-8.png" alt="...">
                </div>
                <div class="carding-title" style="text-align:center;">
                    <h6><b>Forklift Elektrik Counter Balance</b></h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="carding">
                <div class="carding-img">
                    <img src="<?= base_url() ?>img/JGBHGYHG-3.png" alt="...">
                </div>
                <div class="carding-title" style="text-align:center;">
                    <h6><b>Forklift Elektrik Reachtruck</b></h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="carding">
                <div class="carding-img">
                    <img src="<?= base_url() ?>img/JGBHGYHG-4.png" alt="...">
                </div>
                <div class="carding-title" style="text-align:center;">
                    <h6><b>Stacker Elektrik Handpallet</b></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>