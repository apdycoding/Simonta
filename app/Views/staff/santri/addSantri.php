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
        <h1>Create Santri</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Input Data Santri</h4>
                    </div>
                    <div class="card-body">

                        <form action="/staff/Santristaff/create" method="post" autocomplete="off" enctype="multipart/form-data">

                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik Santri<code>*</code></label>
                                    <input type="number" name="nik_santri" value="<?= old('nik_santri'); ?>" autofocus class="form-control <?= ($validation->hasError('nik_santri')) ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_santri'); ?>
                                    </div>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name Santri<code>*</code></label>
                                    <input type="text" name="name_santri" value="<?= old('name_santri'); ?>" placeholder="Input name santri" class="form-control <?= ($validation->hasError('name_santri')) ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name_santri'); ?>
                                    </div>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="d-block">Gender<code>*</code></label>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('gender')) ? 'is-invalid' : '' ?>" checked type="radio" name="gender" id="exampleRadios1" value="man">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Man
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  <?= ($validation->hasError('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="exampleRadios2" value="woman">

                                        <label class="form-check-label" for="exampleRadios2">
                                            Woman
                                        </label>

                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gender'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Pilih Agama<code>*</code></label>
                                    <select name="agama" class="form-control select2  <?= ($validation->hasError('nik_santri')) ? 'is-invalid' : '' ?>" id="">
                                        <option value=""> Pilih Agama</option>
                                        <option value="islam"> - Islam -</option>
                                        <option value="katolik"> - Katolik -</option>
                                        <option value="kristen"> - Kristen -</option>
                                        <option value="hindu"> - Hindu -</option>
                                        <option value="budha"> - Budha -</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('agama'); ?>
                                    </div>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Alamat<code>*</code></label>
                                    <textarea name="alamat" id="" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" cols="30" rows="10"><?= old('alamat') ?></textarea>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir<code>*</code></label>
                                    <input type="date" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_lahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tempat Lahir<code>*</code></label>
                                    <textarea name="tempat_lhr" id="" class="form-control <?= ($validation->hasError('tempat_lhr')) ? 'is-invalid' : '' ?>"><?= old('tempat_lhr'); ?></textarea>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempat_lhr'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Foto santri</label>
                                    <div class="col-sm-2">
                                        <img src="/img/default.png" class="img-thumbnail img-preview" alt="">
                                    </div>
                                    <!-- <div class="preview">
                                        <img id="file-ip-1-preview" width="100px">
                                    </div> -->
                                    <br>
                                    <div class="custom-file">
                                        <!-- <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);" class="custom-file-input <?= ($validation->hasError('photos')) ? 'is-invalid' : '' ?>"> -->

                                        <input type="file" class="custom-file-input <?= ($validation->hasError('photos')) ? 'is-invalid' : '' ?>" name="photos" id="sampul" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('photos'); ?>
                                        </div>
                                        <label class="custom-file-label" id="label" for="foto">Choose Image</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Status Santri<code>*</code></label>
                                    <select name="statusSantri" class="form-control  <?= ($validation->hasError('statusSantri')) ? 'is-invalid' : '' ?>" id="">
                                        <option value="1" selected> - Actived -</option>
                                        <option value="0"> - Non Actived -</option>
                                    </select>
                                </div>

                                <div class="invalid-feedback">
                                    <?= $validation->getError('statusSantri'); ?>
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
                                    <input type="number" name="nik_ibu" class="form-control <?= ($validation->hasError('nik_ibu') ? 'is-invalid' : '') ?>" value="<?= old('nik_ibu'); ?>" placeholder="Input Angka">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_ibu'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nama Ibu<code>*</code></label>
                                    <input type="text" name="nama_ibu" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : '' ?>" value="<?= old('nama_ibu'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_ibu'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Pekerjaan Ibu<code>*</code></label>
                                    <input type="text" name="pekerjaan_ibu" class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : '' ?>" value="<?= old('pekerjaan_ibu') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan_ibu'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Status Ibu<code>*</code></label>
                                    <input type="text" name="status_ibu" class="form-control <?= ($validation->hasError('status_ibu')) ? 'is-invalid' : '' ?>" value="<?= old('status_ibu'); ?>" placeholder="Masih hidup | sudah meninggal">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_ibu'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. Telp Ibu<code>*</code> </label>
                                    <input type="number" name="phoneIbu" class="form-control <?= ($validation->hasError('phoneIbu')) ? 'is-invalid' : '' ?>" value="<?= old('phoneIbu') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('phoneIbu'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik Ayah<code>*</code></label>
                                    <input type="number" name="nik_ayah" class="form-control <?= ($validation->hasError('nik_ayah')) ? 'is-invalid' : '' ?>" value="<?= old('nik_ayah'); ?>" placeholder="Input Angka">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik_ayah'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nama Ayah<code>*</code></label>
                                    <input type="text" name="nama_ayah" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : '' ?>" value="<?= old('nama_ayah'); ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_ayah'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Pekerjaan Ayah<code>*</code></label>
                                    <input type="text" name="pekerjaan_ayah" value="<?= old('pekerjaan_ayah'); ?>" class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan_ayah'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Status Ayah<code>*</code></label>
                                    <input type="text" name="status_ayah" value="<?= old('status_ayah'); ?>" name="statusAyah" class="form-control <?= ($validation->hasError('status_ayah')) ? 'is-invalid' : '' ?>" placeholder="Masih hidup | sudah meninggal">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_ayah'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. Telp Ayah</label>
                                    <input type="number" name="phoneAyah" value="<?= old('phoneAyah'); ?>" class="form-control <?= ($validation->hasError('phoneAyah')) ? 'is-invalid' : '' ?>">

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
                        <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-paper-plane"></i> Submit</button>
                        <button type="reset" class="btn btn-secondary"> <i class="fa fa-eraser"></i> Reset</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection() ?>