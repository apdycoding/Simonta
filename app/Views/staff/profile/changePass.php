<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>User Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


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
                        <a href="/staff/Prfilestaff">
                            <h4> Change Password</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="/staff/Profilestaff/<?= session()->user_id ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                            <?= csrf_field() ?>

                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Password user<code>*</code></label>

                                    <input type="hidden" name="nameUser" value="<?= $users ?>" id="">

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