
$(document).ready(function(){

    console.log(baseUrl);

    console.log("iam ready");
    var lang = sessionStorage.getItem("language");
    console.log("Bahasa Saat ini : ",lang);

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

});