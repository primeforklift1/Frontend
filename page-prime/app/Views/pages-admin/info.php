<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Informasi Perusahaan</h2>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Info Type</th>
                <th>Nama Info</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="datainfo">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Info Type</th>
                <th>Nama Info</th>
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
    // get api info all page
    fetch(apiURL + '/api/config/where', {
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
            let infoList = '';
            $.each(data.data, function(index, item) {
                infoList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.config_type + `</td>
                                    <td>` + item.config_name + `</td>
                                    <td>Edit | Hapus</td>
                                </tr>`;
            });

            $("#datainfo").html(infoList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
</script>

<?= $this->endSection() ?>