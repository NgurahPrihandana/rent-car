<div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-lg-12">
        <div class="d-flex justify-content-between" role="alert">
            <div class="mt-1"><i class="fas fa-car-crash fa-2x"></i></div>
                <div>
                    <a class="btn btn-success" href="<?= BASEURL?>/user/table_view_history_pengeluaran">Table View</a>
                </div>
                <div>
                    <button type="button" name="" id="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahPengeluaran">
                    <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Range Pengeluaran</span>
                    </button>
                </div>
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
                    <th scope="col">Tanggal Selesai Pengeluaran</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    foreach($data['history_pengeluaran'] as $expense)   :
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
                        <td><?= date('d-F-Y',strtotime($expense['tanggal_pengeluaran']))?></td>
                        <td><?= date('d-F-Y',strtotime($expense['selesai_pengeluaran']))?></td>
                        <td><a href="<?= BASEURL;?>/user/detail_history_pengeluaran/<?= $expense['id_done_pengeluaran']?>" class="btn btn-primary btn-sm">Detail</a></td>
                        <td><a href="<?= BASEURL;?>/user/hapus_history_pengeluaran/<?= $expense['id_done_pengeluaran']?>/<?=$data['function']?>" class="btn btn-sm btn-success">Hapus <i class="fas fa-check"></i></a></td>
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
                  Inputkan Range Pengeluaran <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
                <div class="form container">
                  <form action="<?=BASEURL; ?>/user/range_history_pengeluaran" method="post">

                    <div class="form-group">
                      <label for="tanggal_awal">Tanggal Awal  :</label>
                      <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" >
                    </div>

                    <div class="form-group">
                      <label for="tanggal_akhir">Tanggal Akhir  :</label>
                      <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" >
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" name="submit" value="range_view" class="btn btn-primary mb-3 mr-2 mt-2 order-2">Filter Range</button>
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
