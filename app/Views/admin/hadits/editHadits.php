<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/hadits" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update data hafalan</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/HafalanSurah/new">
                            <h4> Update data hadits</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/hadits/update/<?= $edit['hadits_id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

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
                                    <label>Tanggal Ujian<code>*</code></label>
                                    <input type="date" name="tglLulus" value="<?= old('tglLulus', $edit['tglLulus']) ?>" class="form-control <?= $validation->hasError('tglLulus') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tglLulus') ?>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Predikat<code>*</code></label>
                                    <input type="text" name="predikat" value="<?= old('predikat', $edit['predikat']) ?>" class="form-control <?= $validation->hasError('predikat') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('predikat') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <a href="/hadits/edit/<?= $edit['hadits_id'] ?>" class="btn btn-info"><i class="fa fa-spinner"></i> Reload</a>
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