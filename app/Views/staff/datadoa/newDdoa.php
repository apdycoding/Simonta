<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Mater page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/staff/Datadoa" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create hafalan</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/staff/Datadoa/new">
                            <h4> Input data Hadits</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/staff/Datadoa" method="post" autocomplete="off" enctype="multipart/form-data">

                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label>Nama doa<code>*</code></label>
                                <input type="text" name="nama_doa" autofocus value="<?= old('nama_doa') ?>" placeholder="Input nama_doa " class="form-control <?= ($validation->hasError('nama_doa') ? 'is-invalid' : '') ?>">

                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_doa') ?>
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