<div class="container shadow p-4 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-lg-12">
        <a href="<?= BASEURL?>/user/mobil"><i class="fas fa-circle float-right mb-4" style="color:red;"></i></a>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <i class="fas fa-user-alt mr-2"></i>
                    <h5 class=" d-inline-block mb-0">Detail <?= $data['getSpcDetailMobil']['nama_mobil']?></h5>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL?>/member/runEdit" method="post">
                            <input type="hidden" class="form-control" name="id_member" value="<?= $data['getSpcDetailMobil']['id_mobil']?>">

                            <div class="form-group">
                                <label for="nama_member">Nama Mobil</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member" value="<?= $data['getSpcDetailMobil']['nama_mobil']?>">
                            </div>

                            <div class="form-group">
                                <label for="nomor_ktp">Jenis Mobil</label>
                                <select class="form-control" name="jenis_mobil">
                                    <?php foreach($data['jenis'] as $jenis) :?>
                                        <?php if($data['getSpcDetailMobil']['id_jenis_mobil']==$jenis['id_jenis_mobil'])  :?>
                                            <?php $select="selected"?>
                                        <?php else :?>
                                            <?php $select=""?>
                                        <?php endif;?>
                                        <option <?=$select ?> value="<?= $jenis['id_jenis_mobil'] ?>"><?= $jenis['jenis_mobil']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Plat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['getSpcDetailMobil']['plat']?>">
                            </div>

                            <div class="d-flex flex-row-reverse mt-4">
                                <button type="submit" class="btn btn-primary mb-2">Edit Mobil</button>
                            </div>
                    </form>
                </div>
            </div> <!-- card -->
        </div><!-- col-lg-6 -->

        <div class="col-lg-6">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <i class="fas fa-user-alt mr-2"></i>
                        <h5 class=" d-inline-block mb-0">Detail Pengeluaran <?= $data['getSpcDetailMobil']['nama_mobil']?></h5>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-6">
                            <form>
                            <?php $jmlPeminjaman = count($data['spcMemberPeminjaman'])?>
                                    <div class="form-group">
                                        <label for="nama_member">Total Service</label>
                                        <input type="text" class="form-control" id="nama_member" name="nama_member" 
                                            value="<?php if($jmlPeminjaman > 0):?><?= $jmlPeminjaman;?>
                                                    <?php else  :?><?= $data['getSpcMember']['nama'] . " Belum Pernah melakukan Peminjaman"?>
                                                    <?php endif;?>" disabled>
                                    </div>
                            </form>
                        </div><!-- col-lg-6 -->
                        <div class="col-lg-6">
                            <form>
                                <label for=""></label>
                            </form>
                        </div><!-- col-lg-6 -->
                    </div>
                </div> <!-- card -->
            </div><!-- col-lg-12 -->
        </div><!-- col-lg-6 -->
    </div> <!--row -->
</div> <!-- container -->
