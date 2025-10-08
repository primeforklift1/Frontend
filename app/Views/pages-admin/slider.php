<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Slider</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success"  data-toggle="modal" data-target="#addData" onclick="setForm()">Tambah Slider</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <th>Judul Slider</th>
                <td>Text</td>
                <td>Gambar</td>
                <td>Status</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataslider">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <th>Judul Slider</th>
                <th>Text</th>
                <th>Gambar</th>
                <td>Status</td>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    // get api info all page
    fetch(apiURL + '/api/slider/where', {
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
            let infoList = '';
            $.each(data.data, function(index, item) {
                infoList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.lang + `</td>
                                    <td>` + item.title + `</td>
                                    <td>` + item.text + `</td>
                                    <td><img width="100" src="`+baseUrl+'public/'+item.image+`" alt=""></td>
                                    <td>`+(item.status == 1 ? 'Aktif' : 'Non Aktif')+`</td>
                                    <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addData" onclick="setFormUpdate(`+item.id+`)">Edit</button>
                                    <button class="btn btn-danger" onclick="if(confirm('Yakin ingin menghapus ini?')) hapus(` + item.id + `)">Hapus</button>
                                    </td>
                                </tr>`;
            });

            $("#dataslider").html(infoList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
    
    function setForm(){
        $("#titleData").html("Tambah Slider");
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
        <label for="translated_data_title">Nama Judul</label>
        <input type="text" class="form-control" id="translated_data_title" aria-describedby="translated_data_title" placeholder="">
        <span id="val_translated_data_title"></span>
        </div>
        `;
        form += `
        <div">
            <a class="btn btn-secondary" onclick="translator('translated_data_title')">Translate</a>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="translated_data_value">Informasi</label>
        <div style="height: 200px;border-radius: 0px 0px 10px 10px;" id="translated_data_value"></div>
        <span id="val_translated_data_value"></span>
        </div>
        `;
        form += `
        <div">
            <a class="btn btn-secondary" onclick="translator('translated_data_value')">Translate</a>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="order">Link</label>
        <input type="text" class="form-control" id="link" aria-describedby="link">
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="flag">Gambar <span style="color:red;">(Width : 1440px, Height : 697px Recommended)</span></label>
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

            const toolbarOptions = [
                    [{
                        'font': []
                    }],

                    ['bold', 'italic'],
                    ['link'],
                    ['code-block'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }, {
                        'list': 'check'
                    }],
                    ['image']
                ];
                const quill = new Quill('#translated_data_value', {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
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

            let translate_data_title = $("#val_translated_data_title").text()
            let translated_data_value = $("#val_translated_data_value").text()
            let config_name = "";
            let config_value = "";
            if(translate_data_title == ""){
                config_name = $("#translated_data_title").val()
            }else{
                config_name = translate_data_title
            }
            if(translated_data_value == ""){
                config_value = $("#translated_data_value"+ " .ql-editor").html();
            }else{
                config_value = translated_data_value
            }
            let body = {
                lang:$("#lang").val(),
                link:$("#link").val(),
                title:config_name,
                text:config_value,
                image:$("#flag_image").text()
            }
            console.log(body);

            fetch(apiURL + '/admin/slider', {
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
                window.location.href = "/admin/slider";
            })
            .catch(error => {
                console.error('Tambah Data gagal:', error);
                alert('Gagal Menambah Data!');
            });
        }
    });
    function translator(id){
        let text = $("#lang option:selected").text();
            let split = text.split('-');
            if(split[0] != ''){
                console.log(text);

                let textData = "";

                // Cek apakah ID target adalah Quill editor (div) atau input biasa
                if ($("#" + id).hasClass("ql-editor") || $("#" + id).find(".ql-editor").length > 0) {
                    // Ambil konten HTML dari Quill editor
                    textData = $("#" + id + " .ql-editor").html();
                } else {
                    // Ambil dari input biasa
                    textData = $("#" + id).val();
                }

                let body = {
                    textData:textData,
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
                    $("#val_"+id).text(data.data[0])
                })
                .catch(error => {
                    console.error('Translate gagal:', error);
                    alert('Gagal Translate Data!');
                });
            }
    }

    function setFormUpdate(id){
        $("#titleData").html("Edit Slider");
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
        <label for="translated_data_title">Nama Judul</label>
        <input type="text" class="form-control" id="translated_data_title" aria-describedby="translated_data_title" placeholder="">
        <span id="val_translated_data_title"></span>
        </div>
        `;
        form += `
        <div">
            <a class="btn btn-secondary" onclick="translator('translated_data_title')">Translate</a>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="translated_data_value">Informasi</label>
        <div style="height: 200px;border-radius: 0px 0px 10px 10px;" id="translated_data_value"></div>
        <span id="val_translated_data_value"></span>
        </div>
        `;
        form += `
        <div">
            <a class="btn btn-secondary" onclick="translator('translated_data_value')">Translate</a>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="order">Link</label>
        <input type="text" class="form-control" id="link" aria-describedby="link">
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="flag">Gambar <span style="color:red;">(Width : 1440px, Height : 697px Recommended)</span></label>
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
                // get api slider by id
                fetch(apiURL + '/api/slider/'+id)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        $("#idData").val(data.data.id);
                        $("#lang").val(data.data.lang);
                        $("#translated_data_title").val(data.data.title);
                        $("#translated_data_value").html(data.data.text);
                        $("#link").html(data.data.link);
                        $("#flag_image").html(data.data.image);
                        $("#status").val(data.data.status);

                        const toolbarOptions = [
                            [{
                                'font': []
                            }],

                            ['bold', 'italic'],
                            ['link'],
                            ['code-block'],
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }, {
                                'list': 'check'
                            }],
                            ['image']
                        ];
                        const quill = new Quill('#translated_data_value', {
                            modules: {
                                toolbar: toolbarOptions
                            },
                            theme: 'snow'
                        });
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

            let translate_data_title = $("#val_translated_data_title").text()
            let translated_data_value = $("#val_translated_data_value").text()
            let config_name = "";
            let config_value = "";
            if(translate_data_title == ""){
                config_name = $("#translated_data_title").val()
            }else{
                config_name = translate_data_title
            }
            if(translated_data_value == ""){
                config_value = $("#translated_data_value"+ " .ql-editor").html();
            }else{
                config_value = translated_data_value
            }
            let body = {
                id:$("#idData").val(),
                lang:$("#lang").val(),
                link:$("#link").val(),
                title:config_name,
                text:config_value,
                image:$("#flag_image").text(),
                status:$("#status").val(),
            }
            // put api slider by id
            fetch(apiURL + '/admin/slider', {
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
                window.location.href = "/admin/slider";
            })
            .catch(error => {
                console.error('Edit Data gagal:', error);
                alert('Gagal Edit Data!');
            });
        }
    });

    function hapus(id){
        console.log(id);
        // delete api slider by id
        fetch(apiURL + '/admin/slider/'+id, {
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
            window.location.href = "/admin/slider";
        })
        .catch(error => {
            console.error('Hapus Data gagal:', error);
            alert('Gagal Hapus Data!');
        });
    }
</script>

<?= $this->endSection() ?>