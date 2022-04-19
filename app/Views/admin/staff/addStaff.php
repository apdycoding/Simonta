<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Staff Page &mdash; Simon</title>
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
            <a href="/staff" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create data staff</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/staff/new">
                            <h4> Input data staff</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/staff/create" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik Staff<code>*</code></label>
                                    <input type="number" autofocus name="nik_staff" required value="<?= old('nik_staff') ?>" placeholder="nik staff" class="form-control ">

                                    <div class="invalid-feedback">
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name staff<code>*</code></label>
                                    <input type="text" name="name_staff" required value="<?= old('name_staff') ?>" placeholder="nama staff" class="form-control ">

                                    <div class="invalid-feedback">
                                        <!--  -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Gender<code>*</code></label>
                                    <select name="gender" class="form-control select2" required id="">
                                        <option value=""> - pilih -</option>
                                        <option value="man"> - Laki-laki -</option>
                                        <option value="woman"> - Perempuan -</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Alamat<code>*</code></label>
                                    <input type="text" name="alamat" value="<?= old('alamat') ?>" required class="form-control" id="">
                                    <div class="invalid-feedback">
                                        <!--  -->
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tanggal lahir<code>*</code></label>
                                    <input type="date" name="tgl_lahir" value="<?= old('tgl_lahir') ?>" required class="form-control" id="">
                                    <div class="invalid-feedback">
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tempat lahir<code>*</code></label>
                                    <input type="text" name="tempat_lhr" required value="<?= old('tempat_lhr') ?>" placeholder="nama staff" class="form-control ">

                                    <div class="invalid-feedback">
                                        <!--  -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Telp<code>*</code></label>
                                <input type="number" name="phone_staff" value="<?= old('phone_staff') ?>" required class="form-control" id="">
                                <div class="invalid-feedback">
                                    <!--  -->
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