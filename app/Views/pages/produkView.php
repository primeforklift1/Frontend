<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div class="about" id="titleProdukView"></div>
    <div class="row" style="margin-top:30px;">
        <div class="row koran-style">
            <div class="col-md-12">
                <div class="koran-content">
                <img style="width:500px;" id="imgProduk" src="" alt="Gambar Produk">
                <div class="konten-kanan">
                    <table id="spec" class="table-koran"></table>
                    <div id="detail" class="produk-detail"></div>
                </div>
                </div>
            </div>
        </div>
        </div>
    <div class="about" style="text-align:center !important;" id="related"> RELATED</div>
    <div class="row" style="margin-top:30px;" id="produkListPageRelated"></div>
</div>
<script>
    let lang = sessionStorage.getItem("language") || 'id';
    const pathSegments = window.location.pathname.split('/');
    const slug = pathSegments[pathSegments.length - 1]; // "sample-aja3"
        // get api blog View
    fetch(apiURL + '/api/product/'+slug, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
            $("#titleProdukView").text(data.data.name);
            $("#imgProduk").attr('src',baseUrl+data.data.image)
            let html = ``;
            let dataSpec = data.data.spec.split(';');
            for(let i=0;i<dataSpec.length;i++){
                html += `<tr>`;
                let item = dataSpec[i].split(':');
                for(let j=0;j<item.length;j++){
                    if(j==0){
                        html += `<td style="width:150px;">`+item[j]+`</td>`;
                    }else{
                        html += `<td>:`+item[j]+`</td>`;
                    }
                }
                html += `</tr>`;
            }
            $("#spec").append(html)
            $("#detail").html(data.data.description)
            
    })
    .catch(error => {
            console.error('Error:', error.message);
    });

    fetch(apiURL + '/api/product/where?page=1' + '&row_count=4', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                lang: lang,
                status: 1,
            })
        })
        .then(response => response.json())
        .then(data => {
            let blogList = '';
            let langUri = lang ? lang + '/' : '';
            let blogUri = '';
            $.each(data.data, function (index, item) {
                if (lang === 'id') blogUri = baseUrl + langUri + 'produk/' + item.id;
                else if (lang === 'cn') blogUri = baseUrl + langUri + '产品/' + item.id;
                else if (lang === 'jp') blogUri = baseUrl + langUri + '製品/' + item.id;
                else blogUri = baseUrl + langUri + 'produkt/' + item.id;

                blogList += `
                    <div style="cursor:pointer;" class="col-md-3">
                    <a href="${blogUri}" class="sampleClick">
                        <div class="carding">
                            <div class="carding-img">
                                <img src="${baseUrl + item.image}" alt="...">
                            </div>
                            <div class="carding-title" style="text-align:center;">
                                <h6><b>${item.name}</b></h6>
                            </div>
                        </div>
                    </a>
                    </div>
                `;
            });

            $("#produkListPageRelated").html(blogList);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
</script>
<style>
.koran-style {
  text-align: justify;
}

.koran-content {
  display: flex;
  align-items: flex-start;
}

.koran-content img {
  width: 40%;
  max-width: 300px;
  height: auto;
  margin-right: 15px;
  border-radius: 8px;
}

.konten-kanan {
  flex: 1;
}

.table-koran {
  border-collapse: collapse;
  width: 100%;
  margin-top: 0;
}

.table-koran td {
  padding: 4px 8px;
  border-bottom: 1px solid #ccc;
  vertical-align: top;
  font-size: 14px;
}

.produk-detail {
  margin-top: 15px;
  text-align: justify;
}
</style>


<?= $this->endSection() ?>