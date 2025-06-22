<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" id="sliderData">
    </div>

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Sebelumnya</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Selanjutnya</span>
    </a>
</div>
<div class="isi-konten">
    <div id="tentang-kami-single">
    </div>
    <div style="margin-top:60px;">
        <div class="rectangle-7">
            <div class="row justify-content-center" id="merkList">
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:60px;">
        <div class="col-md-6" style="text-align: center;" id="whyImage">
            
        </div>
        <div class="col-md-6">
            <span class="why" id="whyTitle"></span>
            <div id="whyList">
            </div>
        </div>
    </div>

    <div id="landingRental"></div>

    <div id="landingRentalList"></div>

    <div id="landingService">
    </div>

    <div style="text-align:center;margin-top:60px;">
        <span class="why">Blog</span>
    </div>
    <div class="row justify-content-center" style="margin-top:30px;" id="blogList">
        
    </div>

    <div style="text-align:center;margin-top:60px;">
        <span class="why">Client</span>
        <div class="row justify-content-center" id="clientList">
            <!-- <div class="col-md-3">
                <img class="pngwing-com-4" width="100%" src="<?= base_url() ?>img/image-3.png" />
            </div> -->
         </div>
    </div>

</div>

<!-- modal promosi -->

<!-- Popup container -->
<div id="promoPopup" class="popup" style="display: none;">
  <div class="popup-content">
    <span class="close-btn" onclick="closePopup()">×</span>
    <h4 id="promoTitle"></h4>
      <!-- <p>Diskon spesial hanya hari ini!</p> -->
    <img id="promoImage" src="" alt="Promo" />
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    let lang = sessionStorage.getItem("language") || 'id';
        console.log("get promo", lang);
        fetch(apiURL + '/api/promosi/where?&page=1&row_count=1', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                lang: lang,
                status: 1,
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const promos = data.data || [];

            if (promos.length > 0) {
                const promo = promos[0];

                const today = new Date();
                today.setHours(0, 0, 0, 0); // Buat pastiin tanpa jam

                const start = new Date(promo.start_date);
                const end = new Date(promo.end_date);
                start.setHours(0, 0, 0, 0);
                end.setHours(0, 0, 0, 0);

                if (today >= start && today <= end) {
                // console.log('Tampilkan promo:', promo.title);

                // Contoh tampilkan popup
                document.getElementById('promoTitle').textContent = promo.title;
                document.getElementById('promoImage').src = promo.image;
                const popup = document.getElementById('promoPopup');
                popup.style.display = 'flex';
                setTimeout(() => popup.classList.add('show'), 100);
                } else {
                console.log('Promo belum aktif atau sudah lewat.');
                }
            } else {
                console.log('Tidak ada promo.');
            }
        })
        .catch(error => {
            console.error('Error:', error.message);
        });



    });

function closePopup() {
  const popup = document.getElementById('promoPopup');
  popup.classList.remove('show');
  setTimeout(() => {
    popup.style.display = 'none';
  }, 500);
}
</script>
<?= $this->endSection() ?>