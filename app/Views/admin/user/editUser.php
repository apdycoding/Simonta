<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>User Page &mdash; Simon</title>
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
            <a href="/users" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create new user</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/users/edit/<?= $users['user_id']; ?>">
                            <h4> Updated new user</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/users/update/<?= $users['user_id'] ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name users<code>*</code></label>
                                    <input type="text" name="nameUser" value="<?= $users['nameUser'] ?>" placeholder="nama users" autofocus class="form-control <?= $validation->hasError('nameUser') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nameUser'); ?>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Email user<code>*</code></label>
                                    <input type="email" placeholder="Email user" value="<?= $users['emailUser'] ?>" name="emailUser" class="form-control <?= $validation->hasError('emailUser') ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('emailUser'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Phone users<code>*</code></label>
                                    <input type="text" name="phoneUser" value="<?= $users['phoneUser'] ?>" autofocus class="form-control <?= $validation->hasError('phoneUser') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('phoneUser'); ?>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Roles user<code>*</code></label>

                                    <select name="roleUser" class="form-control select2 <?= $validation->hasError('roleUser') ? 'is-invalid' : '' ?>" id="">

                                        <?php

                                        if ($users['user_id'] != null) {
                                            $role = $users['roleUser'];
                                        }
                                        ?>

                                        <option value=""> cari role user </option>
                                        <option value="adminsuper" <?= ($role == 'adminsuper' ? 'selected' : null) ?>> - Admin super -</option>
                                        <option value="staff" <?= ($role == 'staff' ? 'selected' : null) ?>> - Staff -</option>
                                        <option value="kepsek" <?= ($role == 'kepsek' ? 'selected' : null) ?>> - Kepsek -</option>
                                        <option value="walisantri" <?= ($role == 'walisantri' ? 'selected' : null) ?>> - Walisantri -</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('roleUser'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Password user<code>*</code></label>
                                    <input type="text" placeholder="Password user" value="<?= old('password') ?>" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Password matches<code>*</code></label>
                                    <input type="password" placeholder="password confirm" name="passconf" class="form-control <?= $validation->hasError('passconf') ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('passconf'); ?>
                                    </div>
                                </div>
                            </div> -->


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