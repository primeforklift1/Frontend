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
            <div class="col-sm-3">
                <img class="image-9" width="100%" src="<?= base_url() ?>img/image-9.png" />
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
                    <h4><b><span id="imgName">FORKLIFT TOYOTA 2,5 TON</span></b></h4>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="text-align: center;">
                <img id="imgModal" width="60%;" src="<?= base_url() ?>img/JGBHGYHG-4.png" alt="...">
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <td>Model</td>
                        <td id="modelData">-</td>
                    </tr>
                    <tr>
                        <td>Kapasitas</td>
                        <td id="kapasitasData">-</td>
                    </tr>
                    <tr>
                        <td>Lifting Height</td>
                        <td id="liftData">-</td>
                    </tr>
                    <tr>
                        <td>Daya Batterai</td>
                        <td id="batteraiData">-</td>
                    </tr>
                    <tr>
                        <td>Durasi Operasi</td>
                        <td id="operationData">-</td>
                    </tr>
                    <tr>
                        <td>Ukuran Fork</td>
                        <td id="forkData">-</td>
                    </tr>
                    <tr>
                        <td>Lama Rental</td>
                        <td id="rentData">-</td>
                    </tr>
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
                    <h4><b><span id="imgName">Service Periodik</span></b></h4>
                </div>
                <p id="descData">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi aliquam neque temporibus alias et inventore fuga repellendus ut quae a. Odit molestias earum esse dolores quas ab ullam, reprehenderit magni.</p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal modal -->
<a href="" target="_blank" id="whatsapp-fab">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Chat via WhatsApp" />
</a>


<style>
  #whatsapp-fab {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 64px;
    height: 64px;
    z-index: 9999;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    background-color: #25D366;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: transform 0.2s ease;
  }

  #whatsapp-fab:hover {
    transform: scale(1.1);
  }

  #whatsapp-fab img {
    width: 60%;
    height: 60%;
    object-fit: contain;
  }

  .popup {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center; /* ⬅️ ini bikin popup ke tengah */
  background: rgba(0, 0, 0, 0.5); /* buat modal gelap */
}

.popup.show {
  display: flex;
}

.popup-content {
  position: relative;
  background: white;
  padding: 0;
  border-radius: 8px;
  box-shadow: 0 -2px 10px rgba(0,0,0,0.2);
  max-width: 100%;
  width: 500px;
  text-align:center;
}

.popup-content img {
  width: 100%;
  border-radius: 8px;
}

.close-btn {
  position: absolute;
  top: 5px;
  right: 10px;
  font-size: 24px;
  color: #333;
  cursor: pointer;
  z-index: 10;
}
</style>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

<script src="<?= base_url()?>js/interactif.js"></script>