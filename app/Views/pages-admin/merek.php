<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Merek</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success" data-toggle="modal" data-target="#addData" onclick="setForm()">Tambah Merek</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Merek</th>
                <th>Logo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="datamerk">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Merek</th>
                <th>Logo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    // get api merk all page
    fetch(apiURL + '/api/merk/where', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                // lang: 'id',
            })
        })
        .then(response => response.json())
        .then(data => {
            let merkList = '';
            $.each(data.data, function(index, item) {
                merkList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.nama + `</td>
                                    <td><img width="100" src="`+baseUrl+item.image+`" alt=""></td>
                                    <td>`+(item.status == 1 ? 'Aktif' : 'Non Aktif')+`</td>
                                    <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addData" onclick="setFormUpdate(`+item.id+`)">Edit</button>
                                    <button class="btn btn-danger" onclick="if(confirm('Yakin ingin menghapus ini?')) hapus(` + item.id + `)">Hapus</button>
                                    </td>
                                </tr>`;
            });

            $("#datamerk").html(merkList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    function setForm(){
        $("#titleData").html("Tambah Merk");
        let form = ``;
        form += `
        <div class="form-group">
        <label for="lang">Bahasa</label>
        <select class="form-control" id="lang">
        </select>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="name">Nama Merk</label>
        <input type="text" class="form-control" id="name" aria-describedby="name">
        <span id="translated_data"></span>
        </div>
        `;
        form += `
        <div">
            <a class="btn btn-secondary" id="translate">Translate</a>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="flag">Logo</label>
        <input type="file" class="form-control" id="flag" aria-describedby="flag" name="flag">
        <label for="filedata">File Uploaded : </label>
        <span id="flag_image"></span>
        </div>
        `;
        form += `
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" id="tambah" disabled>Tambah</a>
        </div>
        `;
        $("#formData").html(form);
        // get api language
        fetch(apiURL + '/api/language')
            .then(response => response.json())
            .then(data => {
                let languageList = '';
                $.each(data.data, function(index, item) {
                    languageList += `<option value="`+item.sort_name+`">`+item.translate_id+'-'+item.name+`</option>`;
                });
    
                $("#lang").html(languageList);
            })
            .catch(error => {
                console.error('Error:', error.message);
            });
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

            let translate_data = $("#translated_data").text()
            let names = "";
            if(translate_data == ""){
                names = $("#name").val()
            }else{
                names = translate_data
            }
            let body = {
                lang:$("#lang").val(),
                nama:names,
                image:$("#flag_image").text()
            }
            console.log(body);

            fetch(apiURL + '/admin/merk', {
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
                window.location.href = "/admin/merek";
            })
            .catch(error => {
                console.error('Tambah Data gagal:', error);
                alert('Gagal Menambah Data!');
            });
        }else if(e.target && e.target.id === "translate"){
            let text = $("#lang option:selected").text();
            let split = text.split('-');
            if(split[0] != ''){
                console.log(text);

                let body = {
                    textData:$("#name").val(),
                    from:"id",
                    to:split[0]
                }
                fetch(apiURL + '/admin/translate', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer '+token,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(body)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Translate berhasil:', data.data);
                    $("#translated_data").text(data.data[0])
                })
                .catch(error => {
                    console.error('Translate gagal:', error);
                    alert('Gagal Translate Data!');
                });
            }
        }
    });

    function setFormUpdate(id){
        $("#titleData").html("Edit Merek");
        let form = ``;
        form += `
        <input type="hidden" id="idData">
        <div class="form-group">
        <label for="lang">Bahasa</label>
        <select class="form-control" id="lang">
        </select>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="name">Nama Merk</label>
        <input type="text" class="form-control" id="name" aria-describedby="name">
        <span id="translated_data"></span>
        </div>
        `;
        form += `
        <div">
            <a class="btn btn-secondary" id="translate">Translate</a>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="flag">Logo</label>
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
        // get api language
        fetch(apiURL + '/api/language')
            .then(response => response.json())
            .then(data => {
                let languageList = '';
                $.each(data.data, function(index, item) {
                    languageList += `<option value="`+item.sort_name+`">`+item.translate_id+'-'+item.name+`</option>`;
                });
    
                $("#lang").html(languageList);
                // get api merk by id
                fetch(apiURL + '/api/merk/'+id)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        $("#idData").val(data.data.id);
                        $("#lang").val(data.data.lang);
                        $("#name").val(data.data.nama);
                        $("#flag_image").html(data.data.image);
                        $("#status").val(data.data.status);
                    })
                    .catch(error => {
                        console.error('Error:', error.message);
                    });
            })
            .catch(error => {
                console.error('Error:', error.message);
            });

    }

    document.addEventListener("click", function(e) {
        if (e.target && e.target.id === "simpan") {

            let translate_data = $("#translated_data").text()
            let names = "";
            if(translate_data == ""){
                names = $("#name").val()
            }else{
                names = translate_data
            }
            let body = {
                id:$("#idData").val(),
                lang:$("#lang").val(),
                nama:names,
                image:$("#flag_image").text(),
                status:$("#status").val()
            }
            // put api merk by id
            fetch(apiURL + '/admin/merk', {
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
                window.location.href = "/admin/merek";
            })
            .catch(error => {
                console.error('Edit Data gagal:', error);
                alert('Gagal Edit Data!');
            });
        }
    });

    function hapus(id){
        console.log(id);
        // delete api merk by id
        fetch(apiURL + '/admin/merk/'+id, {
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
            window.location.href = "/admin/merek";
        })
        .catch(error => {
            console.error('Hapus Data gagal:', error);
            alert('Gagal Hapus Data!');
        });
    }

</script>

<?= $this->endSection() ?>