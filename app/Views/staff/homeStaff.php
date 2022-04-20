<?= $this->extend('layout/default') ?>

<?= $this->section('title'); ?>
<title>Home Page &mdash; Simon</title>
<?= $this->endSection(); ?>


<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Blank Page</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <a href="/staff/Santristaff/inactive">
                            <i class="fas fa-user-alt-slash"></i>
                        </a>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Non Santri</h4>
                        </div>
                        <div class="card-body">
                            <?= $totalSantri ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <a href="/staff/Santristaff">
                            <i class="fas fa-users "></i>
                        </a>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Santri Active</h4>
                        </div>
                        <div class="card-body">
                            <?= $santrinon ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <a href="/admin/Ddoa">
                            <i class="fas fa-folder-open"></i>
                        </a>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data doa</h4>
                        </div>
                        <div class="card-body">
                            <?= $totalDoa ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <a href="/admin/dhadits">
                            <i class="fas fa-folder-open"></i>
                        </a>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data hadits</h4>
                        </div>
                        <div class="card-body">
                            <?= $hadits ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <a href="/doa">
                            <i class="fas fa-newspaper"></i>
                        </a>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data cetak doa</h4>
                        </div>
                        <div class="card-body">
                            <?= $countdoa ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <a href="/hadits">
                            <i class="fas fa-newspaper"></i>
                        </a>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Data cetak hadits</h4>
                        </div>
                        <div class="card-body">
                            <?= $counthadits ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>