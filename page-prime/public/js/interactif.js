
$(document).ready(function () {


    var lang = sessionStorage.getItem("language");
    console.log("Bahasa Saat ini : ", lang);

    if (lang == null) {
        lang = 'id';

    }

    let labelBahasa = 'Bahasa';
    $("#footer-pages").html(`<div class="text-wrapper-30">Pages</div>
            <div class="flexcontainer">
                <p class="text">
                    <span class="text-wrapper-31">Beranda<br /></span>
                </p>
                <p class="text">
                    <span class="text-wrapper-31">Tentang Kami<br /></span>
                </p>
                <p class="text">
                    <span class="text-wrapper-31">Produk<br /></span>
                </p>
                <p class="text">
                    <span class="text-wrapper-31">Layanan<br /></span>
                </p>
                <p class="text"><span class="text-wrapper-31">Blog</span></p>
            </div>`);
    if (lang == 'cn') {
        labelBahasa = '语言';

        $("#footer-pages").html(`<div class="text-wrapper-30">页面</div>
            <div class="flexcontainer">
            <p class="text">
            <span class="text-wrapper-31">主页<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">关于我们<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">产品<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">服务<br /></span>
            </p>
            <p class="text"><span class="text-wrapper-31">博客</span></p>
            </div>`);

        $("#social").text('社交媒体');
        $("#market").text('市场');
        $("#contact").text('接触');
    } else if (lang == 'jp') {
        labelBahasa = '言語';

        $("#footer-pages").html(`<div class="text-wrapper-30">ページ</div>
            <div class="flexcontainer">
            <p class="text">
            <span class="text-wrapper-31">ホームページ<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">当社について<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">製品<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">サービス<br /></span>
            </p>
            <p class="text"><span class="text-wrapper-31">ブログ</span></p>
            </div>`);

        $("#social").text('ソーシャルメディア');
        $("#market").text('市場');
        $("#contact").text('接触');
    } else if (lang == 'gn') {
        labelBahasa = 'Sprache';

        $("#footer-pages").html(`<div class="text-wrapper-30">Seiten</div>
            <div class="flexcontainer">
            <p class="text">
            <span class="text-wrapper-31">Startseite<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">Über uns<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">Produkte<br /></span>
            </p>
            <p class="text">
            <span class="text-wrapper-31">Seite<br /></span>
            </p>
            <p class="text"><span class="text-wrapper-31">Blog</span></p>
            </div>`);

        $("#social").text('Soziale Medien');
        $("#market").text('Marktplatz');
        $("#contact").text('Kontakt');
    }

    if (lang == 'id') {
        $("#blogTitle").text('Blog');
    } else if (lang == 'cn') {
        $("#blogTitle").text('博客');
    } else if (lang == 'jp') {
        $("#blogTitle").text('ブログ/');
    } else {
        $("#blogTitle").text('Blog');
    }

    // get api menu
    fetch(apiURL + '/api/menu/where', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            lang: lang,
            status: 1,
        })
    })
        .then(response => response.json())
        .then(data => {
            let menuList = '';
            let menuListWhite = '';
            $.each(data.data, function (index, item) {
                if (item.menu_type == 0) {
                    menuList += `<li class="nav-item mx-3">
                                <a class="nav-link text-white" href="`+ baseUrl + lang + '/' + item.link + `">` + item.menu_name + ` <span class="sr-only"></span></a>
                             </li>`;
                    menuListWhite += `<li class="nav-item mx-3">
                                    <a class="nav-link" href="`+ baseUrl + lang + '/' + item.link + `" style="color:#0072ff !important;">` + item.menu_name + `<span class="sr-only"></span></a>
                                  </li>`;
                } else if (item.menu_type == 1) {
                    let tmpmenuList = `<li class="nav-item mx-3 dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href=" #" role="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        `+ item.menu_name + `
                                    </a>
                                    <div class="dropdown-menu">`;
                    let tmpmenuListWhite = `<li class="nav-item mx-3 dropdown">
                                    <a class="nav-link dropdown-toggle" href=" #" style="color:#0072ff !important;" role="button"
                                        data-toggle="dropdown" aria-expanded="false">
                                        `+ item.menu_name + `
                                    </a>
                                    <div class="dropdown-menu">`;

                    $.each(item.child, function (index, list) {
                        tmpmenuList += `<a class="dropdown-item" href="` + baseUrl + lang + '/' + list.link + `">` + list.menu_name + `</a>`;
                        tmpmenuListWhite += `<a class="dropdown-item" href="` + baseUrl + lang + '/' + list.link + `">` + list.menu_name + `</a>`;
                    });


                    tmpmenuList += `</div></li>`;
                    tmpmenuListWhite += `</div></li>`;

                    menuList += tmpmenuList;
                    menuListWhite += tmpmenuListWhite;

                } else {
                    menuList += `<li class="nav-item mx-3">
                    <a href="`+ baseUrl + lang + '/' + item.link + `" class="btn btn-primary rounded-pill">`+ item.menu_name + `</a>
                </li>`;
                    menuListWhite += `<li class="nav-item mx-3">
                    <a href="`+ baseUrl + lang + '/' + item.link + `" class="btn btn-primary rounded-pill">`+ item.menu_name + `</a>
                </li>`;
                }
            });

            menuList += `<li class="nav-item mx-3 dropdown">
                        <a id="langName" class="nav-link dropdown-toggle text-white" href=" #" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            `+ labelBahasa + `
                        </a>
                        <div id="optionLang" class="dropdown-menu" style="background-color: rgba(255, 255, 255, 0);border:none;"></div>
                    </li>`;
            menuListWhite += `<li class="nav-item mx-3 dropdown">
                    <a  id="langName" class="nav-link dropdown-toggle" href=" #" style="color:#0072ff !important;" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        `+ labelBahasa + `
                    </a>
                    <div id="optionLang" class="dropdown-menu" style="background-color: rgba(255, 255, 255, 0); border:none;"></div>
                </li>`;

            $("#menuList").html(menuList);
            $("#menuListWhite").html(menuListWhite);
            // get api language
            fetch(apiURL + '/api/language/where', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    status: 1,
                })
            })
                .then(response => response.json())
                .then(data => {
                    let languageList = '';
                    $.each(data.data, function (index, item) {
                        //     languageList += `<a onclick="setlanguages('id')" class="dropdown-item" href="<?= base_url()?>id/"><img src="<?= base_url()?>img/id.png" alt=""></a>`;
                        languageList += `<a onclick="setlanguages('` + item.sort_name + `')" class="dropdown-item" href="` + baseUrl + item.sort_name + `/"><img src="` + baseUrl + item.flag_image + `" alt=""></a>`;
                    });

                    $("#optionLang").html(languageList);
                })
                .catch(error => {
                    console.error('Error:', error.message);
                });
        })
        .catch(error => {
            console.error('Error:', error.message);
        });


    // get api slider
    fetch(apiURL + '/api/slider/where', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            lang: lang,
            status: 1,
        })
    })
        .then(response => response.json())
        .then(data => {
            let sliderList = '';
            $.each(data.data, function (index, item) {
                let act = '';
                if (index == 0) {
                    act = 'active';
                }
                sliderList += `
                    <div class="carousel-item position-relative `+ act + `">
                        <img class="d-block h-100"
                            src="`+ baseUrl + item.image + `"
                            style="align-items: center;" />
                        <div class="dark-overlay position-absolute w-100 h-100"></div>
                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                            <p class="selamat-datang-di text-white">
                            `+ item.title + `
                            </p>
                            <p class="solusi-terbaik-untuk text-white">
                            `+ item.text + `</p>
                        </div>
                    </div>
                `;
            });

            $("#sliderData").html(sliderList);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    // get api merk
    fetch(apiURL + '/api/merk/where', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            lang: lang,
            status: 1,
        })
    })
        .then(response => response.json())
        .then(data => {
            let merkList = '';
            let merkListView = '';
            $.each(data.data, function (index, item) {
                
                merkList += `
                    <option>`+item.nama+`</option>
                `;
                merkListView += `
                    <div class="col-md-3">
                        <img class="pngwing-com-4" width="100%" src="`+ baseUrl + item.image + `" />
                    </div>
                `;
            });

            $(".merk").html(merkList);
            $("#merkList").html(merkListView);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    // get api client
    fetch(apiURL + '/api/client/where', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            lang: lang,
            status: 1,
        })
    })
        .then(response => response.json())
        .then(data => {
            let clientView = '';
            $.each(data.data, function (index, item) {
                
                clientView += `
                    <div class="col-md-3">
                        <img class="pngwing-com-4" width="100%" src="`+ baseUrl + item.image + `" />
                    </div>
                `;
            });

            $("#clientList").html(clientView);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    // get api About
    fetch(apiURL + '/api/config/where', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            lang: lang,
            status: 1,
        })
    })
        .then(response => response.json())
        .then(data => {
            let configListlanding = '';
            let configList = '';
            let socList = '';
            let marketList = '';
            let contactList = '';
            let whyTitle = '';
            let whyImage = '';
            let whyList = '';
            $.each(data.data, function (index, item) {
                if (item.config_type == "about") {
                    if (item.image != "") {
                        configListlanding += `<div class="about">` + item.config_name + `</div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        `+ item.config_value + `
                                                    </div>
                                                    <div class="col-md-6" style="text-align: center;">
                                                        <img width="60%" src="`+ baseUrl + item.image + `" />
                                                    </div>
                                                </div>`;
                        configList += `<div class="about">` + item.config_name + `</div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        `+ item.config_value + `
                                                    </div>
                                                    <div class="col-md-6" style="text-align: center;">
                                                        <img width="60%" src="`+ baseUrl + item.image + `" />
                                                    </div>
                                                </div>`;
                    } else {
                        configList += `<div class="about">` + item.config_name + `</div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        `+ item.config_value + `
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="box">
                                                            <div class="rectangle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
                    }
                } else if (item.config_type == "soc") {
                    socList += `<a href="` + item.config_name + `"><img style="margin-right:2px;" src="` + baseUrl + item.image + `" alt=""></a>`;

                } else if (item.config_type == "market") {
                    marketList += `<a href="` + item.config_name + `"><img class="image-7" width="60" src="` + baseUrl + item.image + `" /></a>`;

                } else if (item.config_type == "contact") {
                    contactList += `<div style="margin-top:10px;" class="text-wrapper-33"><img src="` + baseUrl + item.image + `" alt="" width="15">` + item.config_value + `</div>`;
                    if(item.config_name == 'wa'){

                        // $("#whatsapp-fab").attr("href",'https://wa.me/'+ item.config_value);
                        $("#whatsapp-fab").attr("href",'https://wa.me/082210812989');
                    }
                } else {
                    let separatedTemp = item.config_name;
                    let count = separatedTemp.split(':');
                    if (count.length < 2) {
                        whyTitle = item.config_value;
                        whyImage = `<img width="80%" src="`+ baseUrl + item.image + `" />`;
                    } else {

                        whyList += `<div class="row">
                                        <div class="col-md-2">
                                            <div class="box-bg">
                                                <img class="guarantee" src="`+ baseUrl + item.image + `" />
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <span class="judul-why">`+ count[1] + `</span><br>
                                            <div class="des">`+ item.config_value + `</div>
                                        </div>
                                    </div>`;
                    }
                }
            });

            $("#tentang-kami-single").html(configListlanding);
            $("#tentang-kami").html(configList);
            $("#socialData").html(socList);
            $("#marketData").html(marketList);
            $("#contactData").html(contactList);
            $("#whyTitle").text(whyTitle);
            $("#whyList").html(whyList);
            $("#whyImage").html(whyImage);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
    // get api Layanan
    fetch(apiURL + '/api/service/where', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            lang: lang,
            status: 1,
        })
    })
        .then(response => response.json())
        .then(data => {
            let rental = '';
            let service = '';

            let titleService = '';
            let titleRental = '';
            let landingRental = '';
            $.each(data.data, function (index, item) {
                if (item.group == "rental") {
                    if (item.preface != null || "") {
                        landingRental = `<div class="row" style="margin-top:60px;">
                                            <div class="col-md-4" style="text-align:center;margin-top:70px;">
                                                <img class="rent" width="90%" src="`+ baseUrl + item.image + `" />
                                            </div>
                                            <div class="col-md-8">
                                                <span class="why">`+ item.title_name + `</span>
                                                <div class="des-1">`+ item.preface + `</div><br>
                                                <div class="des-1">`+ item.detail + `
                                                </div>
                                            </div>
                                        </div>`;
                    } else {
                        titleRental = item.title_name;
                        rental += `<div style="cursor:pointer;" class="col-md-3" data-toggle="modal" data-target="#rentalModal" onclick="setModal()">
                                        <div class="carding">
                                            <div class="carding-img">
                                                <img src="`+ baseUrl + item.image + `" alt="...">
                                            </div>
                                            <div class="carding-title" style="text-align:center;">
                                                <h6><b>`+ item.name + `</b></h6>
                                            </div>
                                        </div>
                                    </div>`;
                    }

                } else {
                    titleService = item.title_name;
                    service += `<div class="col-md-3 cards" data-toggle="modal" data-target="#serviceModal" onclick="setModal()" style="cursor:pointer;">
                                    <div class="carding">
                                        <div class="carding-img-ico">
                                            <img style="width:100px;" src="`+ baseUrl + item.image + `" alt="...">
                                            <div class="carding-title" style="text-align:center;">
                                                <h6><b>`+ item.name + `</b></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                }
            });

            $("#landingService").html(`<div style="text-align:center;margin-top:60px;"><span class="why">` + titleService + `</span></div><div class="row" style="margin-top:30px;">` + service + `</div>`);
            $("#layananAllDataService").html(`<div class="about">` + titleService + `</div><div class="row" style="margin-top:30px;" id="serviceAllData">` + service + `</div>`);

            $("#landingRental").html(landingRental);
            $("#landingRentalList").html(`<div class="row" style="margin-top:60px;">` + rental + `</div>`);
            $("#layananAllDataRental").html(`<div class="about">` + titleRental + `</div><div class="row" style="margin-top:60px;">` + rental + `</div>`);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });


    // get api blog
    fetch(apiURL + '/api/blog/where?page=1&row_count=4', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            lang: lang,
            status: 1,
        })
    })
        .then(response => response.json())
        .then(data => {
            let blogList = '';
            let blogTitle = '';
            let langUri = '';
            let blogUri = '';
            $.each(data.data, function (index, item) {
                if (lang == null) {
                    langUri = '';

                } else {
                    langUri = lang + '/';
                }
                
                
                if (lang == 'id') {
                    blogUri = baseUrl + langUri + 'blog/' + item.id;
                } else if (lang == 'cn') {
                    blogUri = baseUrl + langUri + '博客/' + item.id;
                } else if (lang == 'jp') {
                    blogUri = baseUrl + langUri + 'ブログ/' + item.id;
                } else {
                    blogUri = baseUrl + langUri + 'blog/' + item.id;
                }
                blogList += `
                    <div class="col-md-3 cards">
                        <a href="`+ blogUri + `" class="sampleClick">
                            <div class="card">
                                <img src="`+ baseUrl + item.image + `" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">`+ item.title + `</h5>
                                    <p class="card-text">`+ item.preface + `</p>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
            });

            $("#blogList").html(blogList);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });

    // get api product all page
    fetch(apiURL + '/api/category/where', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            lang: lang,
        })
    })
    .then(response => response.json())
    .then(data => {
        let allItemList = '';
            // console.log("category ",data)
            $.each(data.data,function(index, item){
                let categoryList = `<div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="judul-produk">`+item.name+`</div>
                                            </div>
                                            <div class="col-md-2" style="text-align:right;margin-top:10px;">
                                                <select class="form-control form-control-sm">
                                                    <option>Forklift Toyota</option>
                                                    <option>Forklift Niciyu</option>
                                                </select>
                                            </div>
                                        </div>`;
                // get api product all page
                fetch(apiURL + '/api/product/where', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        lang: lang,
                        id_category: item.id,
                    })
                })
                .then(response => response.json())
                .then(data => {
                        
                    categoryList += `<div><div class="row">`;
                        $.each(data.data,function(index,item){
                            console.log("item ",item);
                            categoryList += `<div style="cursor:pointer;" class="col-md-3" data-toggle="modal" data-target="#produkModal" onclick="setModal()">
                                                <div class="carding">
                                                    <div class="carding-img">
                                                        <img src="<?= base_url() ?>img/JGBHGYHG-4.png" alt="...">
                                                    </div>
                                                    <div class="carding-title" style="text-align:center;">
                                                        <h6><b>FORKLIFT TOYOTA 2,5 TON</b></h6>
                                                    </div>
                                                </div>
                                            </div>`;
                        });
                })
                .catch(error => {
                        console.error('Error:', error.message);
                });

                categoryList += `</div><div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <nav aria-label=" Page navigation example">
                                                <ul class="pagination pagination-sm justify-content-end">
                                                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>`;
                allItemList += categoryList;
            })

            // $("#categoryList").html(allItemList);
    })
    .catch(error => {
            console.error('Error:', error.message);
    });




    // admin
    $('#DataSubmenu').on('show.bs.collapse', function () {
        $(this).prev('a').find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    });
    $('#DataSubmenu').on('hide.bs.collapse', function () {
        $(this).prev('a').find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    });

});