<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Merek</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success">Tambah Merek</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Merek</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="datamerk">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Merek</th>
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
    // get api merk all page
    fetch(apiURL + '/api/merk/where', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                lang: 'id',
            })
        })
        .then(response => response.json())
        .then(data => {
            let merkList = '';
            $.each(data.data, function(index, item) {
                merkList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.nama + `</td>
                                    <td>Edit | Hapus</td>
                                </tr>`;
            });

            $("#datamerk").html(merkList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
</script>

<?= $this->endSection() ?>