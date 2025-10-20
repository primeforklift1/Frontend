<div class="footer-data">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="text-wrapper-30" id="social">Sosial media</div>
                <div id="socialData">
                </div>

                <div class="text-wrapper-29" id="market">Marketplace</div>
                <div style="margin-left:-15px;" id="marketData">
                    <!-- <img class="image-7" width="60" src="<?= base_url() ?>img/image-23.png" />
                    <img class="image-8" style="margin-left:-10px;" width="40" src="<?= base_url() ?>img/image-24.png" />
                    <img class="image-8" width="40" src="<?= base_url() ?>img/image-25.png" /> -->
                </div>
            </div>
            <div class="col-sm-3" id="footer-pages">
                
            </div>
            <div class="col-sm-3">
                <div class="text-wrapper-30" id="contact">Contact</div>
                <div class="group-13" id="contactData">
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
              <div style="width: 100%;height: 200px;border-radius: 8px;overflow: hidden;" id="maps"></div>
            </div>

        </div>
    </div>
</div>


<!-- modal modal -->
 <!-- modal produk -->
 <div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius: 1rem;">
    <div class="modal-header" style="border-bottom: none;padding:0px;padding-right:20px !important; padding-top:20px !important;"">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="carding-title" style="text-align:center;">
                    <h4><b><span id="imgName"></span></b></h4>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="text-align: center;">
                <img id="imgModal" width="60%;" src="" alt="...">
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tbody id="dataTable"></tbody>
                </table>
                <!-- <span id="detail"></span> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align: center;"> <a id="linkVisit" href="">View More</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- modal sparepart -->
 <div class="modal fade" id="sparepartModal" tabindex="-1" aria-labelledby="sparepartModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius: 1rem;">
    <div class="modal-header" style="border-bottom: none;padding:0px;padding-right:20px !important; padding-top:20px !important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="carding-title" style="text-align:center;">
                    <h4><b><span id="imgName"></span></b></h4>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="text-align: center;">
                <img id="imgModal" width="60%;" src="" alt="...">
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <td>Nama Produk</td>
                        <td id="nameData">-</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td id="descData">-</td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal layanan rental -->
<div class="modal fade" id="rentalModal" tabindex="-1" aria-labelledby="rentalModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius: 1rem;">
    <div class="modal-header" style="border-bottom: none;padding:0px;padding-right:20px !important; padding-top:20px !important;"">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="carding-title" style="text-align:center;">
                    <h4><b><span id="imgNameRental"></span></b></h4>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="text-align: center;">
                <img id="imgModalRental" width="60%;" alt="...">
            </div>
            <div class="col-md-6">
                <table class="table" id="dataTableRental">
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal layanan service -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius: 1rem;" >
    <div class="modal-header" style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;;background-color: #D9D9D9; border-bottom: none;padding:0px;padding-right:20px !important; padding-top:20px !important;height:120px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="background-color: white;">
            <div class="col-md-12 cards" style="padding: 30px;">
                <div class="carding-title">
                    <h4><b><span id="imgNameService"></span></b></h4>
                </div>
                <p id="descDataService"></p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal modal -->
<div id="wa-fab-container">
        <a href="#" id="whatsapp-fab">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Chat via WhatsApp" />
        </a>
        <div id="wa-options"></div>
    </div>



