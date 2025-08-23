<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Kategori</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success" data-toggle="modal" data-target="#addData" onclick="setForm()">Tambah Kategori</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <th>Nama kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="datakategory">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    // get api categori all page
    fetch(apiURL + '/api/category/where', {
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
        let categoryList = '';
            $.each(data.data, function(index, item) {
                categoryList += `<tr>
                                    <td>`+(index+1)+`</td>
                                    <td>`+item.lang+`</td>
                                    <td>`+item.name+`</td>
                                    <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addData" onclick="setFormUpdate(`+item.id+`)">Edit</button>
                                    </td>
                                    </tr>`;
                                });
                                
                                $("#datakategory").html(categoryList);
                                new DataTable('#example');
                            })
                            .catch(error => {
                                console.error('Error:', error.message);
                            });
                            
                            // <button class="btn btn-danger" onclick="if(confirm('Yakin ingin menghapus ini?')) hapus(` + item.id + `)">Hapus</button>
    function setForm(){
        $("#titleData").html("Tambah Kategori");
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
        <label for="name">Nama Kategori</label>
        <input type="text" class="form-control" id="name" aria-describedby="name">
        <span id="translated_data"></span>
        </div>
        `;
        form += `
        <div>
            <a class="btn btn-secondary" id="translate">Translate</a>
        </div>
        `;
        form += `
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" id="tambah">Tambah</a>
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
                parent_id:$("#parent_id").val(),
                name:names
            }
            console.log(body);

            fetch(apiURL + '/admin/category', {
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
                window.location.href = "/admin/kategori";
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
        $("#titleData").html("Edit Kategori");
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
        <label for="name">Nama Kategori</label>
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
                // get api category by id
                fetch(apiURL + '/api/category/'+id)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        $("#idData").val(data.data.id);
                        $("#lang").val(data.data.lang);
                        $("#name").val(data.data.name);
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
                parent_id:$("#parent_id").val(),
                name:names
            }
            // put api category by id
            fetch(apiURL + '/admin/category', {
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
                window.location.href = "/admin/kategori";
            })
            .catch(error => {
                console.error('Edit Data gagal:', error);
                alert('Gagal Edit Data!');
            });
        }
    });

    function hapus(id){
        console.log(id);
        // delete api category by id
        fetch(apiURL + '/admin/category/'+id, {
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
            window.location.href = "/admin/kategori";
        })
        .catch(error => {
            console.error('Hapus Data gagal:', error);
            alert('Gagal Hapus Data!');
        });
    }


    
</script>

<?= $this->endSection() ?>