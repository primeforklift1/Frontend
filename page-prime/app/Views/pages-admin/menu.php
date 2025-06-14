<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Managemen Menu</h2>
    <div style="text-align: right;">
        <button style="margin: 15px 0px 15px 0px;" class="btn btn-success" data-toggle="modal" data-target="#addData" onclick="setForm()">Tambah Menu</button>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <th>ID Menu</th>
                <th>ID Parent Menu</th>
                <th>Nama Menu</th>
                <td>Menu Type</td>
                <td>Link</td>
                <td>Urutan</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="datamenu">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <th>ID Menu</th>
                <th>ID Parent Menu</th>
                <th>Nama Menu</th>
                <th>Menu Type</th>
                <td>Link</td>
                <td>Urutan</td>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    // get api menu all page
    fetch(apiURL + '/api/menu/where-all', {
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
            let menuList = '';
            $.each(data.data, function(index, item) {
                menuList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.lang + `</td>
                                    <td>` + item.id + `</td>
                                    <td>` + item.parent + `</td>
                                    <td>` + item.menu_name + `</td>
                                    <td>` + (item.menu_type == 0 ? 'Static' : item.menu_type == 1 ? 'Dropdown' : item.menu_type == 2 ? 'Button':'Child') + `</td>
                                    <td>` + item.link + `</td>
                                    <td>` + item.order + `</td>
                                    <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addData" onclick="setFormUpdate(`+item.id+`)">Edit</button>
                                    <button class="btn btn-danger" onclick="if(confirm('Yakin ingin menghapus ini?')) hapus(` + item.id + `)">Hapus</button>
                                    </td>
                                </tr>`;
            });

            $("#datamenu").html(menuList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    function cekParent(){
        if($("#menu_type").val() == ''){
            $("#parent").attr('disabled',false);
        }else{
            $("#parent").attr('disabled',true);
        }
    }
    
    function setForm(){
        $("#titleData").html("Tambah Menu");
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
        <label for="menu_type">Tipe Menu</label>
        <select class="form-control" id="menu_type" onChange="cekParent()">
        <option value="0">Static</option>
        <option value="1">Dropdown</option>
        <option value="2">Button</option>
        <option value="">Child</option>
        </select>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="parent">Parent</label>
        <select disabled class="form-control" id="parent">
        </select>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="menu_name">Nama Menu</label>
        <input type="text" class="form-control" id="menu_name" aria-describedby="menu_name">
        <span id="translated_data"></span>
        </div>
        `;
        form += `
        <div>
            <a class="btn btn-secondary" id="translate">Translate</a>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="link">Link Navigation</label>
        <input type="text" class="form-control" id="link" aria-describedby="link">
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="order">Urutan</label>
        <input type="text" class="form-control" id="order" aria-describedby="order">
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
        // get api parent
        fetch(apiURL + '/api/menu/where-all', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                parent: null,
                menu_type: "1",
            })
        })
            .then(response => response.json())
            .then(data => {
                let parentList = '';
                $.each(data.data, function(index, item) {
                    parentList += `<option value="`+item.id+`">`+item.lang+'-'+item.menu_name+`</option>`;
                });
    
                $("#parent").html(parentList);
            })
            .catch(error => {
                console.error('Error:', error.message);
            });
    }

    document.addEventListener("click", function(e) {
        if (e.target && e.target.id === "tambah") {

            let translate_data = $("#translated_data").text()
            let names = "";
            parent = "";
            if($("#menu_type").val() == ''){
                parent = $("#parent").val();
            }
            if(translate_data == ""){
                names = $("#menu_name").val()
            }else{
                names = translate_data
            }
            let body = {
                lang:$("#lang").val(),
                menu_type:$("#menu_type").val() == '' ? null :$("#menu_type").val(),
                parent:parent,
                menu_name:names,
                link:$("#link").val(),
                order:$("#order").val(),
            }
            console.log(body);

            fetch(apiURL + '/admin/menu', {
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
                window.location.href = "/admin/menu";
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
        $("#titleData").html("Edit Menu");
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
        <label for="menu_type">Tipe Menu</label>
        <select class="form-control" id="menu_type" onChange="cekParent()">
        <option value="0">Static</option>
        <option value="1">Dropdown</option>
        <option value="2">Button</option>
        <option value="">Child</option>
        </select>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="parent">Parent</label>
        <select disabled class="form-control" id="parent">
        </select>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="menu_name">Nama Menu</label>
        <input type="text" class="form-control" id="menu_name" aria-describedby="menu_name">
        <span id="translated_data"></span>
        </div>
        `;
        form += `
        <div>
            <a class="btn btn-secondary" id="translate">Translate</a>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="link">Link Navigation</label>
        <input type="text" class="form-control" id="link" aria-describedby="link">
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="order">Urutan</label>
        <input type="text" class="form-control" id="order" aria-describedby="order">
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
                // get api menu by id
                fetch(apiURL + '/api/menu/'+id)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        $("#idData").val(data.data.id);
                        $("#lang").val(data.data.lang);
                        $("#menu_type").val(data.data.menu_type);
                        $("#parent").val(data.data.parent);
                        $("#menu_name").val(data.data.menu_name);
                        $("#link").val(data.data.link);
                        $("#order").val(data.data.order);
                        $("#status").val(data.data.status);
                    })
                    .catch(error => {
                        console.error('Error:', error.message);
                    });
            })
            .catch(error => {
                console.error('Error:', error.message);
            });

            // get api parent
        fetch(apiURL + '/api/menu/where-all', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                parent: null,
                menu_type: "1",
            })
        })
            .then(response => response.json())
            .then(data => {
                let parentList = '';
                $.each(data.data, function(index, item) {
                    parentList += `<option value="`+item.id+`">`+item.lang+'-'+item.menu_name+`</option>`;
                });
    
                $("#parent").html(parentList);
            })
            .catch(error => {
                console.error('Error:', error.message);
            });

    }

    document.addEventListener("click", function(e) {
        if (e.target && e.target.id === "simpan") {

            let translate_data = $("#translated_data").text()
            let names = "";
            parent = null;
            if($("#menu_type").val() == ''){
                parent = $("#parent").val();
            }
            if(translate_data == ""){
                names = $("#menu_name").val()
            }else{
                names = translate_data
            }
            let body = {
                id:$("#idData").val(),
                lang:$("#lang").val(),
                menu_type:$("#menu_type").val(),
                parent:parent,
                menu_name:names,
                link:$("#link").val(),
                order:$("#order").val(),
                status:$("#status").val(),
            }
            // put api menu by id
            fetch(apiURL + '/admin/menu', {
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
                window.location.href = "/admin/menu";
            })
            .catch(error => {
                console.error('Edit Data gagal:', error);
                alert('Gagal Edit Data!');
            });
        }
    });

    function hapus(id){
        console.log(id);
        // delete api menu by id
        fetch(apiURL + '/admin/menu/'+id, {
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
            window.location.href = "/admin/menu";
        })
        .catch(error => {
            console.error('Hapus Data gagal:', error);
            alert('Gagal Hapus Data!');
        });
    }
</script>

<?= $this->endSection() ?>