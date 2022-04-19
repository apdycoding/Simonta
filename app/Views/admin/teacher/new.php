<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Santri Page &mdash; Simon</title>
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
            <a href="/teacher" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create data guru</h1>
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
                        <a href="/teacher/new">
                            <h4> Input data Guru</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/teacher/create" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik Guru<code>*</code></label>
                                    <input type="number" name="nik_teacher" placeholder="Input Nik guru" value="<?= old('nik_teacher'); ?>" autofocus class="form-control <?= ($validation->hasError('nik_teacher') ? 'is-invalid' : '') ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_teacher'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name Guru<code>*</code></label>
                                    <input type="text" name="name" value="<?= old('name') ?>" placeholder="Input name santri" class="form-control <?= ($validation->hasError('name') ? 'is-invalid' : '') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="d-block">Gender<code>*</code></label>
                                    <div class="form-check">
                                        <input class="form-check-input <?= ($validation->hasError('gender') ? 'is-invalid' : '') ?>" checked type="radio" name="gender" id="exampleRadios1" value="man">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Man
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input <?= ($validation->hasError('gender') ? 'is-invalid' : '') ?>" type="radio" name="gender" id="exampleRadios2" value="woman">

                                        <label class="form-check-label" for="exampleRadios2">
                                            Woman
                                        </label>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('gender') ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Pilih Agama<code>*</code></label>
                                    <select name="agama" class="form-control select2 <?= ($validation->hasError('agama') ? 'is-invalid' : '') ?>" id="">
                                        <option value=""> Pilih Agama</option>
                                        <option value="islam"> - Islam -</option>
                                        <option value="katolik"> - Katolik -</option>
                                        <option value="kristen"> - Kristen -</option>
                                        <option value="hindu"> - Hindu -</option>
                                        <option value="budha"> - Budha -</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('agama') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Alamat<code>*</code></label>
                                    <textarea name="alamat" id="" class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : '') ?>" cols="30" rows="10"><?= old('alamat') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat') ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir<code>*</code></label>
                                    <input type="date" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>" class="form-control <?= ($validation->hasError('tgl_lahir') ? 'is-invalid' : '') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_lahir') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tempat Lahir<code>*</code></label>
                                    <textarea name="tempat_lhr" id="" class="form-control <?= ($validation->hasError('tempat_lhr') ? 'is-invalid' : '') ?>"><?= old('tempat_lhr'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempat_lhr') ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Foto santri</label>
                                    <div class="col-sm-2">
                                        <img src="/img/default.png" class="img-thumbnail img-preview" alt="">
                                    </div>
                                    <br>
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" name="foto" id="sampul" onchange="previewImg()">

                                        <label class="custom-file-label" id="label" for="foto">Choose Image</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <label>No Telephone<code>*</code></label>
                                <input type="number" placeholder="No Hp" name="telp" class="form-control <?= ($validation->hasError('telp') ? 'is-invalid' : '') ?>" value="<?= old('telp') ?>" id="">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telp') ?>
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