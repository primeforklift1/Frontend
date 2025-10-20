<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="<?= base_url() ?>img/fav.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>



    <title>Prime Forklift</title>
    <script>
        const baseUrl = '<?php echo base_url(); ?>';
        const apiURL = "<?php echo getenv('NODE_API_URL'); ?>";

        function setlanguages(lang){
        sessionStorage.setItem("language", lang);

        }
        function createPagination(totalPages, currentPage) {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';
            
            // Previous button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `<a class="page-link" href="#" data-page="${currentPage - 1}">Prev</a>`;
            pagination.appendChild(prevLi);
            
            // Always show first page
            if (currentPage > 3 && totalPages > 5) {
                const firstLi = document.createElement('li');
                firstLi.className = `page-item ${currentPage === 1 ? 'active' : ''}`;
                firstLi.innerHTML = `<a class="page-link" href="#" data-page="1">1</a>`;
                pagination.appendChild(firstLi);
                
                if (currentPage > 4 && totalPages > 6) {
                    const dotsLi = document.createElement('li');
                    dotsLi.className = 'page-item disabled';
                    dotsLi.innerHTML = `<span class="page-link">...</span>`;
                    pagination.appendChild(dotsLi);
                }
            }
            
            // Determine range of pages to show
            let startPage, endPage;
            if (totalPages <= 5) {
                startPage = 1;
                endPage = totalPages;
            } else {
                if (currentPage <= 3) {
                    startPage = 1;
                    endPage = 5;
                } else if (currentPage + 2 >= totalPages) {
                    startPage = totalPages - 4;
                    endPage = totalPages;
                } else {
                    startPage = currentPage - 2;
                    endPage = currentPage + 2;
                }
            }
            
            // Create page links
            for (let i = startPage; i <= endPage; i++) {
                const pageLi = document.createElement('li');
                pageLi.className = `page-item ${currentPage === i ? 'active' : ''}`;
                pageLi.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
                pagination.appendChild(pageLi);
            }
            
            // Show last page with dots if needed
            if (currentPage < totalPages - 2 && totalPages > 5) {
                if (currentPage < totalPages - 3 && totalPages > 6) {
                    const dotsLi = document.createElement('li');
                    dotsLi.className = 'page-item disabled';
                    dotsLi.innerHTML = `<span class="page-link">...</span>`;
                    pagination.appendChild(dotsLi);
                }
                
                const lastLi = document.createElement('li');
                lastLi.className = `page-item ${currentPage === totalPages ? 'active' : ''}`;
                lastLi.innerHTML = `<a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>`;
                pagination.appendChild(lastLi);
            }
            
            // Next button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
            nextLi.innerHTML = `<a class="page-link" href="#" data-page="${currentPage + 1}">Next</a>`;
            pagination.appendChild(nextLi);
            
            // Add click event listeners
            document.querySelectorAll('#pagination a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const page = parseInt(this.getAttribute('data-page'));
                    if (page >= 1 && page <= totalPages && page !== currentPage) {
                        // Panggil fungsi untuk memuat data halaman baru
                        loadPageData(page);
                    }
                });
            });
        }

        // Contoh penggunaan:
        // createPagination(10, 1); // Total 10 halaman, halaman aktif 1

        // Fungsi untuk memuat data halaman (contoh)
        function loadPageData(page) {
            console.log('Memuat data untuk halaman:', page);
            // Di sini Anda akan melakukan AJAX request atau apapun untuk memuat data
            // Setelah data dimuat, update pagination:
            createPagination(totalPages, page); // totalPages harus diketahui dari server
        }

        function setModalLayanan(id,poin){
            fetch(apiURL + '/api/service/'+id, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                $("#imgName"+poin).text(data.data.name);
                $("#imgModalRental").attr("src",baseUrl+"public/"+data.data.image);
                $("#descData"+poin).html(data.data.preface);

                let html = ``;
                    let dataSpec = data.data.detail.split(';');
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
                    $("#dataTable"+poin).html(html)
            });
        }
    
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparan">
        <a class="navbar-brand" href="#"><img src="<?= base_url()?>img/wht-1.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="menuList" class="navbar-nav ml-auto">
                
            </ul>
        </div>
    </nav>