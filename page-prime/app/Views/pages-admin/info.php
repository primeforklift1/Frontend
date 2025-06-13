<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Informasi Perusahaan</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success" data-toggle="modal" data-target="#addData" onclick="setForm()">Tambah Info</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Info Type</th>
                <th>Nama Info</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="datainfo">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Info Type</th>
                <th>Nama Info</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    // get api info all page
    fetch(apiURL + '/api/config/where', {
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
                                    <td>` + item.config_type + `</td>
                                    <td>` + item.config_name + `</td>
                                    <td><img width="100" src="`+baseUrl+item.image+`" alt=""></td>
                                    <td>Edit | Hapus</td>
                                </tr>`;
            });

            $("#datainfo").html(infoList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
    
    function setForm(){
        $("#titleData").html("Tambah Info");
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
        <label for="configType">Tipe Info</label>
        <select class="form-control" id="configType">
            <option value="about">Tentang</option>
            <option value="contact">Kontak/ Alamat</option>
            <option value="market">Marketplace</option>
            <option value="soc">Sosial Media</option>
        </select>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="translated_data_title">Nama Judul</label>
        <input type="text" class="form-control" id="translated_data_title" aria-describedby="translated_data_title" placeholder="Visi">
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
        <label for="order">Urutan</label>
        <input type="text" class="form-control" id="order" aria-describedby="order">
        <span id="translated_data"></span>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="flag">Gambar</label>
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
                config_type:$("#configType").val(),
                order:$("#order").val(),
                config_name:config_name,
                config_value:config_value,
                image:$("#flag_image").text()
            }
            console.log(body);

            fetch(apiURL + '/admin/config', {
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
                window.location.href = "/admin/info";
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

    
</script>

<?= $this->endSection() ?>