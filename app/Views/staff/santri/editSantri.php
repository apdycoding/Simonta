<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Create Santri &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php
// dd($santri);
?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/staff/Santristaff" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Santri</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Data Santri</h4>
                    </div>
                    <div class="card-body">

                        <?php $validation = \Config\Services::validation(); ?>

                        <form action="/staff/Santristaff/update/<?= $santri['santri_id']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

                            <?= csrf_field() ?>

                            <!-- <input type="hidden" name="_method" value="PUT"> -->

                            <input type="hidden" name="santri_id" class="form-control" value="<?= $santri['santri_id']; ?>">

                            <input type="hidden" name="fotoLama" value="<?= $santri['photos'] ?>" class="form-control">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik Santri<code>*</code></label>
                                    <input type="number" name="nik_santri" value="<?= old('nik_santri', $santri['nik_santri']) ?>" autofocus class="form-control <?= $validation->hasError('nik_santri') ? 'is-invalid' : null  ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_santri'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name Santri<code>*</code></label>
                                    <input type="text" name="name_santri" value="<?= old('name_santri', $santri['name_santri']) ?>" class="form-control <?= ($validation->hasError('name_santri')) ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name_santri'); ?>
                                    </div>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="d-block">Gender<code>*</code></label>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="exampleRadios1" value="man" <?= ($santri['gender'] == "man" ? "checked" : "") ?>>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Man
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="exampleRadios2" value="woman" <?= ($santri['gender'] == "woman" ? "checked" : "") ?>>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Woman
                                        </label>
                                    </div>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('gender'); ?>
                                    </div>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Pilih Agama<code>*</code></label>
                                    <select name="agama" class="form-control select2  <?= ($validation->hasError('agama')) ? 'is-invalid' : '' ?>" id="">
                                        <?php

                                        $agama = "";
                                        if ($santri['santri_id'] != 0) {
                                            $agama = $santri['agama'];
                                        }

                                        ?>
                                        <option value="">- Pilih Agama -</option>
                                        <option value="islam" <?= ($agama == "islam" ? "selected" : null) ?>>- islam -</option>
                                        <option value="katolik" <?= ($agama == "katolik" ? "selected" : null) ?>>- Katolik -</option>
                                        <option value="kristen" <?= ($agama == "kristen" ? "selected" : null); ?>>- Kristen -</option>
                                        <option value="hindu" <?= ($agama == "hindu" ? "selected" : null); ?>>- Hindu -</option>
                                        <option value="budha" <?= ($agama == "budha" ? "selected" : null); ?>>- Budha -</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('agama'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Alamat<code>*</code></label>
                                    <textarea name="alamat" id="" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" cols="30" rows="10"><?= old('alamat', $santri['alamat']); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir<code>*</code></label>
                                    <input type="date" name="tgl_lahir" value="<?= old('tgl_lahir', $santri['tgl_lahir']); ?>" class="form-control <?= $validation->hasError('tgl_lahir') ? 'is-invalid' : null ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_lahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tempat Lahir<code>*</code></label>
                                    <textarea name="tempat_lhr" id="" class="form-control <?= ($validation->hasError('tempat_lhr')) ? 'is-invalid' : '' ?>"><?= old('tempat_lhr', $santri['tempat_lhr']); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempat_lhr'); ?>
                                    </div>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                    <label>Foto santri</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photos" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label>Foto santri</label>
                                    <div class="col-sm-2">
                                        <img src="/img/<?= $santri['photos']; ?>" class="img-thumbnail img-preview" alt="">
                                    </div>
                                    <!-- <div class="preview">
                                        <img id="file-ip-1-preview" width="100px">
                                    </div> -->
                                    &nbsp;
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input <?= ($validation->hasError('photos')) ? 'is-invalid' : '' ?>" name="photos" id="sampul" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('photos'); ?>
                                        </div>
                                        <label class="custom-file-label" id="label" for="foto"><?= $santri['photos'] ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Status santri<code>*</code></label>
                                    <select name="statusSantri" class="form-control <?= ($validation->hasError('statusSantri')) ? 'is-invalid' : '' ?>" id="">
                                        <?php

                                        $status = "";
                                        if ($santri['santri_id'] != 0) {
                                            $status = $santri['statusSantri'];
                                        }

                                        ?>
                                        <option value="1" <?= ($status == "1" ? "selected" : null) ?>>- Actived -</option>
                                        <option value="0" <?= ($status == "0" ? "selected" : null) ?>>- Non Actived -</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('statusSantri'); ?>
                                    </div>
                                </div>

                            </div>

                            <center>
                                <div class="card-header">
                                    <h4>Data Wali Santri</h4>
                                </div>
                            </center>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik Ibu<code>*</code></label>
                                    <input type="number" name="nik_ibu" class="form-control <?= ($validation->hasError('nik_ibu')) ? 'is-invalid' : '' ?>" value="<?= old('nik_ibu', $santri['nik_ibu']) ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_ibu'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nama Ibu<code>*</code></label>
                                    <input type="text" name="nama_ibu" value="<?= old('nama_ibu', $santri['nama_ibu']); ?>" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_ibu'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Pekerjaan Ibu<code>*</code></label>
                                    <input type="text" name="pekerjaan_ibu" value="<?= old('pekerjaan_ibu', $santri['pekerjaan_ibu']); ?>" class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan_ibu'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Status Ibu<code>*</code></label>
                                    <input type="text" name="status_ibu" value="<?= old('status_ibu', $santri['status_ibu']) ?>" class="form-control <?= ($validation->hasError('status_ibu')) ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_ibu'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. Telp Ibu<code>*</code> </label>
                                    <input type="number" value="<?= old('phoneIbu', $santri['phoneIbu']) ?>" name="phoneIbu" class="form-control <?= ($validation->hasError('phoneIbu')) ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('phoneIbu'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik Ayah<code>*</code></label>
                                    <input type="number" name="nik_ayah" class="form-control <?= ($validation->hasError('nik_ayah')) ? 'is-invalid' : '' ?>" value="<?= old('nik_ayah', $santri['nik_ayah']) ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_ayah'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nama Ayah<code>*</code></label>
                                    <input type="text" name="nama_ayah" value="<?= old('nama_ayah', $santri['nama_ayah']) ?>" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_ayah'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Pekerjaan Ayah<code>*</code></label>
                                    <input type="text" name="pekerjaan_ayah" value="<?= old('pekerjaan_ayah', $santri['pekerjaan_ayah']) ?>" class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan_ayah'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Status Ayah<code>*</code></label>
                                    <input type="text" name="status_ayah" name="statusAyah" value="<?= old('status_ayah', $santri['status_ayah']) ?>" class="form-control <?= ($validation->hasError('status_ayah')) ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_ayah'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. Telp Ayah</label>
                                    <input type="number" name="phoneAyah" value="<?= old('phoneAyah', $santri['phoneAyah']) ?>" class="form-control <?= ($validation->hasError('phoneAyah')) ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('phoneAyah'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <code>*</code> Data wajib diisi
                            </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary btn-sm mr-1"> <i class="fa fa-check-circle" aria-hidden="true"></i> Updated</button>
                        <a href="/staff/Santristaff/edit/<?= $santri['santri_id']; ?>" class="btn btn-info btn-sm"> <i class="fas fa-spinner" aria-hidden="true"></i> Reload</a>
                        <a href="/staff/Santristaff" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to santri</a>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection() ?>