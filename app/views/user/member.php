<div class="container-fluid">
    <div class="row ml-5">
        <?php foreach($data['as'] as $member)   :?>
            <div class="col-lg-4 card-deck mr-2 mb-5">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header bg-primary" style="font-size:1.4em;"><?= $member['nama']?></div>
                    <div class="card-body">
                        <h5 class="card-title fa-1x">Nomor KTP : <br><br>[<?= $member['nomor_ktp']?>]</h5>
                        <!-- Divider -->
                        <hr class="sidebar-divider bg-white">

                        <p class="card-text">Alamat : <?= $member['alamat']?></p>

                        <hr class="sidebar-divider bg-white">
                        
                        <p class="card-text">Tanggal Lahir : <?= $member['tanggal_lahir']?></p>
                    </div>
                    <div class="card-footer bg-primary">
                        <a href="<?= BASEURL?>/user/detail_member/<?= $member['id_member']?>" class="btn btn-success float-right">Detail</a>
                        <a href="<?= BASEURL?>/member/hapus/<?= $member['id_member']?>" class="btn btn-danger float-right mr-2">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>