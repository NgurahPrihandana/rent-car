<div class="container shadow p-4 mb-5 bg-white rounded">
    
    <div class="row ml-5">
        <div class="card" style="width:63rem;">
            <div class="card-header">
                <i class="far fa-id-badge fa-2x"></i> <span class="fa-2x ml-1">Our Employee</span>
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
                                        <a href="<?= BASEURL?>/user/hapus_pekerja/<?= $auth['id_auth']?>" class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>            
    </div>
</div>