<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Client</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success">Tambah Client</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Client</th>
                <th>Logo</th>
                <td>Link</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataclient">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Client</th>
                <th>Logo</th>
                <th>Link</th>
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
    // get api client all page
    fetch(apiURL + '/api/client/where', {
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
            let clientList = '';
            $.each(data.data, function(index, item) {
                clientList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.name + `</td>
                                    <td>` + item.image + `</td>
                                    <td>` + item.link + `</td>
                                    <td>Edit | Hapus</td>
                                </tr>`;
            });

            $("#dataclient").html(clientList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
</script>

<?= $this->endSection() ?>