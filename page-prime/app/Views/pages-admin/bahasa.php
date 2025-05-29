<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Bahasa</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success" data-toggle="modal" data-target="#addData" onclick="setForm()">Tambah Bahasa</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Bahasa</th>
                <th>Nama Bahasa</th>
                <th>Bendera</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="databahasa">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kode Bahasa</th>
                <th>Nama Bahasa</th>
                <th>Bendera</th>
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

    // get api language
    fetch(apiURL + '/api/language')
        .then(response => response.json())
        .then(data => {
            let languageList = '';
            $.each(data.data, function(index, item) {
                languageList += `<tr>
                                    <td>`+(index+1)+`</td>
                                    <td>`+item.sort_name+`</td>
                                    <td>`+item.name+`</td>
                                    <td><img width="30" src="`+baseUrl+item.flag_image+`" alt=""></td>
                                    <td>Edit | Hapus</td>
                                </tr>`;
            });

            $("#databahasa").html(languageList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    function setForm(){
        $("#titleData").html("Tambah Bahasa");
        let form = ``;
        form += `
        <div class="form-group">
        <label for="sort_name">Sort Name</label>
        <input type="text" class="form-control" id="sort_name" aria-describedby="sort_name">
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="name">Nama Bahasa</label>
        <input type="text" class="form-control" id="name" aria-describedby="name">
        </div>
        `;
        form += `
        <input type="hidden" id="flag_image">
        <div class="form-group">
        <label for="flag">Bendera</label>
        <input type="file" class="form-control" id="flag" aria-describedby="flag" name="flag">
        </div>
        `;
        form += `
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" id="tambah">Tambah</a>
        </div>
        `;

        $("#formData").html(form);
    }

    document.addEventListener("change", function(e) {
        if (e.target && e.target.id === "flag") {
            const fileInput = document.getElementById('flag');
            const formData = new FormData();

            if (fileInput.files.length === 0) {
                alert("Pilih file dulu!");
                return;
            }

            formData.append('fileData', fileInput.files[0]);

            fetch(apiURL + '/admin/upload', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer '+token
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Upload berhasil:', data);
                alert('Upload berhasil!');
                // menyimpan URL file ke input hidden
                document.getElementById('flag_image').value = data.pathLocation || '';
            })
            .catch(error => {
                console.error('Upload gagal:', error);
                alert('Upload gagal!');
            });
        }
    });

    document.addEventListener("click", function(e) {
        if (e.target && e.target.id === "tambah") {

            
            let body = {
                sort_name:$("#sort_name").val(),
                name:$("#name").val(),
                flag_image:$("#flag_image").val()
            }
            console.log(body);

            fetch(apiURL + '/admin/language', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer '+token,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Tambah Data berhasil:', data);
                alert('Berhasil Menambah Data!');
                window.location.href = "/admin/bahasa";
            })
            .catch(error => {
                console.error('Tambah Data gagal:', error);
                alert('Gagal Menambah Data!');
            });
        }
    });

</script>

<?= $this->endSection() ?>