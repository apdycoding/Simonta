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
        <h1>Create data hafalan</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/hadits/new">
                            <h4> Input data Hadits</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-info alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismis="alert">
                                    x
                                </button>
                                <code><b>form inputan</b></code>
                                Silahkan inputkan data <code> hafalan hadits Santri</code> yang sudah lulus ujian</code>
                            </div>
                        </div>

                        <form action="/hadits/create" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama anak<code>*</code></label>
                                    <select name="santri_id" class="form-control select2 <?= ($validation->hasError('santri_id') ? 'is-invalid' : '') ?>" id="">
                                        <option value=""> - Cari nama anak -</option>
                                        <?php foreach ($names as $ns) : ?>
                                            <option value="<?= $ns['santri_id']; ?>"> <?= $ns['name_santri']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('santri_id'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal lulus<code>*</code></label>
                                    <input type="date" name="tglLulus" value="<?= old('tglLulus') ?>" class="form-control <?= $validation->hasError('tglLulus') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tglLulus'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Predikat<code>*</code></label>
                                    <input type="text" name="predikat" value="<?= old('predikat') ?>" class="form-control <?= $validation->hasError('predikat') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('predikat'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="reset" class="btn btn-secondary"> <i class="fa fa-eraser"></i> Reset</button>

                                <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-paper-plane"></i> Save</button>
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