<div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
                        </div>
                        <div style="padding: 20px;">
                       
                        
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('users/update'); ?>" method="post">
                            <input type="hidden" name="id_users" value="<?=
                            $row->id_user; ?>">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" placeholder="Masukan Nama Lengkap...
                                " class="form-control" value="<?= $row->nama_lengkap; ?>">
                                
                                </div>
                                <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" placeholder="Masukan Username...
                                " class="form-control"value="<?= $row->username; ?>">

                                </div>
                                <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" placeholder="Masukan email...
                                " class="form-control"value="<?= $row->email; ?>">
                                </div>

                                </div>
                                <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" placeholder="Masukan password...
                                " class="form-control">
                                </div>
                        
                                </div>
                                <div class="form-group">
                                <label for="">Level</label>
                                <select name="level" id="" class="form-control">
                                    <option value="1" <?= ($row->level == 1) ?
                                    'selected' : ''; ?>>Admin</option>
                                    <option value="2"<?= ($row->level == 1) ?
                                    'selected' : ''; ?>>Member</option>
                                </select> 
                            </div>
                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="submit" class="btn btn-danger">Batal</button>
                            </div>

                        </form>

                        </div>
                    </div>

                </div>