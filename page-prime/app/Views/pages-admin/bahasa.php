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
                <th>Status</th>
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
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>

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
                                    <td>`+(item.status == 1 ? 'Aktif' : 'Non Aktif')+`</td>
                                    <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addData" onclick="setFormUpdate(`+item.id+`)">Edit</button>
                                    <button class="btn btn-danger" onclick="if(confirm('Yakin ingin menghapus ini?')) hapus(` + item.id + `)">Hapus</button>
                                    </td>
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
        <div class="form-group">
        <label for="flag">Bendera</label>
        <input type="file" class="form-control" id="flag" aria-describedby="flag" name="flag">
        <label for="filedata">File Uploaded : </label>
        <span id="flag_image"></span>
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
                $("#flag_image").html(data.pathLocation);
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
                flag_image:$("#flag_image").text()
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

    function setFormUpdate(id){
        console.log(id)
        $("#titleData").html("Edit Bahasa");
        let form = ``;
        form += `
        <input type="hidden" id="idData">
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
        <div class="form-group">
        <label for="flag">Bendera</label>
        <input type="file" class="form-control" id="flag" aria-describedby="flag" name="flag">
         <label for="filedata">File Uploaded : </label>
        <span id="flag_image"></span>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status">
        <option value="0">Non Aktif</option>
        <option value="1">Aktif</option>
        </select>
        </div>
        `;
        form += `
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" id="simpan">Simpan</a>
        </div>
        `;

        $("#formData").html(form);

        // get api language by id
        fetch(apiURL + '/api/language/'+id)
            .then(response => response.json())
            .then(data => {
                $("#idData").val(data.data.id);
                $("#sort_name").val(data.data.sort_name);
                $("#name").val(data.data.name);
                $("#flag_image").html(data.data.flag_image);
                $("#status").val(data.data.status);
            })
            .catch(error => {
                console.error('Error:', error.message);
            });
    }

    document.addEventListener("click", function(e) {
        if (e.target && e.target.id === "simpan") {

            
            let body = {
                id:$("#idData").val(),
                sort_name:$("#sort_name").val(),
                name:$("#name").val(),
                flag_image:$("#flag_image").text(),
                status:$("#status").val()
            }
            // put api language by id
            fetch(apiURL + '/admin/language', {
                method: 'PUT',
                headers: {
                    'Authorization': 'Bearer '+token,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Edit Data berhasil:', data);
                alert('Berhasil Edit Data!');
                window.location.href = "/admin/bahasa";
            })
            .catch(error => {
                console.error('Edit Data gagal:', error);
                alert('Gagal Edit Data!');
            });
        }
    });

    function hapus(id){
        console.log(id);
        // delete api language by id
        fetch(apiURL + '/admin/language/'+id, {
            method: 'DELETE',
            headers: {
                'Authorization': 'Bearer '+token,
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log('Hapus Data berhasil:', data);
            alert('Berhasil Hapus Data!');
            window.location.href = "/admin/bahasa";
        })
        .catch(error => {
            console.error('Hapus Data gagal:', error);
            alert('Gagal Hapus Data!');
        });
    }

</script>

<?= $this->endSection() ?>