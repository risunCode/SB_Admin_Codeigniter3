<div class="container-fluid">  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div style="padding: 20px;">
                        <a href="<?= base_url('users/add'); ?>" class="btn btn-primary">Tambah Data</a>
                        
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Level date</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($list as $l):
                                        ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$l->nama_lengkap?></td>
                                            <td><?=$l->username?></td>
                                            <td><?=$l->email?></td>
                                            <td><?=$l->level?></td>
                                            
                                            <td> 
                                            <a href="<?= base_url('users/edit/'. $l->id_user); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                

                                                                     <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn sm" data-toggle="modal" data-target="#exampleModal">
                                            Hapus
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Antum Mau Menghapus User ini 😀??
                                                </div>
                                                <form action="<?= base_url('users/hapus'); ?>" method="post">
                                                    <input type="hidden" name="id_user" value="<?=$l->id_user; ?>"> 
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                            </td>

                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>