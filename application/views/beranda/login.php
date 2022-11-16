<div class="text-center">
    <?= $this->session->flashdata('pesan'); ?>
</div>
<form class="container mt-5" method="post" action="<?= base_url('beranda/login'); ?>">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Contoh : minakjinggo@okemail.com" autocomplete="off" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="pass">Kata Sandi</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukan Kata Sandi Anda" autocomplete="off">
                <?= form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary float-right">Masuk</button>
        </div>
    </div>
</form>