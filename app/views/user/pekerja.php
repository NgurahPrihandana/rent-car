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
        <?php foreach($data['auth'] as $auth)   :?>
            <div class="col-lg-4 card-deck mr-2 mt-3">
                <div class="card text-white bg-dark shadow mt-3" style="max-width: 18rem;">
                    <div class="card-header bg-dark" style="font-size:1.4em;"><?= $auth['nama_pekerja']?></div>
                    <div class="card-body">
                        <h5 class="card-title fa-1x">Username : <?= $auth['username']?></h5>
                        
                        
                    </div>
                    <div class="card-footer bg-dark">
                        <a href="<?= BASEURL?>/user/hapus_pekerja/<?= $auth['id_auth']?>" class="btn btn-danger float-right mr-2">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>