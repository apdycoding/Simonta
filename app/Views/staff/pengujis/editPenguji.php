<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/staff/Pengujis" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update data penguji</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <h4> Update data Guru</h4>
                    </div>
                    <div class="card-body">

                        <form action="/staff/Pengujis/<?= $penguji['penguji_id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Penguji<code>*</code></label>
                                    <input type="hidden" name="penguji_id" value="<?= $penguji['penguji_id']; ?>">

                                    <input type="text" name="nama_penguji" value="<?= old('nama_penguji', $penguji['nama_penguji']) ?>" class="form-control <?= $validation->hasError('nama_penguji') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_penguji'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name surah<code>*</code></label>

                                    <select name="jk" class="form-control <?= $validation->hasError('jk') ? 'is-invalid' : '' ?>" id="">

                                        <?php if ($penguji['penguji_id'] != null) {
                                            $gender = $penguji['jk'];
                                        } ?>

                                        <option value="L" <?= $gender == 'L' ? 'selected' : '' ?>> Laki-laki </option>
                                        <option value="P" <?= $gender == 'P' ? 'selected' : '' ?>> Perempuan </option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jk'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer text-right">
                                <a href="/penguji/edit/<?= $penguji['penguji_id'] ?>" class="btn btn-info"><i class="fa fa-spinner"></i> Reload</a>
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