<div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-lg-12">
        <div class="d-flex justify-content-between" role="alert">
            <div class="mt-1"><i class="fas fa-car-crash fa-2x"></i></div>
            <button type="button" name="" id="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahPengeluaran">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Pengeluaran</span>
            </button>
        </div>
        <hr class="mr-0">

        <div class="row">
        <div class="col-lg-12 m-auto">
            <table class="table text-center table-bordered" id="tablePengeluaran">
                <caption>List Mobil</caption>
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mobil</th>
                    <th scope="col">Type</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Tanggal Pengeluaran</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    foreach($data['pengeluaran'] as $expense)   :
                    ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $expense['nama_mobil']?></td>
                        <td>
                        <?php 
                            if($expense['type'] == 2) : ?>
                                <p class="text-danger">Service</p>
                            <?php else  :  ?>
                                <p class="text-warning">Samsat</p>
                            <?php endif;?>
                        </td>
                        <td><?= $expense['nominal']?></td>
                        <td><?= $expense['tanggal_pengeluaran']?></td>
                        <td><a href="<?= BASEURL;?>/pengeluaran/edit/<?= $expense['id_pengeluaran']?>" class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="<?= BASEURL;?>/pengeluaran/done/<?= $expense['id_mobil']?>/<?= $expense['id_pengeluaran']?>/<?= $expense['type']?>" class="btn btn-sm btn-success">Done <i class="fas fa-check"></i></a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
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