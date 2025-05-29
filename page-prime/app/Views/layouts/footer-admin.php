<!-- modal Add Data -->
<div class="modal fade" id="addData" tabindex="-1" aria-labelledby="addData" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius: 1rem;" >
    <div class="modal-header" style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;background-color: #D9D9D9; border-bottom: none;padding:0px;padding-right:20px !important; padding-top:20px !important">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="background-color: white;">
            <div class="col-md-12 cards" style="padding: 30px;">
                <div class="carding-title">
                    <h4><b><span id="titleData"></span></b></h4>
                </div>
                <form action="" id="formData">
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal modal -->
</body>
<script>
    // $(document).rady(function(){
    //     alert("ok");
    // });
    // const token = localStorage.getItem("authToken");
    // console.log(token);
    // if (!token) {
    //     alert("Session habis. Silakan login ulang.");
    //     window.location.href = "/login"; // ganti dengan halaman login kamu
    //     return;
    // }

    // // Optional: validasi token ke server
    // fetch(apiURL + "/auth/check", {
    //     method: "GET",
    //     headers: {
    //         "Authorization": "Bearer " + token
    //     }
    // })
    // .then(res => {
    //     if (res.status === 401) {
    //         throw new Error("Unauthorized");
    //     }
    //     return res.json();
    // })
    // .then(data => {
    //     console.log("Token valid:", data);
    //     // lanjut ke halaman
    // })
    // .catch(err => {
    //     console.warn("Token tidak valid:", err.message);
    //     alert("Session tidak valid. Silakan login ulang.");
    //     localStorage.removeItem("authToken");
    //     window.location.href = "/login";
    // });
</script>
</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
<script src="<?= base_url()?>js/auth.js"></script>