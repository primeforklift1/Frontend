<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Pesan</h2>
    <div style="text-align: right;">
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <td>Negara</td>
                <td>Nama</td>
                <td>Email</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataPesan">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <th>Negara</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    // get api info all page
    fetch(apiURL + '/api/message', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            let messageList = '';
            $.each(data.data, function(index, item) {
                messageList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.lang + `</td>
                                    <td>` + item.country + `</td>
                                    <td>` + item.name + `</td>
                                    <td>` + item.email + `</td>
                                    <td>View</td>
                                </tr>`;
            });

            $("#dataPesan").html(messageList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
</script>

<?= $this->endSection() ?>