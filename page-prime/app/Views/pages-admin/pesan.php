<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Pesan</h2>
    <div style="text-align: right;">
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <td>Negara</td>
                <td>Nama</td>
                <td>Email</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataPesan">
        <tfoot>
            <tr>
                <th>No</th>
                <th>Bahasa</th>
                <th>Negara</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
</div>
<script>
    // get api info all page
    fetch(apiURL + '/api/message', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            let messageList = '';
            $.each(data.data, function(index, item) {
                messageList += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + item.lang + `</td>
                                    <td>` + item.country + `</td>
                                    <td>` + item.name + `</td>
                                    <td>` + item.email + `</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addData" onclick="setFormView(`+item.id+`)">View</button>
                                    </td>
                                </tr>`;
            });

            $("#dataPesan").html(messageList);
            new DataTable('#example');
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    function setFormView(id){
        $("#titleData").html("Pesan");
    //     "country": "Malaysia",
    // "name": "Doni Nurramdan",
    // "email": "nurramdandoni@gmail.com",
    // "telp": "0895330802566",
    // "address": "Kuningan Jawa Barat",
    // "message": "Selamat Siang,  Saya Berminat membeli unit Forklift",
    let form = ``;
        form += `
                <style>
                    .form-group {
                        display: flex;
                        align-items: flex-start;
                        margin-bottom: 10px;
                    }
                    .form-group label {
                        width: 100px;
                        font-weight: bold;
                    }
                    .form-group span {
                        flex: 1;
                    }
                    .icon-links a {
                        margin-left: 10px;
                        text-decoration: none;
                        font-size: 16px;
                    }
                    .icon-links a i {
                        vertical-align: middle;
                    }
                </style>

            <div class="form-group">
                <label>Negara :</label>
                <span id="messageNegara"></span>
            </div>
            <div class="form-group">
                <label>Nama :</label>
                <span id="messageName"></span>
            </div>
            <div class="form-group">
                <label>Email :</label>
                <span id="messageEmail"></span><span class="icon-links" id="emailLink"></span>
            </div>
            <div class="form-group">
                <label>Telp :</label>
                <span id="messageTelp"></span><span class="icon-links" id="waLink"></span>
            </div>
            <div class="form-group">
                <label>Alamat :</label>
                <span id="messageAlamat"></span>
            </div>
            <div class="form-group">
                <label>Pesan :</label>
                <span id="messageMessage"></span>
            </div>

    `;
    $("#formData").html(form);
    // get api merk by id
                fetch(apiURL + '/api/message/'+id)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        $("#messageNegara").text(data.data.country)
                        $("#messageName").text(data.data.name)
                        $("#messageEmail").text(data.data.email)
                        $("#messageTelp").text(data.data.telp)
                        $("#messageAlamat").text(data.data.address)
                        $("#messageMessage").text(data.data.message)

                        $("#waLink").html(`<a href="https://wa.me/${data.data.telp.replace(/^0/, '62')}" target="_blank" title="Kirim WhatsApp">Balas via Whatsapps</a>`);
                        $("#emailLink").html(`<a href="mailto:${data.data.email}" title="Kirim Email">Balas Via Email</a>`);
                    })
                    .catch(error => {
                        console.error('Error:', error.message);
                    });
    }
</script>

<?= $this->endSection() ?>