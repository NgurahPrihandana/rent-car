<div class="container-fluid shadow-lg p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between">
        <div><i class="fas fa-cart-plus fa-2x"></i></div>
        <div>
            <a class="btn btn-success" href="<?= BASEURL?>/user/table_view_peminjaman">Normal View</a>
            </div>
            <button type="button" name="" id="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahPeminjaman">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Peminjaman</span>
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <table class="table text-center table-bordered" id="tableMobil">
                <caption>List Mobil</caption>
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Mobil</th>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Waktu Akhir Pinjam</th>
                        <th scope="col">Biaya Pinjam</th>
                        <th scope="col">Pekerja</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    <?php foreach($data['peminjaman'] as $pinjam) :?>
                        <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $pinjam['nama_mobil']?></td>
                        <td><?= $pinjam['nama']?></td>
                        <td><?= date('d-F-Y',strtotime($pinjam['tgl_pinjam']))?></td>
                        <td><?= date('d-F-Y',strtotime($pinjam['waktu_pinjam']))?></td>
                        <td><?= $pinjam['biaya_peminjaman']?></td>
                        <td><?= $pinjam['nama_pekerja']?></td>
                    <td><a href="<?= BASEURL;?>/user/detail_peminjaman/<?= $pinjam['id_peminjaman']?>" class="btn btn-primary btn-sm">Edit</a> | <a href="<?= BASEURL;?>/peminjaman/hapus/<?= $pinjam['id_peminjaman']?>" onclick="return confirm('Yakin Untuk Menghapus Peminjaman Ini ?');" class="btn btn-danger btn-sm">Hapus</a></td>
                    <td><a href="<?= BASEURL;?>/peminjaman/done/<?= $pinjam['id_peminjaman']?>/<?= $pinjam['id_mobil']?>" onclick="return confirm('Yakin Untuk Menyelesaikan Peminjaman Ini ?');" class="btn btn-success btn-sm">Done <i class="fas fa-check"></i></a></td>
                        </tr>
                    <?php endforeach;?>
                        
                    </tbody>
                </table>
        </div>
    </div>
</div>

<div class="modal fade modalTambahPeminjaman" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-4 bg-gambar">
                    
                    </div>
                    <div class="col-lg-8">
              <div class=" text-center p-3" data-dismiss="modal" role="alert">
                  Inputkan Peminjaman Baru <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
                <div class="form container">
                  <form action="<?=BASEURL; ?>/peminjaman/tambah" method="post">
                    <div class="form-group">
                      <input type="hidden" value="">
                    </div>
                    <div class="form-group">
                        <label for="nama_mobil">Nama Mobil  :</label>
                        <select class="form-control" name="id_mobil" required>
                        <?php if(count($data['spc_mobil']) == 0)    :?>
                            <option value="" disable selected>No Car Available</option>
                        <?php endif;?>
                            <?php foreach($data['spc_mobil'] as $mobil) :?>
                                <option value="<?= $mobil['id_mobil'] ?>">
                                <?= $mobil['nama_mobil']; ?>   |    ========Plat==========>  [    <?= $mobil['plat'];?>   ]
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_member">Nama Member  :</label>
                        <select class="form-control" name="nama_member">
                            <?php foreach($data['as'] as $peminjam) :?>
                                <option value="<?= $peminjam['id_member'] ?>"><?= $peminjam['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="tanggal_pinjam">Tanggal Pinjam  :</label>
                      <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                    </div>

                    <div class="form-group">
                      <label for="waktu_pinjam">Waktu Akhir Pinjam  :</label>
                      <input type="date" class="form-control" id="waktu_pinjam" name="waktu_pinjam" required>
                    </div>

                    <div class="form-group">
                      <label for="biaya_pinjam">Biaya Pinjam  :</label>
                      <input type="number" class="form-control" id="biaya_pinjam" name="biaya_pinjam" required>
                    </div>

                   <input type="hidden" name="nama_pekerja" value="<?= $_SESSION['id_auth'];?>">

                    <div class="d-flex justify-content-end">
                        <button type="submit" name="submit" class="btn btn-primary mb-3 mr-2 mt-2 order-2">Tambah Mobil</button>
                        <button type="reset" class="btn btn-danger mb-3 mr-2 mt-2 order-1">Reset</button>
                    </div>
                  </form>
                </div>
                </div>
            </div>
          </div>
          </div>
        </div>
        <!-- Modal End -->