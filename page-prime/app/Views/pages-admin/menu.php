<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Managemen Menu</h2>
    <div style="text-align: right;">
        <!-- <button style="margin: 15px 0px 15px 0px;" class="btn btn-success" data-toggle="modal" data-target="#addData" onclick="setForm()">Tambah Menu</button> -->
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
        <label for="name">Nama Menu</label>
        <input type="text" class="form-control" id="name" aria-describedby="name">
        <span id="translated_data"></span>
        </div>
        `;
        form += `
        <div class="form-group">
        <label for="name">Parent Menu</label>
        <select class="form-control" id="parent_id">
        </div>
        `;
        form += `
        <div">
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
</script>

<?= $this->endSection() ?>