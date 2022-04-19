<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php
// dd($santri);
?>

<style>
    /* img {
        border-radius: 50%;
    } */
</style>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/penguji" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create data hafalan</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/HafalanSurah/new">
                            <h4> Input data Guru</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/penguji/create" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name Penguji<code>*</code></label>
                                    <input type="text" name="nama_penguji" value="<?= old('nama_penguji') ?>" placeholder="nama penguji " class="form-control <?= $validation->hasError('nama_penguji') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_penguji'); ?>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Name surah<code>*</code></label>

                                    <select name="jk" class="form-control <?= $validation->hasError('jk') ? 'is-invalid' : '' ?>" id="">
                                        <option value=""> - Pilih -</option>
                                        <option value="L"> - Laki-laki -</option>
                                        <option value="P"> - Perempuan -</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jk'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-paper-plane"></i> Save</button>
                                <button type="reset" class="btn btn-secondary"> <i class="fa fa-eraser"></i> Reset</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
</section>

<?= $this->endSection() ?>