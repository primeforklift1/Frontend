<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Pop Up Promosi</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success" data-toggle="modal" data-target="#addData" onclick="setForm()">Tambah Popup Promosi</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Promosi</th>
                <th>Gambar</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="datapromosi">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Promosi</th>
                <th>Gambar</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    // get api promosi all page
    fetch(apiURL + '/api/promosi/where', {
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
            let promosiList = '';
            $.each(data.data, function(index, item) {
                promosiList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.title + `</td>
                                    <td><img width="100" src="`+baseUrl+'public/'+item.image+`" alt=""></td>
                                    <td>` + item.start_date.substring(0,10) + `</td>
                                    <td>` + item.end_date.substring(0,10) + `</td>
                                    <td>`+(item.status == 1 ? 'Aktif' : 'Non Aktif')+`</td>
                                    <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addData" onclick="setFormUpdate(`+item.id+`)">Edit</button>
                                    <button class="btn btn-danger" onclick="if(confirm('Yakin ingin menghapus ini?')) hapus(` + item.id + `)">Hapus</button>
                                    </td>
                                </tr>`;
            });

            $("#datapromosi").html(promosiList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    function setForm(){
        $("#titleData").html("Tambah promosi");
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
        <label for="name">Nama promosi</label>
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
        <label for="startDate">Tanggal Mulai</label>
        <input type="date" class="form-control" id="startDate" aria-describedby="startDate">
        <label for="endDate">Tanggal Selesai</label>
        <input type="date" class="form-control" id="endDate" aria-describedby="endDate">
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
                title:names,
                image:$("#flag_image").text(),
                start_date:$("#startDate").val(),
                end_date:$("#endDate").val()
            }
            console.log(body);

            fetch(apiURL + '/admin/promosi', {
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
                window.location.href = "/admin/promosi";
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
        $("#titleData").html("Edit Promosi");
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
        <label for="name">Nama promosi</label>
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
        <label for="startDate">Tanggal Mulai</label>
        <input type="date" class="form-control" id="startDate" aria-describedby="startDate">
        <label for="endDate">Tanggal Selesai</label>
        <input type="date" class="form-control" id="endDate" aria-describedby="endDate">
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
                // get api promosi by id
                fetch(apiURL + '/api/promosi/'+id)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        $("#idData").val(data.data.id);
                        $("#lang").val(data.data.lang);
                        $("#name").val(data.data.title);
                        $("#startDate").val(data.data.start_date.substring(0, 10));
                        $("#endDate").val(data.data.end_date.substring(0, 10));
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
                title:names,
                image:$("#flag_image").text(),
                start_date:$("#startDate").val(),
                end_date:$("#endDate").val(),
                status:$("#status").val()
            }
            // put api promosi by id
            fetch(apiURL + '/admin/promosi', {
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
                window.location.href = "/admin/promosi";
            })
            .catch(error => {
                console.error('Edit Data gagal:', error);
                alert('Gagal Edit Data!');
            });
        }
    });

    function hapus(id){
        console.log(id);
        // delete api promosi by id
        fetch(apiURL + '/admin/promosi/'+id, {
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
            window.location.href = "/admin/promosi";
        })
        .catch(error => {
            console.error('Hapus Data gagal:', error);
            alert('Gagal Hapus Data!');
        });
    }

</script>

<?= $this->endSection() ?>