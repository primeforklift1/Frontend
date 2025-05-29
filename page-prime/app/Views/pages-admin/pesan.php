<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Pesan</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success">Tambah Pesan</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pesan</th>
                <td>Deskripsi</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Unit Forklift</td>
                <td>Deskripsi</td>
                <td>Edit | Hapus</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ban Forklift</td>
                <td>Deskripsi</td>
                <td>Edit | Hapus</td>
            </tr>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Pesan</th>
                <th>Deskripsi</th>
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