<div class="container shadow p-4 mb-5 bg-white rounded">
    <div class="d-flex justify-content-between">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?=BASEURL?>/user/cari_pengeluaran">
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
            <a class="btn btn-success second-view" href="<?= BASEURL?>/user/pengeluaran">Table View</a>
        </div>
        <div>
        <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahPengeluaran">
            <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Pengeluaran</span>  
        </button>
        </div>
    </div>
    <div class="row ml-5">
        <?php foreach($data['pengeluaran'] as $pengeluaran)   :?>
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
                        <a href="<?= BASEURL?>/user/detail_pengeluaran/<?= $pengeluaran['id_pengeluaran']?>" class="btn btn-success float-right">Detail</a>
                        <a href="<?= BASEURL?>/pengeluaran/hapus/<?= $pengeluaran['id_pengeluaran']?>" onclick="return confirm('Yakin Untuk Menyelesaikan Pengeluaran Ini ?');" class="btn btn-danger float-right mr-2">Hapus</a>
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
                  Inputkan Pengeluaran Baru <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
                <div class="form container">
                  <form action="<?=BASEURL; ?>/pengeluaran/tambah" method="post">
                    <div class="form-group">
                      <input type="hidden" value="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="">
                    </div>
                    <div class="form-group">
                        <label for="id_mobil">Nama Mobil  :</label>
                        <select class="form-control" name="id_mobil">
                        <?php if(count($data['spc_mobil']) == 0)  :?>
                            <option value="" disable selected>No Car Available</option>
                        <?php endif;?>
                        <?php foreach($data['spc_mobil'] as $mobil) :?>
                                <option value="<?= $mobil['id_mobil'] ?>">
                                <?= $mobil['nama_mobil']; ?>   |    ========Plat==========>  [    <?= $mobil['plat'];?>   ]
                                </option>
                        <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="" value="<?php if(isset($id))?>">
                    </div>

                    <div class="form-group">
                        <label for="type">Jenis Pengeluaran  :</label>
                        <select class="form-control" name="type">
                                <option value="1">Samsat</option>
                                <option value="2">Service</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="nominal">Nominal  :</label>
                      <input type="text" class="form-control" id="nominal" name="nominal" required>
                    </div>

                    <div class="form-group">
                      <label for="tanggal_pengeluaran">Tanggal Pengeluaran  :</label>
                      <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required>
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