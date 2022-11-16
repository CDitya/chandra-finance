<div class="text-center">
    <?= $this->session->flashdata('pesan'); ?>
</div>
<div class="jumbotron jumbotron-fluid text-center text-dark">
    <div class="container">
        <h1 class="mb-3">Selamat Datang!</h1>
            <div class="form-group">
                <label for="keyword" class="mb-3">Silahkan Cari Berdasarkan NIK (Nomor Induk Kependudukan)</label>
                <div class="row justify-content-center">
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control" id="keywordCariLayak" placeholder="Contoh : 1234567890" name="keyword" autocomplete="off" value="<?= set_value('keyword'); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="btnCariLayak" type="button">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row justify-content-center" id="hasilLayak"></div>
    </div>
</div>