<style>
  #wa-fab-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    display: flex;
    flex-direction: column-reverse; /* FAB di bawah */
    align-items: flex-end;
    gap: 10px;
  }

  #whatsapp-fab {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background-color: #25D366;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    transition: transform 0.2s;
    text-decoration: none;
  }

  #whatsapp-fab:hover {
    transform: scale(1.1);
  }

  #whatsapp-fab img {
    width: 60%;
    height: 60%;
    object-fit: contain;
  }

  #wa-options {
    display: none;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
  }

  .wa-option {
    display: flex;
    align-items: center;
    justify-content: space-between; /* Nama di kiri, icon di kanan */
    background: #25D366;
    color: white;
    border-radius: 50px;
    padding: 8px 15px;
    text-decoration: none;
    font-weight: bold;
    min-width: 180px;
    max-width: 220px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    white-space: nowrap;
    transition: transform 0.2s, background-color 0.2s;
  }

  .wa-option:hover {
    background: #128C7E;
    transform: translateX(-5px);
    text-decoration: none;
    color: white;
  }

  .wa-option span {
    flex: 1;
    text-align: left;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-right: 10px;
    font-size: 14px;
  }

  .wa-option img {
    width: 24px;
    height: 24px;
    flex-shrink: 0;
  }

  /* Desktop hover */
  @media (hover: hover) and (pointer: fine) {
    #wa-fab-container:hover #wa-options {
      display: flex;
    }
    #wa-fab-container:hover #whatsapp-fab {
      display: none;
    }
  }

  /* Mobile adjustments */
  @media (max-width: 768px) {
    .wa-option {
      min-width: 160px;
      max-width: 200px;
      padding: 6px 12px;
    }
            
    .wa-option span {
      font-size: 13px;
    }
  }

  /* Untuk nama yang sangat panjang */
  .wa-option.long-name {
    min-width: 200px;
    max-width: 250px;
  }

  .wa-option.long-name span {
    font-size: 12px;
  }
</style>
</body>

</html>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
crossorigin="anonymous"></script>

<script>
  const container = document.getElementById("wa-fab-container");
  const fab = document.getElementById("whatsapp-fab");
  const optionsDiv = document.getElementById("wa-options");
  function initWhatsAppFAB(csList) {
    optionsDiv.innerHTML = '';
    csList.forEach(cs => {
      const a = document.createElement("a");
      a.href = "https://wa.me/" + cs.phone;
      a.target = "_blank";
      a.title = cs.name;
      a.className = "wa-option";
      if (cs.name.length > 15) {
        a.classList.add("long-name");
      }
      a.innerHTML = `
      <span>${cs.name}</span>
      <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WA Icon">
      `;
      
      optionsDiv.appendChild(a);
    });
  }
  
  
  fab.addEventListener("click", function (e) {
    if (window.matchMedia("(hover: none)").matches) {
      e.preventDefault(); // biar gak langsung ke WA
      
      const isShown = optionsDiv.style.display === "flex";
      
      if (isShown) {
        optionsDiv.style.display = "none";
        fab.style.display = "flex";   // tampilkan kembali FAB
      } else {
        optionsDiv.style.display = "flex";
        fab.style.display = "none";   // sembunyikan FAB
      }
    }
  });
  document.addEventListener("click", function(e) {
    if (window.matchMedia("(hover: none)").matches) {
      if (!container.contains(e.target)) {
        optionsDiv.style.display = "none";
        fab.style.display = "flex";
      }
    }
  });
  
  window.initWhatsAppFAB = initWhatsAppFAB;

 (function() {
  const lat = -6.367664016598244;
  const lng = 107.37018414019217;

  // Inisialisasi map ke #maps
  const map = L.map('maps', {
    center: [lat, lng],
    zoom: 15,
    dragging: false,
    touchZoom: false,
    scrollWheelZoom: false,
    doubleClickZoom: false,
    boxZoom: false,
    zoomControl: false,
    attributionControl: true
  });

  // Tile layer OSM
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  // Marker
  const marker = L.marker([lat, lng]).addTo(map);
  marker.bindPopup(`<b>PT. PRIME FORKLIFT SERVICE</b><br><a style="color:white;" class="btn btn-primary" target="_blank" href="https://www.google.com/maps/dir/?api=1&destination=-6.367664016598244,107.37018414019217
"><i class="fa-solid fa-location-arrow"></i> Navigasi</a>`);
})();
</script>
<script src="<?= base_url()?>public/js/interactif.js"></script>
