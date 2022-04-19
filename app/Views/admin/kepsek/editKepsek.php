<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Kepsek Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/kepsek" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update kepsek</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <h4> Update data kepsek</h4>
                    </div>
                    <div class="card-body">

                        <form action="/kepsek/update/<?= $edit['kepsek_id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Nik kepsek<code>*</code></label>
                                    <input type="number" required name="nik_kepsek" value="<?= old('nik_kepsek', $edit['nik_kepsek']); ?>" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name kepsek<code>*</code></label>
                                    <input type="text" name="name_kepsek" required value="<?= old('name_kepsek', $edit['name_kepsek']); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Gender<code>*</code></label>
                                    <select name="gender" required class="form-control select2" id="">
                                        <?php

                                        $gender = "";
                                        if ($edit['kepsek_id'] != 0) {
                                            $jk = $edit['gender'];
                                        }

                                        ?>
                                        <option value="">- Pilih Agama -</option>
                                        <option value="man" <?= ($jk == "man" ? "selected" : null) ?>>- man -</option>
                                        <option value="woman" <?= ($jk == "woman" ? "selected" : null) ?>>- woman -</option>
                                        ?>
                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Alamat <code>*</code></label>
                                    <input type="text" name="alamat" required value="<?= old('alamat', $edit['alamat']); ?>" class="form-control">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tanggal lahir<code>*</code></label>
                                    <input type="date" class="form-control" required name="tgl_lahir" value="<?= old('tgl_lahir', $edit['tgl_lahir']); ?>" id="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tempat Lahir<code>*</code></label>
                                    <input type="text" name="tempat_lhr" required value="<?= old('tempat_lhr', $edit['tempat_lhr']); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="d-block">Status kepsek<code>*</code></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_kepsek" id="exampleRadios1" value="actived" <?= ($edit['status_kepsek'] == "actived" ? "checked" : "") ?>>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Actived
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_kepsek" id="exampleRadios2" value="nonActived" <?= ($edit['status_kepsek'] == "nonActived" ? "checked" : "") ?>>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Non actived
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="d-block">Gelar<code>*</code></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gelar" id="exampleRadios1" value="D3" <?= ($edit['gelar'] == "D3" ? "checked" : "") ?>>
                                        <label class="form-check-label" for="exampleRadios1">
                                            D3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gelar" id="exampleRadios2" value="S1" <?= ($edit['gelar'] == "S1" ? "checked" : "") ?>>
                                        <label class="form-check-label" for="exampleRadios2">
                                            S1
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Lulusan<code>*</code></label>
                                    <input type="text" name="lulusan" required value="<?= old('lulusan', $edit['lulusan']); ?>" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone<code>*</code></label>
                                    <input type="number" name="phone_kepsek" required value="<?= old('phone_kepsek', $edit['phone_kepsek']); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-paper-plane"></i> Updated</button>
                                <a href="/kepsek/edit/<?= $edit['kepsek_id']; ?>" class="btn btn-info btn-sm"> <i class="fas fa-spinner" aria-hidden="true"></i> Reload</a>
                                <a href="/kepsek" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>