<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div class="about" id="titleArticleView"></div>
    <div class="row" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-5">
                <img style="width:100%" id="imgBlog" src="" alt="Gambar Artikel">

                <div id="links" style="padding:10px;margin-top:20px;">
                    <div class="alert alert-primary" role="alert">
                        Related Blog
                    </div>
                    <div id="contentLink"></div>


                </div>
            </div>
            <div class="col-md-7">
                <div id="detail"></div>
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
            $("#imgBlog").attr('src',baseUrl+"public/"+data.data.image)
            $("#detail").html(data.data.detail)
            
    })
    .catch(error => {
            console.error('Error:', error.message);
    });

    fetch(apiURL + '/api/blog/where?page=1' + '&row_count=6', {
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
            let contentLink = '';
            $.each(data.data, function (index, item) {
                if (lang === 'id') blogUri = baseUrl + langUri + 'blog/' + item.id;
                else if (lang === 'cn') blogUri = baseUrl + langUri + '博客/' + item.id;
                else if (lang === 'jp') blogUri = baseUrl + langUri + 'ブログ/' + item.id;
                else blogUri = baseUrl + langUri + 'blog/' + item.id;

                blogList += `
                    <div class="col-md-2 cards">
                        <a href="${blogUri}" class="sampleClick">
                            <div class="card" style="height:100%;">
                                <img src="${baseUrl +"public/"+ item.image}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-title" style="font-size:12px;"><strong>${item.title}</strong></p>
                                    <p class="card-text" style="font-size:12px;">${limitedText(item.preface, item.title)}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                `;

                contentLink += `<a href="${blogUri}" style="text-decoration:none;"><div class="alert alert-secondary" role="alert">
                                ${item.title}
                                </div></a>
                                `;
            });
            $("#contentLink").html(contentLink);
            $("#blogListPageRelated").html(blogList);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

        function limitedText(htmlString, title, maxTotal = 100) {
            const tempDivTitle = document.createElement("div");
            tempDivTitle.innerHTML = title;
            const plainTextTitle = tempDivTitle.textContent || tempDivTitle.innerText || "";

            const tempDiv = document.createElement("div");
            tempDiv.innerHTML = htmlString;
            const plainTextPreface = tempDiv.textContent || tempDiv.innerText || "";

            const remaining = maxTotal - plainTextTitle.length;

            if (plainTextPreface.length <= remaining) return plainTextPreface;

            // Potong berdasarkan kata
            const words = plainTextPreface.split(" ");
            let result = "";
            for (let i = 0; i < words.length; i++) {
                if ((result + words[i]).length > remaining) break;
                result += (i > 0 ? " " : "") + words[i];
            }

            return result.trim() + "...";
        }

        window.addEventListener('DOMContentLoaded', function () {
            var relatedBlogDiv = $("#links");
            if (window.innerWidth < 768) {
                relatedBlogDiv.hide();   // jQuery way to hide
            } else {
                relatedBlogDiv.show();   // jQuery way to show
            }
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