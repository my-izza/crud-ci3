<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Buku
                    <small>Data Buku</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Buku</li>
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
                    <h3 class="box-title"> Data buku </h3>
                    <div class="pull-right">
                        <a href="<?= site_url('administrator/buku/add') ?>" class="btn btn-primary btn-flat mb-3" style="float: right;"><i class="fa fa-plus"></i> Tambah buku</a>
                    </div>
                </div>

                <form action="<?= site_url('administrator/buku/search') ?>" class="search-form" method="post">
                    <div class="input-group input-group-md col-md-8">
                        <input type="text" class="form-control" id="search-box" name="keyword" placeholder="masukkan judul buku">
                        <span class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-secondary btn-flat"> Cari </button>
                        </span>
                    </div>
                </form>


                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> NO </th>
                                <th> ID BUKU </th>
                                <th> NAMA BUKU </th>
                                <th> HARGA </th>
                                <th> STOK </th>
                                <th> DETAIL </th>
                                <th> GAMBAR </th>
                                <th> ACTION </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            foreach ($buku as $rows) : ?>

                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $rows->id_buku ?></td>
                                    <td><?= $rows->nama_buku ?></td>
                                    <td>Rp <?= number_format($rows->harga, 0, ',' . ',00')  ?></td>
                                    <td><?= $rows->stok ?></td>
                                    <td><?= $rows->detail ?></td>
                                    <td>
                                        <?php if ($rows->gambar != null) { ?>
                                            <img src="<?= base_url() . '/images/uploads/' . $rows->gambar ?>" style="width: 100px;" alt="">
                                        <?php } ?>

                                    </td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= site_url('administrator/buku/edit/' . $rows->id_buku) ?>" onclick="return confirm('Yakin ubah Produk')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah </a>
                                        <a href="<?= site_url('administrator/buku/del/' . $rows->id_buku) ?>" onclick="return confirm('Yakin hapus Produk')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus </a>
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