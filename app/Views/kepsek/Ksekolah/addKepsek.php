<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Kepsek Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/kepsek/HeadSchool" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create data kepsek</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/kepsek/HeadSchool/new">
                            <h4> Input data kepsek
                            </h4>
                        </a>
                        <code><?= session()->roleUser ?></code>
                    </div>
                    <div class="card-body">

                        <form action="/kepsek/HeadSchool/create" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nik kepsek<code>*</code></label>
                                    <input type="number" autofocus name="nik_kepsek" required value="<?= old('nik_kepsek') ?>" placeholder="nik kepsek" class="form-control ">

                                    <div class="invalid-feedback">
                                        <!--  -->
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name kepsek<code>*</code></label>
                                    <input type="text" name="name_kepsek" required value="<?= old('name_kepsek') ?>" placeholder="nama kepsek" class="form-control ">

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
                                    <input type="text" name="tempat_lhr" required value="<?= old('tempat_lhr') ?>" class="form-control ">

                                    <div class="invalid-feedback">
                                        <!--  -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="d-block">Status kepsek<code>*</code></label>
                                    <div class="form-check">
                                        <input class="form-check-input" checked type="radio" name="status_kepsek" id="exampleRadios1" value="actived">
                                        <label class="form-check-label" for="exampleRadios1">
                                            actived
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_kepsek" id="exampleRadios2" value="nonActived">

                                        <label class="form-check-label" for="exampleRadios2">
                                            Nonactived
                                        </label>

                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="d-block">Gelar kepsek<code>*</code></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gelar" id="exampleRadios1" value="D3">
                                        <label class="form-check-label" for="exampleRadios1">
                                            D3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" checked type="radio" name="gelar" id="exampleRadios2" value="S1">

                                        <label class="form-check-label" for="exampleRadios2">
                                            S1
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Lulusan<code>*</code></label>
                                    <input type="text" name="lulusan" required value="<?= old('lulusan') ?>" required class="form-control" id="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone kepsek<code>*</code></label>
                                    <input type="number" name="phone_kepsek" required value="<?= old('phone_kepsek') ?>" class="form-control ">

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