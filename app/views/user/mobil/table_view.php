<div class="container shadow p-4 mb-5 bg-white rounded">
    <div class="d-flex justify-content-between">
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?=BASEURL?>/user/cari_mobil">
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
            <a class="btn btn-success second-view" href="<?= BASEURL?>/user/mobil">Table View</a>
        </div>
        <div>
        <button type="button" name="" id="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahMobil">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Mobil</span>
        </button>
        </div>
    </div>
    <div class="row ml-5">
        <?php foreach($data['mobil'] as $mobil)   :?>
            <div class="col-lg-4 card-deck mt-3">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <div class="card-header bg-white" style="font-size:1.4em;"><?= $mobil['nama_mobil']?></div>
                    <div class="card-body">
                        <h5 class="card-title fa-1x">Jenis Mobil : <?= $mobil['jenis_mobil']?></h5>
                        <!-- Divider -->
                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Plat : <?= $mobil['plat']?></p>

                        <hr class="sidebar-divider bg-white">
                        
                        <p class="card-text">Status : 
                            <?php if($mobil['status'] == 0) :?>
                                <span class="text-success">Disewakan</span>
                            <?php elseif($mobil['status'] == 1) :?>
                                <span class="text-primary">Ada</span>
                            <?php else  :?>
                                <span class="text-danger">Diservis</span>
                            <?php endif;?>
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?= BASEURL?>/user/detail_mobil/<?= $mobil['id_mobil']?>" class="btn btn-success float-right">Detail</a>
                        <a href="<?= BASEURL?>/user/hapus_mobil/<?= $mobil['id_mobil']?>/<?= $data['function']?>" onclick="return confirm('Yakin Untuk Menghapus Mobil Ini ?');" class="btn btn-danger float-right mr-2">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<!-- Modal Begin -->
<div class="modal fade modalTambahMobil" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-4 bg-gambar">
                    
                    </div>
                    <div class="col-lg-8">
              <div class=" text-center p-3" data-dismiss="modal" role="alert">
                  Inputkan Mobil Baru <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
                <div class="form container">
                  <form action="<?=BASEURL; ?>/mobil/tambah" method="post">
                    <div class="form-group">
                      <input type="hidden" value="">
                    </div>
                    <div class="form-group">
                        <label for="nama_mobil">Mobil  :</label>
                        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_mobil">Jenis Mobil  :</label>
                        <select class="form-control" name="jenis_mobil">
                            <?php foreach($data['jenis'] as $jenis) :?>
                                <option value="<?= $jenis['id_jenis_mobil'] ?>"><?= $jenis['jenis_mobil']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="plat">Plat Mobil  :</label>
                      <input type="text" class="form-control" id="plat" name="plat" required>
                    </div>
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