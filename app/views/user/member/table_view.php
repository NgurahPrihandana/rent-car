<div class="container shadow p-4 mb-5 bg-white rounded">
    <div class="d-flex justify-content-lg-between">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?=BASEURL?>/user/cari_member">
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
            <a class="btn btn-success second-view" href="<?= BASEURL?>/user/member/">Table View</a>
        </div>
        <div>
        <button type="button" name="search" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahMember">
            <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Member</span>  
        </button>
        </div>
    </div>
    <div class="row ml-5">
        <?php foreach($data['as'] as $member)   :?>
            <div class="col-lg-6 card-deck mt-3">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <div class="card-header bg-white" style="font-size:1.4em;"><?= $member['nama']?></div>
                    <div class="card-body">
                        <h5 class="card-title fa-1x">Nomor KTP : <span style="letter-spacing: .3em;"><?= $member['nomor_ktp']?></span></h5>
                        <!-- Divider -->
                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Alamat : <?= $member['alamat']?></p>

                        <hr class="sidebar-divider bg-white">
                        
                        <p class="card-text">Tanggal Lahir : <?= date('d-F-Y',strtotime($member['tanggal_lahir']))?></p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?= BASEURL?>/user/detail_member/<?= $member['id_member']?>" class="btn btn-success float-right">Detail</a>
                        <a href="<?= BASEURL?>/member/hapus/<?= $member['id_member']?>" onclick="return confirm('Yakin Untuk Menghapus Member Ini ?');" class="btn btn-danger float-right mr-2">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<div class="modal fade modalTambahMember" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-4 bg-gambar">
                    
                    </div>
                    <div class="col-lg-8">
              <div class=" text-center p-3" data-dismiss="modal" role="alert">
                  Inputkan Member Baru <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
              <div class="form mt-3 container">
                  <form action="<?=BASEURL; ?>/Member/tambah" method="post">
                    <div class="form-group">
                      <input type="hidden" value="<?=$data['function']?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama  :</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                      <label for="nomor_ktp">Nomor KTP  :</label>
                      <input type="number" class="form-control" id="nomor_ktp" name="nomor_ktp" minlength="16" required>
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat  :</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>

                    <div class="form-group">
                      <label for="tanggal_lahir">Tanggal Lahir  :</label>
                      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Member</button>
                    <button type="reset" class="btn btn-danger mb-3 mr-2 float-right">Reset</button>
                  </form>
                </div>
                </div>
            </div>
          </div>
          </div>
        </div>
        <!-- Modal End -->