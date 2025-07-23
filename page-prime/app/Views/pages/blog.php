<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div class="about" id="blogTitle"></div>
    <div class="row" style="margin-top:30px;" id="blogListPage">
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

<script>
    function loadData(page = 1, callback = null) {
        let lang = sessionStorage.getItem("language") || 'id';

        fetch(apiURL + '/api/blog/where?page=' + page + '&row_count=24', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                lang: lang,
                status: 1,
            })
        })
        .then(response => response.json())
        .then(data => {
            const totalData = data.totalData || 0;
            totalPages = Math.ceil(totalData / 24);
            currentPage = page;

            console.log("Total Data:", totalData, "Total Pages:", totalPages);

            let blogList = '';
            let langUri = lang ? lang + '/' : '';
            let blogUri = '';

            $.each(data.data, function (index, item) {
                if (lang === 'id') blogUri = baseUrl + langUri + 'blog/' + item.id;
                else if (lang === 'cn') blogUri = baseUrl + langUri + '博客/' + item.id;
                else if (lang === 'jp') blogUri = baseUrl + langUri + 'ブログ/' + item.id;
                else blogUri = baseUrl + langUri + 'blog/' + item.id;

                blogList += `
                    <div class="col-md-2 cards">
                        <a href="${blogUri}" class="sampleClick">
                            <div class="card" style="height:100%;">
                                <img src="${baseUrl + item.image}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-title"><strong>${item.title}</strong></p>
                                    <p class="card-text">${limitedText(item.preface, item.title)}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
            });

            $("#blogListPage").html(blogList);

            // Setelah selesai, panggil callback jika ada
            if (typeof callback === 'function') {
                callback(totalPages, currentPage);
            }
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
    }

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
 
</div>

<?= $this->endSection() ?>