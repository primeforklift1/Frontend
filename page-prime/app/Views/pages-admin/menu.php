<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Managemen Menu</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success">Tambah Menu</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Menu</th>
                <th>ID Parent Menu</th>
                <th>Nama Menu</th>
                <td>Menu Type</td>
                <td>Link</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="datamenu">
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Menu</th>
                <th>ID Parent Menu</th>
                <th>Nama Menu</th>
                <th>Menu Type</th>
                <td>Link</td>
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
    // get api menu all page
    fetch(apiURL + '/api/menu/where-all', {
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
            let menuList = '';
            $.each(data.data, function(index, item) {
                menuList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.id + `</td>
                                    <td>` + item.parent + `</td>
                                    <td>` + item.menu_name + `</td>
                                    <td>` + item.menu_type + `</td>
                                    <td>` + item.link + `</td>
                                    <td>Edit | Hapus</td>
                                </tr>`;
            });

            $("#datamenu").html(menuList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
</script>

<?= $this->endSection() ?>