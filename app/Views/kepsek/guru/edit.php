<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Santri Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php
// dd($santri);
?>


<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/staff/guru" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update guru</h1>
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
                        <h4> Update data guru</h4>
                    </div>
                    <div class="card-body">

                        <form action="/staff/guru/update/<?= $idteacher['teacher_id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <input type="hidden" name="teacher_id" class="form-control" value="<?= $idteacher['teacher_id']; ?>" id="">

                            <input type="hidden" name="oldFoto" class="form-control" value="<?= $idteacher['foto']; ?>" id="">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik Guru<code>*</code></label>
                                    <input type="number" name="nik_teacher" placeholder="Input Nik guru" value="<?= old('nik_teacher', $idteacher['nik_teacher']); ?>" autofocus class="form-control <?= ($validation->hasError('nik_teacher') ? 'is-invalid' : '') ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_teacher'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name Guru<code>*</code></label>
                                    <input type="text" name="name" value="<?= old('name', $idteacher['name']); ?>" class="form-control <?= ($validation->hasError('name') ? 'is-invalid' : '') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="d-block">Gender<code>*</code></label>
                                    <div class="form-check">
                                        <input class="form-check-input <?= ($validation->hasError('gender') ? 'is-invalid' : '') ?>" value="man" <?= ($idteacher['gender'] == "man" ? "checked" : "") ?> type="radio" name="gender" id="exampleRadios1" value="man">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Man
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input <?= ($validation->hasError('gender') ? 'is-invalid' : '') ?>" value="woman" <?= ($idteacher['gender'] == "woman" ? "checked" : "") ?> type="radio" name="gender" id="exampleRadios2" value="woman">

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
                                        <?php

                                        $agama = "";
                                        if ($idteacher['teacher_id'] != 0) {
                                            $agama = $idteacher['agama'];
                                        }

                                        ?>
                                        <option value="">- Pilih Agama -</option>
                                        <option value="islam" <?= ($agama == "islam" ? "selected" : null) ?>>- islam -</option>
                                        <option value="katolik" <?= ($agama == "katolik" ? "selected" : null) ?>>- Katolik -</option>
                                        <option value="kristen" <?= ($agama == "kristen" ? "selected" : null); ?>>- Kristen -</option>
                                        <option value="hindu" <?= ($agama == "hindu" ? "selected" : null); ?>>- Hindu -</option>
                                        <option value="budha" <?= ($agama == "budha" ? "selected" : null); ?>>- Budha -</option>
                                        ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('agama') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Alamat<code>*</code></label>
                                    <textarea name="alamat" id="" class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : '') ?>"><?= old('alamat', $idteacher['alamat']) ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat') ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir<code>*</code></label>
                                    <input type="date" name="tgl_lahir" value="<?= old('tgl_lahir', $idteacher['tgl_lahir']); ?>" class="form-control <?= ($validation->hasError('tgl_lahir') ? 'is-invalid' : '') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_lahir') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tempat Lahir<code>*</code></label>
                                    <textarea name="tempat_lhr" id="" class="form-control <?= ($validation->hasError('tempat_lhr') ? 'is-invalid' : '') ?>"><?= old('tempat_lhr', $idteacher['tempat_lhr']); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempat_lhr') ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Foto santri</label>
                                    <div class="col-sm-2">
                                        <img src="/img/guru/<?= $idteacher['foto']; ?>" class="img-thumbnail img-preview" alt="">
                                    </div>
                                    <br>
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" name="foto" id="sampul" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                        </div>
                                        <label class="custom-file-label" id="label" for="foto"><?= $idteacher['foto'] ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <label>No Telephone<code>*</code></label>
                                <input type="number" placeholder="No Hp" name="telp" class="form-control <?= ($validation->hasError('telp') ? 'is-invalid' : '') ?>" value="<?= old('telp', $idteacher['telp']) ?>" id="">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telp') ?>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-paper-plane"></i> Updated</button>

                                <a href="/staff/guru" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>