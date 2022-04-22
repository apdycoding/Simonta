<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Master Page &mdash; Simon</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="/admin/Datadoa" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create data hafalan</h1>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" class="float-right">
                        <a href="/staff/Masterdoa/new">
                            <h4> Input data doa</h4>
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-info alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismis="alert">
                                    x
                                </button>
                                <code><b>validasi doa</b></code>
                                Data doa yang sudah dipilih <code> tidak bisa dipilih kembali</code>
                            </div>
                        </div>

                        <form action="/staff/Masterdoa" method="post" autocomplete="off" enctype="multipart/form-data">

                            <?= csrf_field() ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama anak<code>*</code></label>

                                    <!-- <input type="text" name="santri_id" value="<?= old('santri_id') ?>" placeholder="nama penguji " class="form-control <?= $validation->hasError('santri_id') ? 'is-invalid' : '' ?>"> -->

                                    <select name="santri_id" id="santri_id" class="form-control select2 <?= $validation->hasError('santri_id') ? 'is-invalid' : '' ?>">
                                        <option value=""> - Cari nama anak -</option>
                                        <?php foreach ($names as $ns) : ?>
                                            <option value="<?= $ns['santri_id']; ?>"> <?= $ns['name_santri']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('santri_id'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Nama doa<code>*</code></label>

                                    <select id="ddoa_id" name="ddoa_id" class="form-control select2 <?= $validation->hasError('ddoa_id') ? 'is-invalid' : '' ?>">
                                        <option value="" selected>- Pilih nama hadits -</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ddoa_id'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal ujian<code>*</code></label>

                                    <input type="date" name="dtgl_ujian" class="form-control <?= $validation->hasError('dtgl_ujian') ? 'is-invalid' : '' ?>" id="">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dtgl_ujian'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Predikat ujian<code>*</code></label>

                                    <input type="text" name="predikat" class="form-control <?= $validation->hasError('predikat') ? 'is-invalid' : '' ?>" id="">

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('predikat'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Penguji<code>*</code></label>

                                    <select name="penguji_id" class="form-control <?= $validation->hasError('penguji') ? 'is-invalid' : '' ?>" id="">
                                        <option value=""> - Select Penguji -</option>
                                        <?php
                                        foreach ($penguji as $key => $value) : ?>

                                            <option value="<?= $value['penguji_id']; ?>">- <?= $value['nama_penguji']; ?> -</option>

                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback">
                                        <?= $validation->getError('penguji_id'); ?>
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

<script type="text/javascript">
    $(document).ready(function() {
        // // $("#santri_id").hide();
        // $("#dhadits_id").hide();

        loaddhadits_id();
    });

    // deskripsikan csrf dan hahs token
    let csrfToken = "<?= csrf_token() ?>";
    let csrfHash = "<?= csrf_hash() ?>";

    function loaddhadits_id() {
        // ambil nilai dari santri_id

        // jika santri id di change
        $("#santri_id").change(function() {
            var getSantri_id = $("#santri_id").val();

            $.ajax({
                type: "post",
                dataType: 'json',

                url: "<?= base_url() ?>/staff/Masterdoa/getDatadoa",
                data: {
                    [csrfToken]: csrfHash,
                    santri_id: getSantri_id
                },

                // jika
                success: function(data) {
                    // console.log(data);

                    var html = "";
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].ddoa_id + '>' + data[i].nama_doa + '</option>';
                    }
                    $('#ddoa_id').html(html);
                }
            });
        });
    }
</script>

<?= $this->endSection() ?>