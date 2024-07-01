<div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
                        </div>
                        <div style="padding: 20px;">  
                        </div> 
                        <div class="card-body">   
                            
                        <form action="<?= base_url('users/tambah'); ?>" method="post"> 
                        <div class="form-group"> 
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap..." class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" placeholder="Masukkan username..." class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Alamat email</label>
                            <input type="text" name="email"   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Kata Sandi</label>
                            <input type="text" name="password"   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level" id="" class="form-control">
                                <option value="1">Administrator</option>
                                <option value="2">Petugas</option>
                            </select>
                        </div>

                        <div class="form-group"> 
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Batal</button> 
</form>

                            </div>
                        </div>
                    </div> 
                    