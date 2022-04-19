<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Master Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>

        <div class="section-header-button">
            <!-- <a href="/admin/Datahadits/new" class="btn btn-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> <span>Add master data</span>
            </a> -->
        </div>
    </div>

    <?php if (session()->getFlashdata('succes')) : ?>

        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="alert">
                    x
                </button>
                <b>Success !</b>
                <?= session()->getFlashdata('succes') ?>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Data user si-monta</h4>
                        <div class="card-header-action">
                            <a href="/admin/reportHadits" class="btn btn-info"><i class="fa fa-spinner"> Refresh</i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name santri</th>
                                        <th>Jumlah hafalan hadits</th>
                                        <th>
                                            <center>
                                                Action
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;

                                    foreach ($mhadits as $key => $value) :

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value['name_santri']; ?></td>
                                            <td>
                                                <code>
                                                    <?= $value['count(*)']; ?>
                                                    hadits
                                                </code>
                                            </td>
                                            <td>
                                                <center>

                                                    <a href="/admin/Datahadits/show/<?= $value['santri_id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i><span> Detail hafalan</span></a>

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
        </div>

    </div>
</section>

<?= $this->endSection() ?>

<!-- <?php
        $no = 0;
        foreach ($data as $key => $value) {
            $no++;
            // ambil id santri_id
            $id = $value['santri_id'];
            // dd($id);
            $query = $this->db = \Config\Database::connect();
            // query dan join mhadits berdasarkan santri_id
            $data = $query->table('mhadits')
                ->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id')
                ->join('santri', 'santri.santri_id = mhadits.santri_id ')
                ->select('dhadits.*, santri.name_santri, santri.santri_id')
                ->where('santri.santri_id', $id)
                ->get();
            // hitung berapa baris data yang ada dengan resultdID->numrows
            $jml = $data->resultID->num_rows;
            // dd($jml);

            echo '<tr>';
            echo '<td rowspan="' . $jml . '">' . $no . '.</td>';
            echo '<td rowspan="' . $jml . '">' . $value['santri_id'] . '</td>';
            // $nom = 1;
            foreach ($data->getResultArray() as $dt) {

                echo '<td>' . $dt['nama_hadits'] . '</td>';
                echo '</tr>';
            }
            if ($jml == 0) {
                echo '</tr>';
            }
        };

        // $data1 = $data->getResultArray();
        ?> -->