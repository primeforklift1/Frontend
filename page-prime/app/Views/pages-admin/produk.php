<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Produk</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success">Tambah Produk</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
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
                <th>Nama Produk</th>
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
        window.location.href = "/login";
    }
    new DataTable('#example');
</script>

<?= $this->endSection() ?>