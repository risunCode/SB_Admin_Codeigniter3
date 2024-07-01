<!-- KategoriManager -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?php if (isset($row)): ?>
                    Edit Kategori Barang
                <?php else: ?>
                    Tambah Kategori Barang
                <?php endif; ?>
            </h6>
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

            <form action="<?= isset($row) ? base_url('kategori/update') : base_url('kategori/tambah') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_barang" value="<?= isset($row) ? $row->id_barang : '' ?>">
                <!-- Isi form fields sesuai dengan data yang diambil dari database -->

                <div class="form-group">
                <label for="kategori_barang">Kategori Barang</label>
                <select name="kategori_barang" id="kategori_barang" class="form-control">
                    <option value="Laptop/PC" <?= isset($row) && $row->kategori_barang == 1 ? 'selected' : '' ?>>Laptop/PC</option>
                    <option value="Elektronik" <?= isset($row) && $row->kategori_barang == 2 ? 'selected' : '' ?>>Elektronik</option>
                    <option value="Modem" <?= isset($row) && $row->kategori_barang == 3 ? 'selected' : '' ?>>Modem</option>
                    <option value="Istri" <?= isset($row) && $row->kategori_barang == 4 ? 'selected' : '' ?>>Istri</option>
                    <option value="Lainnya" <?= isset($row) && $row->kategori_barang == 4 ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div> 
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= isset($row) ? $row->nama_barang : '' ?>">
                </div> 
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= isset($row) ? $row->harga : 'Rp.' ?>">
                </div>
                <div class="form-group">
                <label for="kategori_barang">Jenis Barang</label>
                <select name="jenis_produk" id="jenis_produk" class="form-control">
                    <option value="Laptop/PC Gaming" <?= isset($row) && $row->jenis_produk == 1 ? 'selected' : '' ?>>Laptop/PC Gaming</option>
                    <option value="Notebok / Office" <?= isset($row) && $row->jenis_produk == 2 ? 'selected' : '' ?>>Notebok / Office</option> 
                    <option value="Elektronik" <?= isset($row) && $row->jenis_produk == 2 ? 'selected' : '' ?>>Elektronik</option> 
                    <option value="Lainnya" <?= isset($row) && $row->jenis_produk == 2 ? 'selected' : '' ?>>Lainnya</option> 
                    </select>
            </div> 
                <div class="form-group">
                    <label for="merek">Merek</label>
                    <input type="text" class="form-control" id="merek" name="merek" value="<?= isset($row) ? $row->merek : '' ?>">
                </div>
                <div class="form-group">
                    <label for="deskripsi_produk">Deskripsi Produk</label>
                    <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" value="<?= isset($row) ? $row->deskripsi_produk : '' ?>">
                </div>

                <div class="form-group">
                    <label for="sisa_stok">Sisa Stok</label>
                    <input type="number" class="form-control" id="sisa_stok" name="sisa_stok" value="<?= isset($row) ? $row->sisa_stok : '' ?>">
                </div>
                <div class="form-group">
                <label for="name">Masukkan Gambar:</label>
                <input type="file" class="btn btn-primary" name="gambar_produk" id="gambar_produk" class="form-control" placeholder="Select Image">
            </div>
                <div class="form-group">
                    <?php if (isset($row)): ?>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('kategori') ?>" class="btn btn-danger">Batal</a>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="<?= base_url('kategori') ?>" class="btn btn-danger">Batal</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
