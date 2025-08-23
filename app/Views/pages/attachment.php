<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten" style="padding:70px;">
    <!-- search -->
    <div style="margin-top: 120px;">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" id="search" aria-describedby="searchProduct" placeholder="Cari Produk">
            </div>
        </div>
    </div>
    <!-- forklift -->
    <div id="dataProduk">
        <div>
            <div class="row">
                <div class="col-md-10">
                    <div class="judul-produk">Attachment</div>
                </div>
                <div class="col-md-2" style="text-align:right;margin-top:10px;">
                    <select class="form-control form-control-sm merk" id="id_merek">
                    </select>
                </div>
            </div>
            <div>
                <div class="row" id="attachmentListPage">
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <nav aria-label=" Page navigation example">
                            <ul class="pagination pagination-sm justify-content-end" id="pagination">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    let nameSearch = document.getElementById("search").value;
    let merek = document.querySelector(".merk").value;
    
    document.getElementById("search").addEventListener("keyup", function(event) {
        merek = document.querySelector(".merk").value;
        nameSearch = this.value;
        console.log("Ketik:", nameSearch);
        console.log("merek:", merek);
        loadData(1, createPagination);
    });

    document.getElementById("id_merek").addEventListener("change", function () {
        merek = this.value;
        nameSearch = document.getElementById("search").value;
        console.log("Ganti merek:", merek);
        console.log("Ketik (masih sama):", nameSearch);
        loadData(1, createPagination);
    });

    function loadData(page = 1, callback = null) {
        let lang = sessionStorage.getItem("language") || 'id';

        fetch(apiURL + '/api/product/where?page=' + page + '&row_count=24', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                lang: lang,
                status: 1,
                id_category:5,
                id_merk:merek,
                name:nameSearch
            })
        })
        .then(response => response.json())
        .then(data => {
            const totalData = data.totalData || 0;
            totalPages = Math.ceil(totalData / 24);
            currentPage = page;

            console.log("Total Data:", totalData, "Total Pages:", totalPages);

            let attachmentList = '';
            let langUri = lang ? lang + '/' : '';
            let attachmentUri = '';

            $.each(data.data, function (index, item) {
                if (lang === 'id'){ attachmentUri = baseUrl + langUri + 'attachment/' + item.id;
                }else if (lang === 'cn'){ attachmentUri = baseUrl + langUri + '依恋/' + item.id;$(".judul-produk").html('依恋');
                }else if (lang === 'jp'){ attachmentUri = baseUrl + langUri + 'アタッチメント/' + item.id;$(".judul-produk").html('アタッチメント');
                }else{ attachmentUri = baseUrl + langUri + 'Anhang/' + item.id;$(".judul-produk").html('Anhang');}

                attachmentList += `
                    <div style="cursor:pointer;" class="col-md-3" data-toggle="modal" data-target="#produkModal" onclick="setModal('`+item.id+`')">
                        <div class="carding">
                            <div class="carding-img">
                                <img src="${baseUrl +"public/"+ item.image}" alt="...">
                            </div>
                            <div class="carding-title" style="text-align:center;">
                                <h6><b>${item.name}</b></h6>
                            </div>
                        </div>
                    </div>
                `;
            });

            $("#attachmentListPage").html(attachmentList);

            // Setelah selesai, panggil callback jika ada
            if (typeof callback === 'function') {
                callback(totalPages, currentPage);
            }
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
    }

    function createPagination(totalPages, currentPage) {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        const prevLi = document.createElement('li');
        prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
        prevLi.innerHTML = `<a class="page-link" href="#" data-page="${currentPage - 1}">Prev</a>`;
        pagination.appendChild(prevLi);

        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, currentPage + 2);

        if (totalPages <= 5) {
            startPage = 1;
            endPage = totalPages;
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageLi = document.createElement('li');
            pageLi.className = `page-item ${i === currentPage ? 'active' : ''}`;
            pageLi.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
            pagination.appendChild(pageLi);
        }

        const nextLi = document.createElement('li');
        nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
        nextLi.innerHTML = `<a class="page-link" href="#" data-page="${currentPage + 1}">Next</a>`;
        pagination.appendChild(nextLi);

        document.querySelectorAll('#pagination a').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const page = parseInt(this.getAttribute('data-page'));
                if (page >= 1 && page <= totalPages && page !== currentPage) {
                    loadData(page, createPagination);
                }
            });
        });
    }

    // Jalankan pertama kali
    loadData(1, createPagination);
</script>
<?= $this->endSection() ?>