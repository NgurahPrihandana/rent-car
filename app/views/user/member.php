<div class="container shadow p-4 mb-5 bg-white rounded">
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
            </div>
        </div>
    </form>
    <div class="row ml-5">
        <?php foreach($data['as'] as $member)   :?>
            <div class="col-lg-6 card-deck mt-3">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded"" style="width: 18rem;">
                    <div class="card-header bg-white" style="font-size:1.4em;"><?= $member['nama']?></div>
                    <div class="card-body">
                        <h5 class="card-title fa-1x">Nomor KTP : <span style="letter-spacing: .3em;"><?= $member['nomor_ktp']?></span></h5>
                        <!-- Divider -->
                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Alamat : <?= $member['alamat']?></p>

                        <hr class="sidebar-divider bg-white">
                        
                        <p class="card-text">Tanggal Lahir : <?= $member['tanggal_lahir']?></p>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?= BASEURL?>/user/detail_member/<?= $member['id_member']?>" class="btn btn-success float-right">Detail</a>
                        <a href="<?= BASEURL?>/member/hapus/<?= $member['id_member']?>" class="btn btn-danger float-right mr-2">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>