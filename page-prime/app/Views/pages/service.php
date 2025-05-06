<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div class="about">Layanan Service</div>
    <div class="row" style="margin-top:30px;">
        <div class="col-md-3 cards">
            <div class="carding">
                <div class="carding-img-ico">
                    <img style="width:100px;" src="<?= base_url() ?>img/helmet-safety-solid.svg" alt="...">
                    <div class="carding-title" style="text-align:center;">
                        <h6><b>Servis Periodik/Rutin</b></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 cards">
            <div class="carding">
                <div class="carding-img-ico">
                    <img style="width:100px;" src="<?= base_url() ?>img/gear-solid-white.svg" alt="...">
                    <div class="carding-title" style="text-align:center;">
                        <h6><b>Service General/ Besar</b></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 cards">
            <div class="carding">
                <div class="carding-img-ico">
                    <img style="width:100px;" src="<?= base_url() ?>img/Automation.png" alt="...">
                    <div class="carding-title" style="text-align:center;">
                        <h6><b>Overhaul Transmisi</b></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 cards">
            <div class="carding">
                <div class="carding-img-ico">
                    <img style="width:100px;" src="<?= base_url() ?>img/Engine.png" alt="...">
                    <div class="carding-title" style="text-align:center;">
                        <h6><b>Overhaul Engine</b></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>