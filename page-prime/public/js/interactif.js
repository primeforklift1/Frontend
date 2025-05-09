
$(document).ready(function(){

    console.log(baseUrl);

    var lang = sessionStorage.getItem("language");
    console.log("Bahasa Saat ini : ",lang);

    if(lang == null){
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
    if(lang == 'cn'){
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
    }else if(lang == 'jp'){
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
    }else if(lang == 'gn'){
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

    // get api menu
    fetch(apiURL+'/api/menu', {
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
        let menuList = '';
        let menuListWhite = '';
        $.each(data.data, function(index, item) {
            if(item.menu_type == 0){
                menuList += `<li class="nav-item mx-3">
                                <a class="nav-link text-white" href="`+baseUrl+lang+'/'+item.link+`">`+item.menu_name+` <span class="sr-only"></span></a>
                             </li>`;
                menuListWhite += `<li class="nav-item mx-3">
                                    <a class="nav-link" href="`+baseUrl+lang+'/'+item.link+`" style="color:#0072ff !important;">`+item.menu_name+`<span class="sr-only"></span></a>
                                  </li>`;
            }else if(item.menu_type == 1){
                let tmpmenuList =`<li class="nav-item mx-3 dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href=" #" role="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        `+item.menu_name+`
                                    </a>
                                    <div class="dropdown-menu">`;
                let tmpmenuListWhite=`<li class="nav-item mx-3 dropdown">
                                    <a class="nav-link dropdown-toggle" href=" #" style="color:#0072ff !important;" role="button"
                                        data-toggle="dropdown" aria-expanded="false">
                                        `+item.menu_name+`
                                    </a>
                                    <div class="dropdown-menu">`;

                $.each(item.child,function(index,list){
                    tmpmenuList += `<a class="dropdown-item" href="`+baseUrl+lang+'/'+list.link+`">`+list.menu_name+`</a>`;
                    tmpmenuListWhite += `<a class="dropdown-item" href="`+baseUrl+lang+'/'+list.link+`">`+list.menu_name+`</a>`;
                });


                tmpmenuList += `</div></li>`;
                tmpmenuListWhite+= `</div></li>`;

                menuList +=tmpmenuList;
                menuListWhite +=tmpmenuListWhite;

            }else{
                menuList +=`<li class="nav-item mx-3">
                    <button type="button" class="btn btn-primary rounded-pill">`+item.menu_name+`</button>
                </li>`;
                menuListWhite +=`<li class="nav-item mx-3">
                    <button type="button" class="btn btn-primary rounded-pill">`+item.menu_name+`</button>
                </li>`;
            }
        });

        menuList += `<li class="nav-item mx-3 dropdown">
                        <a id="langName" class="nav-link dropdown-toggle text-white" href=" #" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            `+labelBahasa+`
                        </a>
                        <div id="optionLang" class="dropdown-menu" style="background-color: rgba(255, 255, 255, 0);border:none;"></div>
                    </li>`;
        menuListWhite += `<li class="nav-item mx-3 dropdown">
                    <a  id="langName" class="nav-link dropdown-toggle" href=" #" style="color:#0072ff !important;" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        `+labelBahasa+`
                    </a>
                    <div id="optionLang" class="dropdown-menu" style="background-color: rgba(255, 255, 255, 0); border:none;"></div>
                </li>`;
        
        $("#menuList").html(menuList);
        $("#menuListWhite").html(menuListWhite);
        // get api language
        fetch(apiURL+'/api/language')
        .then(response => response.json())
        .then(data => {
            let languageList = '';
            $.each(data.data, function(index, item) {
                //     languageList += `<a onclick="setlanguages('id')" class="dropdown-item" href="<?= base_url()?>id/"><img src="<?= base_url()?>img/id.png" alt=""></a>`;
                languageList += `<a onclick="setlanguages('`+item.sort_name+`')" class="dropdown-item" href="`+baseUrl+item.sort_name+`/"><img src="`+baseUrl+item.flag_image+`" alt=""></a>`;
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
    fetch(apiURL+'/api/slider/where', {
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
        let sliderList = '';
            $.each(data.data, function(index, item) {
                console.log(index);
                let act = '';
                if(index == 0){
                    act = 'active';
                }
                sliderList += `
                    <div class="carousel-item position-relative `+act+`">
                        <img class="d-block h-100"
                            src="`+baseUrl+item.image+`"
                            style="align-items: center;" />
                        <div class="dark-overlay position-absolute w-100 h-100"></div>
                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                            <p class="selamat-datang-di text-white">
                            `+item.title+`
                            </p>
                            <p class="solusi-terbaik-untuk text-white">
                            `+item.text+`</p>
                        </div>
                    </div>
                `;
            });
            
            $("#sliderData").html(sliderList);
    })
    .catch(error => {
        console.error('Error:', error.message);
    });

    // get api About
    fetch(apiURL+'/api/config/where', {
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
            $.each(data.data, function(index, item) {
                console.log(index);
                if(item.config_type == "about"){
                    if(item.image != ""){
                        configListlanding += `<div class="about">`+item.config_name+`</div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        `+item.config_value+`
                                                    </div>
                                                    <div class="col-md-6" style="text-align: center;">
                                                        <img width="60%" src="`+baseUrl+item.image+`" />
                                                    </div>
                                                </div>`;
                        configList += `<div class="about">`+item.config_name+`</div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        `+item.config_value+`
                                                    </div>
                                                    <div class="col-md-6" style="text-align: center;">
                                                        <img width="60%" src="`+baseUrl+item.image+`" />
                                                    </div>
                                                </div>`;
                    }else{
                        configList += `<div class="about">`+item.config_name+`</div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        `+item.config_value+`
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="box">
                                                            <div class="rectangle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
                    }
                }else if(item.config_type == "soc"){
                    socList += `<img style="margin-right:2px;" src="`+baseUrl+item.image+`" alt="">`;
                    
                }else if(item.config_type == "market"){
                    marketList += `<img class="image-7" width="60" src="`+baseUrl+item.image+`" />`;

                }else{
                    contactList += `<div style="margin-top:10px;" class="text-wrapper-33"><img src="`+baseUrl+item.image+`" alt="" width="15">`+item.config_value+`</div>`;
                }
            });
            
            $("#tentang-kami-single").html(configListlanding);
            $("#tentang-kami").html(configList);
            $("#socialData").html(socList);
            $("#marketData").html(marketList);
            $("#contactData").html(contactList);
    })
    .catch(error => {
        console.error('Error:', error.message);
    });

});