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

<style>
.popup {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  z-index: 9999;
  display: none;
  justify-content: center;
  align-items: center;
  background: rgba(0,0,0,0.6);
}
.popup.show {
  display: flex;
}

.popup-content {
  max-width: 90vw;
  position: relative;
  background: white;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 -2px 10px rgba(0,0,0,0.2);
  overflow: hidden;
}

.promo-carousel-container {
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.promo-carousel {
  display: flex;
  transition: transform 0.5s ease;
  z-index: 1;
}

.promo-item {
  flex: 0 0 100%;
  text-align: center;
}

.promo-item img {
  width: 80vw;
  height: auto;
  object-fit: contain;
  border-radius: 8px;
  background: #f0f0f0;
}

@media (min-width: 500px) {
  .promo-item img {
    max-height: 90vh;
    width: auto;
  }
}
@media (max-width: 500px){
  .close-btn {
    background-color: red;
    width: 30px;
    height: 30px;
    text-align: center;
    position: absolute;
    right: 0px;
    font-size: 18px;
    color: #fff;
    cursor: pointer;
    z-index: 10;
  }
}

.promo-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 12px;
  color: #555;
  cursor: pointer;
  background: rgba(255,255,255,0.7);
  border-radius: 50%;
  padding: 5px 5px;
  z-index: 5;
  text-align: center;
}

.promo-nav.left {
  left: 5px;
  height: 30px;
  width: 30px;
}
.promo-nav.right {
  right: 5px;
  height: 30px;
  width: 30px;
}

.close-btn {
  background-color: red;
  width: 30px;
  height: 30px;
  text-align: center;
  position: absolute;
  right: 10px;
  font-size: 18px;
  color: #fff;
  cursor: pointer;
  z-index: 10;
}
</style>

<!-- Popup promo -->
<div id="promoPopup" class="popup">
  <div class="popup-content">
    <span class="close-btn" onclick="closePopup()">×</span>
    <div>
      <div class="promo-nav left" onclick="slidePromo(-1)">‹</div>
      <div class="promo-carousel" id="carouselPromo"></div>
      <div class="promo-nav right" onclick="slidePromo(1)">›</div>
    </div>
  </div>
</div>

<script>
let currentSlide = 0;
let totalSlides = 0;

document.addEventListener('DOMContentLoaded', () => {
  const lang = sessionStorage.getItem("language") || 'id';
  fetch(apiURL + '/api/promosi/where?page=1&row_count=10', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      lang: lang,
      status: 1,
    })
  })
  .then(response => response.json())
  .then(data => {
    const promos = data.data || [];
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const activePromos = promos.filter(promo => {
      const start = new Date(promo.start_date);
      const end = new Date(promo.end_date);
      start.setHours(0, 0, 0, 0);
      end.setHours(0, 0, 0, 0);
      return today >= start && today <= end;
    });

    if (activePromos.length > 0) {
      const container = document.getElementById('carouselPromo');
      container.innerHTML = '';
      totalSlides = activePromos.length;

      activePromos.forEach(promo => {
        const item = document.createElement('div');
        item.className = 'promo-item';
        item.innerHTML = `
          <img src="https://test-prime.paylite.co.id/uploads/8bfe9741d78ddf9b18d938fd730d1a3dd74fe725.png" alt="${promo.title}" />
        `;
        container.appendChild(item);
      });

      document.getElementById('promoPopup').classList.add('show');
      updateSlide();
    }else{
      closePopup()
    }
  })
  .catch(err => {
    console.error('Promo fetch error:', err.message);
  });
});

function slidePromo(direction) {
  currentSlide += direction;
  if (currentSlide < 0) currentSlide = totalSlides - 1;
  if (currentSlide >= totalSlides) currentSlide = 0;
  updateSlide();
}

function updateSlide() {
  const container = document.querySelector('.promo-carousel');
  const offset = -currentSlide * 100;
  container.style.transform = `translateX(${offset}%)`;
}

function closePopup() {
  console.log("hiden");
  const popup = document.getElementById('promoPopup');
  popup.classList.remove('show');
  popup.style.display = 'none'; 
}

setInterval(() => {
  if (totalSlides > 1) slidePromo(1);
}, 5000);
</script>


<?= $this->endSection() ?>