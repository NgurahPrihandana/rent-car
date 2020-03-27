<div class="container shadow p-4 mb-5 bg-white rounded">
    
    <div class="row ml-5">
        <div class="card" style="width:63rem;">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="far fa-id-badge fa-2x"></i> <span class="fa-2x ml-1">Our Employee</span>
                </div>

                <div>
                    <button type="button" class="btn btn-primary btn-icon-split mt-2" data-toggle="modal" data-target=".modalTambahPekerja">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Pekerja</span>  
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table  table-bordered" id="tablePengeluaran">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pekerja</th>
                            <th scope="col">Username Pekerja</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        <?php foreach($data['auth'] as $auth)   :?>
                            <tr>
                                <th scope="row"><?= $i++?></th>
                                <td><?= $auth['nama_pekerja']?></td>
                                <td><?= $auth['username']?></td>
                                <td>
                                    <?php if($auth['level']== 1 )   :?>
                                        Admin
                                    <?php else  :?>
                                        Petugas
                                    <?php endif;?>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <a href="<?= BASEURL?>/user/hapus_pekerja/<?= $auth['id_auth']?>" onclick="return confirm('Yakin Untuk Menghapus Pekerja Ini ?');" class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>            
    </div>
</div>

<div class="modal fade modalTambahPekerja" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-4 bg-gambar">
                    
                    </div>
                    <div class="col-lg-8">
              <div class=" text-center p-3" data-dismiss="modal" role="alert">
                  Inputkan Pekerja Baru <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
              <div class="form mt-3 container">
                  <form action="<?=BASEURL; ?>/auth/register" method="post">
                    <div class="form-group">
                      <input type="hidden" value="">
                    </div>
                    <div class="form-group">
                        <label for="nama_pekerja">Nama Pekerja  :</label>
                        <input type="text" class="form-control" id="nama_pekerja" name="nama_pekerja" required>
                    </div>

                    <div class="form-group">
                      <label for="username">Username  :</label>
                      <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                      <label for="password">Password  :</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                      <label for="conf_password">Confirm Password  :</label>
                      <input type="password" class="form-control" id="conf_password" name="conf_password" required>
                    </div>

                    <button type="submit" name="register" class="btn btn-primary float-right">Tambah Pekerja</button>
                    <button type="reset" class="btn btn-danger mb-3 mr-2 float-right">Reset</button>
                  </form>
                </div>
                </div>
            </div>
          </div>
          </div>
        </div>
        <!-- Modal End -->