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
            <a href="/HafalanSurah" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update data hafalan</h1>
    </div>

    <?php if (session()->getFlashdata('succes')) : ?>

        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Success !</b>
                <?= session()->getFlashdata('succes') ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>

        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Trash !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (session()->getFlashdata('warning')) : ?>

        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Trash !</b>
                <?= session()->getFlashdata('warning') ?>
            </div>
        </div>

    <?php endif; ?>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/HafalanSurah/new">
                            <h4> Update data Guru</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/HafalanSurah/update/<?= $edit['surah_id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama anak<code>*</code></label>
                                    <select name="santri_id" class="form-control select2" id="">
                                        <?php foreach ($names as $ns) : ?>
                                            <option value="<?= $ns['santri_id']; ?>" <?= $edit['santri_id'] == $ns['santri_id'] ? 'selected' : '' ?>> <?= $ns['name_santri']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Name surah<code>*</code></label>
                                    <input type="text" name="nama_surah" value="<?= old('nama_surah', $edit['nama_surah']) ?>" placeholder="Input nama surah " class="form-control">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Surah ke<code>*</code></label>
                                    <input type="number" name="surah_ke" value="<?= old('surah_ke', $edit['surah_ke']) ?>" class="form-control">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal Ujian<code>*</code></label>
                                    <input type="date" name="tgl_ujian" value="<?= old('tgl_ujian', $edit['tgl_ujian']) ?>" class="form-control">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <a href="/HafalanSurah/edit/<?= $edit['surah_id'] ?>" class="btn btn-info"><i class="fa fa-spinner"></i> Reload</a>
                                <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-paper-plane"></i> Update</button>
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