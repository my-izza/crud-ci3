<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengadaan
                    <small>Data Buku</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Pengadaan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main Content -->
<section class="content">

    <div class="card">

        <div class="card-header">

            <div class="box">

                <div class="box-header">
                    <h3 class="box-title"><?= ucfirst($page) ?> Buku </h3>
                    <div class="pull-right">
                        <a href="<?= site_url('administrator/pengadaan') ?>" class="btn btn-warning btn-flat mb-3" style="float: right;"><i class="fa fa-undo"></i> Kembali </a>
                    </div>
                </div>

                <div class="box-body mt-5">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4" style="display:block; margin:auto;">
                            <form action="<?= site_url('administrator/buku/process') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">ID Buku</label>
                                    <input type="hidden" name="id" value="<?= $row->id_buku ?>">
                                    <input type="text" name="id_buku" class="form-control" value="<?= $row->id_buku ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="kategori" class="form-control" id="" required>
                                        <option>- Pilih Kategori -</option>
                                        <?php foreach ($kategori->result() as $key => $data) { ?>
                                            <option value="<?= $data->id_kategori ?>" <?= $data->id_kategori == $row->id_kategori ? "selected" : null ?>><?= $data->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Buku</label>
                                    <input type="text" name="nama_buku" class="form-control" value="<?= $row->nama_buku ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control" value="<?= $row->harga ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" name="stok" class="form-control" value="<?= $row->stok ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Penerbit</label>
                                    <?= form_dropdown('penerbit', $penerbit, $selectedpenerbit, ['class' => 'form-control', 'required' => 'required']); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Terbit</label>
                                    <input type="text" name="tahun" class="form-control" value="<?= $row->tahun ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Detail</label><br>
                                    <textarea name="detail" id="" cols="50" rows="10"><?= $row->detail ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" value="" required>
                                    <?php if ($page == 'edit') {
                                        if ($row->gambar != null) { ?>
                                            <div>
                                                <img src="<?= base_url() . '/images/uploads/' . $row->gambar ?>" style="width: 50%px;" alt="">
                                            </div>
                                    <?php }
                                    } ?>
                                </div>


                                <div class="form-group">
                                    <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                    <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>