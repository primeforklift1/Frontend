
$(document).ready(function(){

    console.log(baseUrl);

    console.log("iam ready");
    var lang = sessionStorage.getItem("language");
    console.log("Bahasa Saat ini : ",lang);

    if(lang == null){
        lang = 'id'
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
        console.log('GET response:', data.data);
        let menuList = '';
        let menuListWhite = '';
        $.each(data.data, function(index, item) {
            if(item.menu_type == 0){
                menuList += `<li class="nav-item mx-3">
                                <a class="nav-link text-white" href="`+baseUrl+item.link+`">`+item.menu_name+` <span class="sr-only"></span></a>
                             </li>`;
                menuListWhite += `<li class="nav-item mx-3">
                                    <a class="nav-link" href="`+baseUrl+item.link+`" style="color:#0072ff !important;">`+item.menu_name+`<span class="sr-only"></span></a>
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
                    tmpmenuList += `<a class="dropdown-item" href="`+baseUrl+list.link+`">`+list.menu_name+`</a>`;
                    tmpmenuListWhite += `<a class="dropdown-item" href="`+baseUrl+list.link+`">`+list.menu_name+`</a>`;
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
                            Bahasa
                        </a>
                        <div id="optionLang" class="dropdown-menu" style="background-color: rgba(255, 255, 255, 0);border:none;"></div>
                    </li>`;
        menuListWhite += `<li class="nav-item mx-3 dropdown">
                    <a  id="langName" class="nav-link dropdown-toggle" href=" #" style="color:#0072ff !important;" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Bahasa
                    </a>
                    <div id="optionLang" class="dropdown-menu" style="background-color: rgba(255, 255, 255, 0); border:none;"></div>
                </li>`;
        
        $("#menuList").html(menuList);
        $("#menuListWhite").html(menuListWhite);
        // get api language
        fetch(apiURL+'/api/language')
        .then(response => response.json())
        .then(data => {
            console.log('GET response:', data.data);
            let languageList = '';
            $.each(data.data, function(index, item) {
                //     languageList += `<a onclick="setlanguages('id')" class="dropdown-item" href="<?= base_url()?>id/"><img src="<?= base_url()?>img/id.png" alt=""></a>`;
                languageList += `<a onclick="setlanguages('`+item.sort_name+`')" class="dropdown-item" href="`+baseUrl+item.sort_name+`/"><img src="`+baseUrl+item.flag_image+`" alt=""></a>`;
            });
            console.log(languageList);
            
            $("#optionLang").html(languageList);
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
    })
    .catch(error => {
        console.error('Error:', error.message);
    });


});