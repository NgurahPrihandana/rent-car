<div class="container shadow p-4 mb-5 bg-white rounded">
    <div class="d-flex justify-content-between">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?=BASEURL?>/user/cari_history_pengeluaran">
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
            <a class="btn btn-success second-view" href="<?= BASEURL?>/user/history_pengeluaran">Table View</a>
        </div>
        <div>
            <button type="button" name="" id="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahPengeluaran">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Range Pengeluaran</span>
            </button>
        </div>
        <div>
        
        </div>
    </div>
    <div class="row ml-5">
        <?php foreach($data['history_pengeluaran'] as $pengeluaran)   :?>
            <div class="col-lg-4 card-deck mt-3">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded"" style="width: 18rem;">
                    <div class="card-header bg-white" style="font-size:1.4em;"><?= $pengeluaran['nama_mobil']?></div>
                    <div class="card-body">
                        <h5 class="card-title fa-1x">Tanggal Pengeluaran :<br><br> <span style="letter-spacing: .1em;"><?= date('d-F-Y',strtotime($pengeluaran['tanggal_pengeluaran']))?></span></h5>
                        <!-- Divider -->
                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Type Pengeluaran : <?php 
                            if($pengeluaran['type'] == 2) : ?>
                                <p class="text-danger">Service</p>
                            <?php else  :  ?>
                                <p class="text-warning">Samsat</p>
                            <?php endif;?></p>

                        <hr class="sidebar-divider bg-white">
                        
                        <p class="card-text">Nominal : <?= $pengeluaran['nominal']?></p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?= BASEURL?>/user/detail_history_pengeluaran/<?= $pengeluaran['id_done_pengeluaran']?>" class="btn btn-success float-right">Detail</a>
                        <a href="<?= BASEURL?>/user/hapus_history_pengeluaran/<?= $pengeluaran['id_done_pengeluaran']?>/<?= $data['function']?>" class="btn btn-danger float-right mr-2">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<!-- Modal Begin -->
<div class="modal fade modalTambahPengeluaran" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-4 bg-gambar">
                    
                    </div>
                    <div class="col-lg-8">
              <div class=" text-center p-3" data-dismiss="modal" role="alert">
                  Inputkan Range Pengeluaran <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
                <div class="form container">
                  <form action="<?=BASEURL; ?>/user/data_view_range_history_pengeluaran" method="post">

                    <div class="form-group">
                      <label for="tanggal_awal">Tanggal Awal  :</label>
                      <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                    </div>

                    <div class="form-group">
                      <label for="tanggal_akhir">Tanggal Akhir  :</label>
                      <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" name="submit" value="range_view" class="btn btn-primary mb-3 mr-2 mt-2 order-2">Tambah Range</button>
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

