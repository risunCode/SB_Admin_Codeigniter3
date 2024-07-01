<!-- v_kategori.php -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <a href="<?= base_url('kategori/add') ?>" class="btn btn-primary mb-3">Tambah Barang Jualan</a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Gambar Produk</th>
                            <th>Harga</th>
                            <th>Kategori Barang</th>
                            <th>Sisa Stok</th>
                            <th>Merek</th>
                            <th>Deskripsi Produk</th>
                            <th>Jenis Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $item): ?>
                            <tr>
                                <td><?= $item->nama_barang ?></td>
                                <td>
                                    <?php if ($item->gambar_produk): ?>
                                        <div style="text-align: center;">
                                            <img src="<?= $item->gambar_produk ?>" alt="Gambar Produk" style="max-width: 85px; margin: 0 auto;">
                                        </div>
                                    <?php else: ?>
                                        <span>Tidak ada gambar</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $item->harga ?></td>
                                <td><?= $item->kategori_barang ?></td>
                                <td><?= $item->sisa_stok ?></td>
                                <td><?= $item->merek ?></td>
                                <td><?= $item->deskripsi_produk ?></td>
                                <td><?= $item->jenis_produk ?></td>
                                <td>
                                    <a href="<?= base_url('kategori/edit/' . $item->id_barang) ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?= $item->id_barang ?>">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<?php foreach ($list as $item): ?>
    <div class="modal fade" id="hapusModal<?= $item->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel<?= $item->id_barang ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel<?= $item->id_barang ?>">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus kategori barang ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(<?= $item->id_barang ?>)">Hapus</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(id_barang) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Handle delete operation via AJAX or direct form submission
                window.location.href = '<?= base_url('kategori/hapus/') ?>' + id_barang;
            }
        });
    }
</script>
