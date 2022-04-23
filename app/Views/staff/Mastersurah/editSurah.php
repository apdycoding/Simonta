<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/staff/Mastersurah" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update data hafalan</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/HafalanSurah/new">
                            <h4> Update data surah</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/staff/Mastersurah/<?= $edit['surah_id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                            <?= csrf_field() ?>

                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama anak<code>*</code></label>

                                    <select name="santri_id" class="form-control select2 <?= $validation->hasError('santri_id') ? 'is-invalid' : '' ?>" id="">
                                        <?php foreach ($names as $ns) : ?>
                                            <option value="<?= $ns['santri_id']; ?>" <?= $edit['santri_id'] == $ns['santri_id'] ? 'selected' : '' ?>> <?= $ns['name_santri']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('santri_id'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Name surah<code>*</code></label>
                                    <input type="text" name="nama_surah" value="<?= old('nama_surah', $edit['nama_surah']) ?>" placeholder="Input nama surah " class="form-control <?= $validation->hasError('nama_surah') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_surah'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Surah ke<code>*</code></label>
                                    <input type="number" name="surah_ke" value="<?= old('surah_ke', $edit['surah_ke']) ?>" class="form-control <?= $validation->hasError('surah_ke') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('surah_ke'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal Ujian<code>*</code></label>
                                    <input type="date" name="tgl_ujian" value="<?= old('tgl_ujian', $edit['tgl_ujian']) ?>" class="form-control <?= $validation->hasError('tgl_ujian') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_ujian') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Predikat<code>*</code></label>
                                    <input type="text" name="predikat" value="<?= old('predikat', $edit['predikat']) ?>" class="form-control <?= $validation->hasError('predikat') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('predikat') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Penguji<code>*</code></label>

                                    <select name="penguji_id" class="form-control <?= $validation->hasError('penguji') ? 'is-invalid' : '' ?>" id="">
                                        <?php
                                        foreach ($penguji as $key => $value) : ?>

                                            <option value="<?= $value['penguji_id']; ?>" <?= $edit['penguji_id'] == $value['penguji_id'] ? 'selected' : '' ?>>- <?= $value['nama_penguji']; ?> -</option>

                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('penguji_id'); ?>
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