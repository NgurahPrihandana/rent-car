<div class="container shadow p-4 mb-5 bg-white rounded">
    <div class="d-flex justify-content-between">
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?=BASEURL?>/user/cari_peminjaman">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
                </div>
            </div>
        </form>
        <div>
            <a class="btn btn-success second-view" href="<?= BASEURL?>/user/peminjaman">Table View</a>
        </div>
        <div>
        <button type="button" name="" id="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahPeminjaman">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Peminjaman</span>
            </button>
        </div>
    </div>
    <div class="row ml-5">
        <?php foreach($data['peminjaman'] as $peminjaman)   :?>
            <div class="col-lg-4 card-deck mt-3">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <div class="card-header bg-white" style="font-size:1.4em;"><?= $peminjaman['nama_mobil']?></div>
                    <div class="card-body">
                        <h5 class="card-title fa-1x">Peminjam : <?= $peminjaman['nama']?></h5>
                        <!-- Divider -->
                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Tanggal Awal Peminjaman : <br> <?= date('d-F-Y',strtotime($peminjaman['tanggal_peminjaman']))?></p>

                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Tanggal Akhir Peminjaman : <br> <?= date('d-F-Y',strtotime($peminjaman['waktu_pinjam']))?></p>

                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Biaya Peminjaman : <?= $peminjaman['biaya_peminjaman']?></p>

                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Pekerja : <?= $peminjaman['nama_pekerja']?></p>

                        <hr class="sidebar-divider bg-white">
                        
                        <p class="card-text">Status : 
                            <?php if($peminjaman['status'] == 0) :?>
                                <span class="text-success">Disewakan</span>
                            <?php elseif($peminjaman['status'] == 1) :?>
                                <span class="text-primary">Ada</span>
                            <?php else  :?>
                                <span class="text-danger">Diservis</span>
                            <?php endif;?>
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?= BASEURL?>/user/detail_peminjaman/<?= $peminjaman['id_peminjaman']?>" class="btn btn-success float-right">Detail</a>
                        <a href="<?= BASEURL?>/peminjaman/done/<?= $peminjaman['id_peminjaman']?>/<?= $data['function']?>" onclick="return confirm('Yakin Untuk Menyelesaikan Peminjaman Ini ?');" class="btn btn-danger float-right mr-2">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<!-- Modal Begin -->
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