<div class="container shadow p-4 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-lg-12">
        <a href="<?= BASEURL?>/user/mobil"><i class="fas fa-circle float-right mb-4" style="color:red;"></i></a>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                <i class="fas fa-user-alt mr-2"></i>
                    <h5 class=" d-inline-block mb-0">Detail <?= $data['spcDetailMobil']['nama_mobil']?></h5>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL?>/mobil/runEdit" method="post">
                            <input type="hidden" class="form-control" name="id_mobil" value="<?= $data['spcDetailMobil']['id_mobil']?>">

                            <div class="form-group">
                                <label for="nama_mobil">Nama Mobil</label>
                                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="<?= $data['spcDetailMobil']['nama_mobil']?>">
                            </div>

                            <div class="form-group">
                                <label for="jenis_mobil">Jenis Mobil</label>
                                <select class="form-control" id="jenis_mobil" name="jenis_mobil">
                                    <?php foreach($data['jenis'] as $jenis) :?>
                                        <?php if($data['spcDetailMobil']['id_jenis_mobil']==$jenis['id_jenis_mobil'])  :?>
                                            <?php $select="selected"?>
                                        <?php else :?>
                                            <?php $select=""?>
                                        <?php endif;?>
                                        <option <?=$select ?> value="<?= $jenis['id_jenis_mobil'] ?>"><?= $jenis['jenis_mobil']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="plat">Plat</label>
                                <input type="text" class="form-control" id="plat" name="plat" value="<?= $data['spcDetailMobil']['plat']?>">
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
                        <h5 class=" d-inline-block mb-0">Detail Transaksi Mobil <?= $data['spcDetailMobil']['nama_mobil']?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Service -->
                            <div class="col-lg-3">
                                <form>
                                <?php $jmlService = count($data['spcDetailService'])?>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <label>Total Service</label>
                                            </div>
                                            <input type="text" class="form-control" 
                                                value="<?php if($jmlService > 0):?><?= $jmlService;?>
                                                        <?php else  :?><?="-"?>
                                                        <?php endif;?>" disabled>
                                        </div>
                                </form>
                            </div><!-- col-lg-3 -->
                            <div class="col-lg-9">
                                <form>
                                <?php $total_harga_service = 0?>
                                <?php foreach($data['spcDetailService'] as $allDetail)   :?>
                                    <?php $total_harga_service += $allDetail['nominal']?>
                                <?php endforeach;?>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <label>Total Biaya Service</label>
                                            </div>
                                            <input type="text" class="form-control" 
                                                value="<?php if($total_harga_service > 0):?><?= $total_harga_service;?>
                                                        <?php else  :?><?= $data['spcDetailMobil']['nama_mobil'] . " is Free of Service"?>
                                                        <?php endif;?>" disabled>
                                        </div>
                                </form>
                            </div><!-- col-lg-9 -->
                            <!-- Samsat -->
                            <div class="col-lg-3 mt-2">
                                <form>
                                <?php $jmlSamsat = count($data['spcDetailSamsat'])?>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <label>Total Samsat</label>
                                            </div>
                                            <input type="text" class="form-control" 
                                                value="<?php if($jmlSamsat > 0):?><?= $jmlSamsat;?>
                                                        <?php else  :?><?="-"?>
                                                        <?php endif;?>" disabled>
                                        </div>
                                </form>
                            </div><!-- col-lg-3 -->
                            <div class="col-lg-9 mt-2">
                                <form>
                                <?php $total_harga_samsat = 0?>
                                <?php foreach($data['spcDetailSamsat'] as $allDetail)   :?>
                                    <?php $total_harga_samsat += $allDetail['nominal']?>
                                <?php endforeach;?>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <label>Total Biaya Samsat</label>
                                            </div>
                                            <input type="text" class="form-control" 
                                                value="<?php if($total_harga_samsat > 0):?><?= $total_harga_samsat;?>
                                                        <?php else  :?><?= $data['spcDetailMobil']['nama_mobil'] . " is Free of Samsat"?>
                                                        <?php endif;?>" disabled>
                                        </div>
                                </form>
                            </div><!-- col-lg-9 -->
                            <!-- Peminjaman -->
                            <div class="col-lg-4 mt-2">
                                <form>
                                <?php $jmlPeminjaman = count($data['spcMobilPeminjaman'])?>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <label>Total Peminjaman</label>
                                            </div>
                                            <input type="text" class="form-control" 
                                                value="<?php if($jmlPeminjaman > 0):?><?= $jmlPeminjaman;?>
                                                        <?php else  :?><?="-"?>
                                                        <?php endif;?>" disabled>
                                        </div>
                                </form>
                            </div><!-- col-lg-3 -->
                            <div class="col-lg-8 mt-2">
                                <form>
                                <?php $total_harga_peminjaman = 0?>
                                <?php foreach($data['spcMobilPeminjaman'] as $allDetail)   :?>
                                    <?php $total_harga_peminjaman += $allDetail['biaya_peminjaman']?>
                                <?php endforeach;?>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <label>Total Biaya Peminjaman</label>
                                            </div>
                                            <input type="text" class="form-control" 
                                                value="<?php if($jmlPeminjaman > 0):?><?= $total_harga_peminjaman;?>
                                                        <?php else  :?><?= $data['spcDetailMobil']['nama_mobil'] . " is Free of Peminjaman"?>
                                                        <?php endif;?>" disabled>
                                        </div>
                                </form>
                            </div><!-- col-lg-9 -->
                            <!-- Peminjaman -->
                            <div class="col-lg-12 mt-3">
                                <form>
                                    <?php $total_harga_keseluruhan = $total_harga_peminjaman-$total_harga_samsat-$total_harga_service;?>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <label>Total Biaya Keseluruhan</label>
                                            </div>
                                            <input type="text" class="form-control" 
                                                value="<?= $total_harga_keseluruhan;?>" disabled>
                                        </div>
                                </form>
                            </div><!-- col-lg-9 -->
                            
                        </div><!-- row -->
                    </div>
                </div> <!-- card -->
            </div><!-- col-lg-12 -->
        </div><!-- col-lg-6 -->
    </div> <!--row -->
</div> <!-- container -->
