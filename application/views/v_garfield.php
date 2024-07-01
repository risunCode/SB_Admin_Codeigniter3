<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

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
            <div class="container">
                <div class="row">
                    <?php foreach ($list as $item): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100" style="max-height: 600px;">
                                <?php if ($item->gambar_produk): ?>
                                    <img src="<?= $item->gambar_produk ?>" class="card-img-top" alt="Gambar Produk" style="max-height: 300px;">
                                <?php else: ?>
                                    <div class="text-center p-3">
                                        <span>Tidak ada gambar</span>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item->nama_barang ?></h5>
                                    <p class="card-text">Harga: <?= $item->harga ?></p>
                                    <p class="card-text">Stok: <?= $item->sisa_stok ?></p>
                                    <p class="card-text">Merek: <?= $item->merek ?></p>
                                    <!-- Menambahkan button Detail dengan deskripsi produk -->
                                    <button class="btn btn-primary" onclick="showDetailModal('<?= $item->nama_barang ?>', '<?= $item->harga ?>', '<?= $item->kategori_barang ?>', '<?= $item->sisa_stok ?>', '<?= $item->merek ?>', '<?= $item->deskripsi_produk ?>')">Detail</button>
                                   <a href=" https://wa.me/+6285163666529?text=Halo%2C%20Saya%20berminat%20dengan%20item%20ini.%0AApakah%20barang%20ini%20masih%20tersedia%3F/" target="_blank" class="btn btn-success">Hubungi via WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Barang</h5>
                <h5 class="modal-title" id="detailModalLabel">Detail Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detailContent">
                    <!-- Konten Detail akan dimasukkan secara dinamis -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href=" https://wa.me/+6285163666529?text=Halo%2C%20Saya%20berminat%20dengan%20item%20ini.%0AApakah%20barang%20ini%20masih%20tersedia%3F/" target="_blank" class="btn btn-success">Hubungi via WhatsApp</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function showDetailModal(nama_barang, harga, kategori, stok, merek, deskripsi_produk) {
        // Bangun konten modal
        var modalContent = `
            <p><strong>Nama Barang:</strong> ${nama_barang}</p>
            <p><strong>Harga:</strong> ${harga}</p>
            <p><strong>Kategori:</strong> ${kategori}</p>
            <p><strong>Stok:</strong> ${stok}</p>
            <p><strong>Merek:</strong> ${merek}</p>
            <p><strong>Deskripsi Produk:</strong> ${deskripsi_produk}</p>
        `;

        // Masukkan konten ke dalam modal
        document.getElementById('detailContent').innerHTML = modalContent;

        // Tampilkan modal
        $('#detailModal').modal('show');
    }
</script>

</body>
</html>
