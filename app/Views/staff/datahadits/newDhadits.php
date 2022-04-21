<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Surah Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/staff/Datahadits" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create hafalan</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/staff/Datahadits/new">
                            <h4> Input data Hadits</h4>
                        </a>
                    </div>
                    <div class="card-body">


                        <form action="/staff/Datahadits" method="post" autocomplete="off" enctype="multipart/form-data">

                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label>Nama hadits<code>*</code></label>
                                <input type="text" name="nama_hadits" autofocus value="<?= old('nama_hadits') ?>" placeholder="Input nama_hadits " class="form-control <?= ($validation->hasError('nama_hadits') ? 'is-invalid' : '') ?>">

                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_hadits') ?>
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