<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Guru Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-button">
            <a href="/staff/guru/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add Data Guru</span>
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>

        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
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
        <div class="card">
            <div class="card-header">
                <h4> Data guru si-monta <code> <?= session()->roleUser ?></code></h4>
                <div class="card-header-action">
                    <a href="/staff/guru" class="btn btn-info"><i class="fa fa-spinner"> Refresh</i></a>
                    <a href="" class="btn btn-danger"><i class="fa fa-trash"> Trash</i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id="table-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nik Guru</th>
                                <th>Nama Guru</th>
                                <th>Gender</th>
                                <th>Alamat</th>
                                <th>Image</th>
                                <th>
                                    <center>
                                        Action
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($teacher as $t) : ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= ucwords($t['nik_teacher']) ?></td>
                                    <td><?= ucwords($t['name']) ?></td>
                                    <td>
                                        <?php if ($t['gender'] == "man") {
                                            echo '<div class="badge badge-info">' . ucwords($t['gender']);
                                        } else {
                                            echo '<div class="badge badge-warning">' . ucwords($t['gender']);
                                        } ?>
                                    </td>
                                    <td><?= ucwords($t['alamat']) ?></td>
                                    <td>
                                        <img src="<?= site_url('img/guru/' . $t['foto']) ?>" alt="" width="55px" srcset="">
                                    </td>
                                    <td>
                                        <center>
                                            <a href="/staff/guru/<?= $t['teacher_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-check-square"></i><span> Detail</span></a>
                                            <a href="/staff/guru/edit/<?= $t['teacher_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i><span> Edit</span></a>

                                            <form action="/staff/guru/delete/<?= $t['teacher_id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakan data akan dihapus?')">
                                                <?= csrf_field(); ?>
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>

                                        </center>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>