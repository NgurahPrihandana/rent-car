<div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between">
            <div><i class="fas fa-car fa-2x"></i></div>
            <button type="button" name="" id="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahMobil">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Mobil</span>
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12 m-auto">
            <table class="table text-center table-bordered" id="tableMobil">
                <caption>List Mobil</caption>
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mobil</th>
                    <th scope="col">Jenis Mobil</th>
                    <th scope="col">Plat</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1?>
                    <?php foreach($data['mobil'] as $mobil) :?>
                    <tr>
                    <th scope="row"><?= $i++;?></th>
                    <td><?= $mobil['nama_mobil']?></td>
                    <td><?= $mobil['jenis_mobil']?></td>
                    <td><?= $mobil['plat']?></td>
                    <td><?php if($mobil['status'] == 1) :?>
                            <p class="text-primary">Masih Tersedia</p>
                        <?php elseif($mobil['status'] == 0) : ?>
                            <p class="text-success">Disewa</p>
                        <?php else : ?>
                            <p class="text-danger">Diservis</p>
                        <?php endif ;?>
                    </td>
                <td><a href="<?= BASEURL?>/mobil/edit/<?= $mobil['id_mobil']?>" class="btn btn-primary btn-sm">Edit</a> | <a href="<?= BASEURL;?>/Mobil/hapus/<?= $mobil['id_mobil']?>" onclick="return confirm('Yakin Untuk Menghapus Member Ini ?');" class="btn btn-danger btn-sm">Hapus</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Begin -->
<div class="modal fade modalTambahMobil" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-4 bg-gambar">
                    
                    </div>
                    <div class="col-lg-8">
              <div class=" text-center p-3" data-dismiss="modal" role="alert">
                  Inputkan Mobil Baru <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
                <div class="form container">
                  <form action="<?=BASEURL; ?>/mobil/tambah" method="post">
                    <div class="form-group">
                      <input type="hidden" value="">
                    </div>
                    <div class="form-group">
                        <label for="nama_mobil">Mobil  :</label>
                        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_mobil">Jenis Mobil  :</label>
                        <select class="form-control" name="jenis_mobil">
                            <?php foreach($data['jenis'] as $jenis) :?>
                                <option value="<?= $jenis['id_jenis_mobil'] ?>"><?= $jenis['jenis_mobil']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="plat">Plat Mobil  :</label>
                      <input type="text" class="form-control" id="plat" name="plat" required>
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