<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Dashboaard
					<small>Control Panel</small>
				</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

	<form action="<?= site_url('administrator/dashboard/search') ?>" class="search-form" method="post">
		<div class="input-group input-group-md col-md-10">
			<input type="text" class="form-control" id="search-box" name="keyword" placeholder="masukkan judul buku">
			<span class="input-group-append">
				<button type="submit" name="submit" class="btn btn-secondary btn-flat"> Cari </button>
			</span>
		</div>
	</form> <br>

	<div class="container-fluid">
		<div class="row text-center ">
			<?php foreach ($buku as $rows) : ?>
				<div class="card text-center ml-3 mb-3" style="width: 18rem;">
					<img src="<?= base_url() . '/images/uploads/' . $rows->gambar ?>" height="300" class="card-img-top" alt="...">
					<div class="card-body" style="text-align: center;">
						<h5 class="card-title text-center  mb-3 "><?= $rows->nama_buku ?></h5> <br>
						<div class="input-group">
							<a href="#" class="btn btn-info btn-flat mr-5">Rp <?= number_format($rows->harga, 0, ',' . ',00')  ?></a>
							<a href="<?= site_url('administrator/dashboard/detailBuku/' . $rows->id_buku) ?>" class="btn btn-success  btn-flat">Detail Buku</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>

</section>