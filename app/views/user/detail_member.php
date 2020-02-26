<div class="container shadow p-4 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-lg-12">
        <a href="<?= BASEURL?>/member"><i class="fas fa-circle float-right mb-4" style="color:red;"></i></a>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <i class="fas fa-user-alt mr-2"></i>
                    <h5 class=" d-inline-block mb-0">Detail <?= $data['getSpcMember']['nama']?></h5>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL?>/member/runEdit" method="post">
                            <input type="hidden" class="form-control" name="id_member" value="<?= $data['getSpcMember']['id_member']?>">

                            <div class="form-group">
                                <label for="nama_member">Nama Member</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member" value="<?= $data['getSpcMember']['nama']?>">
                            </div>

                            <div class="form-group">
                                <label for="nomor_ktp">Nomor KTP</label>
                                <input type="number" class="form-control" id="nomor_ktp" name="nomor_ktp" value="<?= $data['getSpcMember']['nomor_ktp']?>">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['getSpcMember']['alamat']?>">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['getSpcMember']['tanggal_lahir']?>">
                            </div>

                            <div class="d-flex flex-row-reverse mt-4">
                                <button type="submit" class="btn btn-primary mb-2">Edit Member</button>
                            </div>
                    </form>
                </div>
            </div> <!-- card -->
        </div><!-- col-lg-6 -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <i class="fas fa-user-alt mr-2"></i>
                    <h5 class=" d-inline-block mb-0">Detail Peminjaman <?= $data['getSpcMember']['nama']?></h5>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL?>/member/runEdit" method="post">
                    <?php $jmlPeminjaman = count($data['spcMemberPeminjaman'])?>
                            <div class="form-group">
                                <label for="nama_member">Total Melakukan Peminjaman</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member" 
                                    value="<?php if($jmlPeminjaman > 0):?><?= $jmlPeminjaman;?>
                                            <?php else  :?><?= $data['getSpcMember']['nama'] . " Belum Pernah melakukan Peminjaman"?>
                                            <?php endif;?>" disabled>
                            </div>
                    </form>
                </div>
            </div> <!-- card -->
        </div><!-- col-lg-6 -->
    </div> <!--row -->
</div> <!-- container -->
