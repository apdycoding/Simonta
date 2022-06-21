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

        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <code><b>Search santri</b></code>
                <br>
                Silahkan cari nama santri
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>