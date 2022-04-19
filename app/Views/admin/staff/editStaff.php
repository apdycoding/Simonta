<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Staff Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php
// dd($santri);
?>


<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/staff" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update staff</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <h4> Update data staff</h4>
                    </div>
                    <div class="card-body">

                        <form action="/staff/update/<?= $edit['staff_id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Nik staff<code>*</code></label>
                                    <input type="number" required name="nik_staff" value="<?= old('nik_staff', $edit['nik_staff']); ?>" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Name staff<code>*</code></label>
                                    <input type="text" name="name_staff" required value="<?= old('name_staff', $edit['name_staff']); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Gender<code>*</code></label>
                                    <select name="gender" required class="form-control select2" id="">
                                        <?php

                                        $gender = "";
                                        if ($edit['staff_id'] != 0) {
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

                            <div class="form-group">
                                <label>Phone<code>*</code></label>
                                <input type="number" name="phone_staff" required value="<?= old('phone_staff', $edit['phone_staff']); ?>" class="form-control">
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-paper-plane"></i> Updated</button>
                                <a href="/staff/edit/<?= $edit['staff_id']; ?>" class="btn btn-info btn-sm"> <i class="fas fa-spinner" aria-hidden="true"></i> Reload</a>
                                <a href="/staff" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>