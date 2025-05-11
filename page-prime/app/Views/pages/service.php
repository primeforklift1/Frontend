<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div id="layananAllDataService"></div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div style="text-align: center;" class="about">Jika Ada Kebutuhan Hubungi Kami</div>
            <form>
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email">
                </div>
                <div class="form-group">
                    <label for="name">Negara</label>
                    <input type="text" class="form-control" id="negara" aria-describedby="negara">
                </div>
                <div class="form-group">
                    <label for="name">Nomor Telpon</label>
                    <input type="text" class="form-control" id="telp" aria-describedby="telp">
                </div>
                <div class="form-group">
                    <label for="name">Alamat Perusahaan</label>
                    <textarea class="form-control" id="address" aria-describedby="address"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Deskripsi</label>
                    <textarea class="form-control" id="desc" aria-describedby="desc"></textarea>
                </div>
            </form>
            <div style="display: flex; justify-content: flex-end;">
                <button style="padding-left: 20px;padding-right:20px;" type="button" class="btn btn-primary">Kirim</button>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?= $this->endSection() ?>