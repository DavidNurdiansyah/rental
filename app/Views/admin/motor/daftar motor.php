<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Motor</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Daftar Motor
                        </div>

                        <!-- Notif berhasil tambah daftar motor -->
                        <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" 
                        data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                        <?php if (session('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session ('success'); ?>
                            </div>
                        <?php endif; ?>

                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Plat</th>
                                        <th>Nama Motor</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Fungsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($M_Motor as $daftar_motor) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $daftar_motor->no_plat; ?></td>
                                            <td><?= $daftar_motor->nama_motor; ?></td>
                                            <td><?= $daftar_motor->harga; ?></td>
                                            <td><?= $daftar_motor->deskripsi; ?></td>
                                            <td><img src="<?= base_url('public/uploads/motor/' . $daftar_motor->gambar); ?>" alt="" width="100"/></td>
                                            <td width="15%" class="text-center">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $daftar_motor->id_motor; ?>"><i class="fas fa-edit"></i> Ubah</button>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $daftar_motor->id_motor; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
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
    </main>

    <!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Motor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('daftar motor/tambah') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="no_plat">No Plat</label>
                <input type="text" name="no_plat" id="no_plat" class="form-control" required>
                <label for="nama_motor">Nama Motor</label>
                <input type="text" name="nama_motor" id="nama_motor" class="form-control" required>
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control" required>
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>

            </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah -->
<?php foreach ($M_Motor as $daftar_motor) : ?>
<div class="modal fade" id="ubahModal<?= $daftar_motor->id_motor; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-edit"></i> Ubah Motor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('daftar motor/ubah/'.$daftar_motor->id_motor) ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="no_plat">No Plat</label>
                <input type="text" name="no_plat" id="no_plat" class="form-control" value="<?= $daftar_motor->no_plat; ?>" required>
                <label for="nama_motor">Nama Motor</label>
                <input type="text" name="nama_motor" id="nama_motor" class="form-control"  value="<?= $daftar_motor->nama_motor; ?>" required>
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control"  value="<?= $daftar_motor->harga; ?>" required>
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control"  value="<?= $daftar_motor->deskripsi; ?>" required>

            </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($M_Motor as $daftar_motor) : ?>
<div class="modal fade" id="hapusModal<?= $daftar_motor->id_motor; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Hapus Motor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus motor <strong><?= $daftar_motor->nama_motor; ?></strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
        <a href="<?= base_url('admin/motor/hapus/'.$daftar_motor->id_motor); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

</div>
<?= $this->endSection() ?>
