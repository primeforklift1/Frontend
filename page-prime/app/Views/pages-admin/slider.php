<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Slider</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success">Tambah Slider</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Slider</th>
                <td>Text</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>SELAMAT DATANG DI PRIME FORKLIFT SERVICES</td>
                <td>Solusi Terbaik untuk Forklift Anda
                Prime Forklift Services adalah mitra terpercaya Anda dalam menyediakan forklift berkualitas, layanan sewa fleksibel, dan suku cadang asli terbaik.</td>
                <td>Edit | Hapus</td>
            </tr>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Judul Slider</th>
                <th>Text</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    const token = localStorage.getItem("authToken");
    if (!token) {
        alert("Session habis. Silakan login ulang.");
        window.location.href = "/login";
    }
    new DataTable('#example');
</script>

<?= $this->endSection() ?>