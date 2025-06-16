<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div class="about" id="titleArticleView"></div>
    <div class="row" style="margin-top:30px;">
        <div class="row koran-style">
            <div class="col-md-12">
                <p>
                <img style="width:500px;" id="imgBlog" src="" alt="Gambar Artikel"><span id="detail"></span>
                </p>
            </div>
        </div>
    </div>
    <div class="about" style="text-align:center !important;" id="related"> RELATED</div>
    <div class="row" style="margin-top:30px;" id="blogListPageRelated"></div>
</div>
<script>
    let lang = sessionStorage.getItem("language") || 'id';
    const pathSegments = window.location.pathname.split('/');
    const slug = pathSegments[pathSegments.length - 1]; // "sample-aja3"
        // get api blog View
    fetch(apiURL + '/api/blog/'+slug, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
            $("#titleArticleView").text(data.data.title);
            $("#imgBlog").attr('src',baseUrl+data.data.image)
            $("#detail").text(data.data.detail)
            
    })
    .catch(error => {
            console.error('Error:', error.message);
    });

    fetch(apiURL + '/api/blog/where?page=1' + '&row_count=4', {
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
                if (lang === 'id') blogUri = baseUrl + langUri + 'blog/' + item.id;
                else if (lang === 'cn') blogUri = baseUrl + langUri + '博客/' + item.id;
                else if (lang === 'jp') blogUri = baseUrl + langUri + 'ブログ/' + item.id;
                else blogUri = baseUrl + langUri + 'blog/' + item.id;

                blogList += `
                    <div class="col-md-3 cards">
                        <a href="${blogUri}" class="sampleClick">
                            <div class="card">
                                <img src="${baseUrl + item.image}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">${item.title}</h5>
                                    <p class="card-text">${item.preface}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
            });

            $("#blogListPageRelated").html(blogList);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
</script>
<style>
    <style>
  .koran-style p {
    text-align: justify;
  }

  .koran-style img {
    float: left; /* atau right */
    margin-right: 15px;
    margin-bottom: 10px;
    width: 40%;
    max-width: 300px;
    height: auto;
    border-radius: 8px;
  }
</style>
</style>
<?= $this->endSection() ?>