<?= $this->extend('layouts/main-menu') ?>

<?= $this->section('content') ?>
<div class="isi-konten">
    <div class="about" id="blogTitle"></div>
    <div class="row" style="margin-top:30px;" id="blogList">
    </div>

    <div style="margin-top: 5px;" class="row">
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
</div>
<?= $this->endSection() ?>